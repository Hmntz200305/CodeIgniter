<?php

namespace App\Controllers;

class DataCriteria extends BaseController
{
    protected $kriteriaModel;
    protected $penilaianModel;
    protected $ActivityLog;
    protected $session;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->kriteriaModel = new \App\Models\CriteriaModel();
        $this->penilaianModel = new \App\Models\AssessmentModel();
        $this->ActivityLog = new  \App\Models\ActivityLogModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $DataTable = $this->kriteriaModel->findAll();
        $data = [
            'Kriteria' => $DataTable
        ];
        return view('page/DataCriteria/index', $data);
    }

    public function addData()
    {
        return view('page/DataCriteria/adddata');
    }

    public function addprocess()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_kriteria' => [
                'rules' => 'required|is_unique[kriteria.kode_kriteria]',
                'errors' => [
                    'required' => 'Code must be filled in!',
                    'is_unique' => 'Code already exists!'
                ]
            ],
            'deskripsi_kriteria' => [
                'rules' => 'required|is_unique[kriteria.deskripsi_kriteria]',
                'errors' => [
                    'required' => 'Name must be filled in!',
                    'is_unique' => 'Name already exists!'
                ]
            ],
            'bobot_kriteria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Weight must be filled in!',
                ]
            ]
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $kode_kriteria = $this->request->getPost('kode_kriteria');
        $deskripsi_kriteria = $this->request->getPost('deskripsi_kriteria');
        $bobot_kriteria = $this->request->getPost('bobot_kriteria');

        $insert = $this->kriteriaModel->addProcess($kode_kriteria, $deskripsi_kriteria, $bobot_kriteria);
        if ($insert) {
            $this->ActivityLog->saveActivityLog("Kode $kode_kriteria ditambahkan", 'kriteria', 'Add');
            $this->session->setFlashdata('message', 'Criteria Successfully added!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Criteria has Failed to add!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function deleteprocess($id_kriteria)
    {
        $deleteKriteria = $this->kriteriaModel->delete($id_kriteria);
        if ($deleteKriteria) {
            $deletePenilaian = $this->penilaianModel->deleteByKriteriaId($id_kriteria);
            if ($deletePenilaian) {
                $this->ActivityLog->saveActivityLog("ID $id_kriteria dihapus", 'kriteria', 'Delete');
                $this->session->setFlashdata('message', 'Criteria Successfully deleted!');
                $this->session->setFlashdata('message_type', 'success');
                return redirect()->back();
            } else {
                $this->session->setFlashdata('message', 'Criteria has Failed to delete!');
                $this->session->setFlashdata('message_type', 'error');
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata('message', 'Failed to delete Criteria!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function editData($id_kriteria)
    {
        $kriteria = $this->kriteriaModel->getKriteria($id_kriteria);

        $data = [
            'id' => $id_kriteria,
            'kriteria' => $kriteria
        ];

        return view('page/DataCriteria/editdata', $data);
    }

    public function editDataprocess($id_kriteria)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_kriteria' => 'required',
            'deskripsi_kriteria' => 'required',
            'bobot_kriteria' => 'required'
        ]);

        $kode_kriteria = $this->request->getPost('kode_kriteria');
        $deskripsi_kriteria = $this->request->getPost('deskripsi_kriteria');
        $bobot_kriteria = $this->request->getPost('bobot_kriteria');

        if (empty($kode_kriteria) || empty($deskripsi_kriteria) || empty($bobot_kriteria)) {
            if (empty($kode_kriteria)) {
                $validation->setError('kode_kriteria', 'Code must be filled in!');
            }

            if (empty($deskripsi_kriteria)) {
                $validation->setError('deskripsi_kriteria', 'Name must be filled in!');
            }
            if (empty($bobot_kriteria)) {
                $validation->setError('bobot_kriteria', 'Weight must be filled in!');
            }

            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $kriteria = $this->kriteriaModel->getKriteria($id_kriteria);

        $isKodeUnique = true;
        $isDescUnique = true;

        if ($kode_kriteria !== $kriteria['kode_kriteria']) {
            $isKodeUnique = $this->kriteriaModel->isUnique('kode_kriteria', $kode_kriteria);
        }

        if ($deskripsi_kriteria !== $kriteria['deskripsi_kriteria']) {
            $isDescUnique = $this->kriteriaModel->isUnique('deskripsi_kriteria', $deskripsi_kriteria);
        }

        if (!$isKodeUnique || !$isDescUnique) {
            if (!$isKodeUnique) {
                $validation->setError('kode_kriteria', 'Code already exists!');
            }
            if (!$isDescUnique) {
                $validation->setError('deskripsi_kriteria', 'Name already exists!');
            }
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $update = $this->kriteriaModel->editProcess($id_kriteria, $kode_kriteria, $deskripsi_kriteria,  $bobot_kriteria);
        if ($update) {
            $this->ActivityLog->saveActivityLog("ID $id_kriteria diupdate", 'kriteria', 'Update');
            $this->session->setFlashdata('message', 'Criteria Successfully updated!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Criteria has been failed to save!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }
}
