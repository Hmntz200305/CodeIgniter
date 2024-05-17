<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class DataAssessment extends BaseController
{
    protected $alternatifModel;
    protected $kriteriaModel;
    protected $penialianModel;
    protected $ActivityLog;
    protected $session;
    protected $helpers = ['form'];
    use ResponseTrait;

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->kriteriaModel = new \App\Models\CriteriaModel();
        $this->penialianModel = new \App\Models\AssessmentModel();
        $this->ActivityLog = new  \App\Models\ActivityLogModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $penilaian = $this->penialianModel->findAll();
        $data = [];

        foreach ($penilaian as $item) {
            $alternatif = $this->alternatifModel->getAlternatif($item['id_alternatif']);
            $kriteria = $this->kriteriaModel->getKriteria($item['id_kriteria']);

            $data[] = [
                'id_penilaian' => $item['id_penilaian'],
                'periode_penilaian' => $item['periode_penilaian'],
                'id_alternatif' => $item['id_alternatif'],
                'alternatif' => $alternatif['nama_alternatif'],
                'id_kriteria' => $item['id_kriteria'],
                'kriteria' => $kriteria['deskripsi_kriteria'],
                'nilai' => $item['nilai']
            ];
        }

        return view('page/DataAssessment/index', ['penilaian' => $data]);
    }


    public function addData()
    {
        $alternatif = $this->alternatifModel->findAll();
        $kriteria = $this->kriteriaModel->findAll();

        $data = [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
        ];

        return view('page/DataAssessment/addData', $data);
    }

    public function addprocess()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'periode_penilaian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode harus diisi',
                ]
            ],
            'alternatif_penilaian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alternatif harus diisi',
                ]
            ],
        ]);

        $checkbox = $this->request->getPost('checkbox');
        if (!$checkbox) {
            $this->session->setFlashdata('message', 'Harap pilih minimal satu kriteria.');
            $this->session->setFlashdata('message_type', 'warning');
            return redirect()->back();
        }

        $kriteria_penilaian = $this->request->getPost('kriteria_penilaian');
        if ($kriteria_penilaian) {
            foreach ($kriteria_penilaian as $id_kriteria => $nilai_kriteria) {
                if (isset($checkbox[$id_kriteria]) && $checkbox[$id_kriteria] == 'on') {
                    if (empty($nilai_kriteria) or $nilai_kriteria < 1) {
                        $this->session->setFlashdata('message', 'Nilai kriteria harus diisi dan lebih besar dari 0.');
                        $this->session->setFlashdata('message_type', 'warning');
                        return redirect()->back();
                    }
                }
            }
        }

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $_POST;
        $duplicate = $this->penialianModel->checkDuplicate($data['periode_penilaian'], $data['alternatif_penilaian'], $checkbox, $data['kriteria_penilaian']);
        if ($duplicate) {
            $duplicateperiode = $duplicate['periode'];
            $duplicateKriteria = $this->kriteriaModel->getKriteria($duplicate['kriteria']);
            $duplicatekriterianame = $duplicateKriteria['deskripsi_kriteria'];
            $errorMessage = "Kriteria pada Periode $duplicateperiode dan Alternatif $duplicatekriterianame sudah ditentukan";

            $this->session->setFlashdata('message', $errorMessage);
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        } else {
            $insert = $this->penialianModel->addProcess($data);
            $this->session->setFlashdata('message', 'Data berhasil disimpan!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        }
    }

    public function deleteprocess($id_penilaian)
    {
        $delete = $this->penialianModel->delete($id_penilaian);

        if ($delete) {
            $this->ActivityLog->saveActivityLog("ID $id_penilaian dihapus", 'penilaian', 'Delete');
            $this->session->setFlashdata('message', 'Penilaian Alternatif berhasil dihapus');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Gagal menghapus data');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function clearprocess()
    {
        $truncate = $this->penialianModel->truncateTable('penilaian');

        if ($truncate) {
            $this->ActivityLog->saveActivityLog("Semua data dihapus", 'penilaian', 'Delete');
            $this->session->setFlashdata('message', 'Table berhasil dibersihkan');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Gagal membersihkan table');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function editData($id_penilaian)
    {
        $penilaian = $this->penialianModel->getPenilaian($id_penilaian);
        $alternatif = $this->alternatifModel->getAlternatif($penilaian['id_alternatif']);
        $kriteria = $this->kriteriaModel->getKriteria($penilaian['id_kriteria']);

        $data = [
            'id' => $id_penilaian,
            'penilaian' => $penilaian,
            'alternatif' => $alternatif,
            'kriteria' => $kriteria
        ];

        return view('page/DataAssessment/editData', $data);
    }
    public function editDataprocess($id_penilaian)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nilai_penilaian' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Nilai harus diisi',
                    'greater_than' => 'Nilai harus lebih besar dari 0.'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $nilai = $this->request->getPost('nilai_penilaian');
        $update = $this->penialianModel->editProcess($id_penilaian, $nilai);
        if ($update) {
            $this->ActivityLog->saveActivityLog("ID $id_penilaian diupdate", 'penilaian', 'Update');
            $this->session->setFlashdata('message', 'Penilaian berhasil di update');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        }
    }
}
