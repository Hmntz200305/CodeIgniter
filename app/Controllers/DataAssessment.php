<?php

namespace App\Controllers;

class DataAssessment extends BaseController
{
    protected $alternatifModel;
    protected $kriteriaModel;
    protected $penialianModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->kriteriaModel = new \App\Models\CriteriaModel();
        $this->penialianModel = new \App\Models\AssessmentModel();
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
            'kriteria' => $kriteria
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
            'kriteria_penilaian.*' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kriteria harus diisi',
                ]
            ],
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $_POST;
        $duplicate = $this->penialianModel->checkDuplicate($data['periode_penilaian'], $data['alternatif_penilaian'], $data['kriteria_penilaian']);
        if ($duplicate) {
            return redirect()->back()->withInput()->with('error', 'Duplikat data ditemukan.');
        }

        $insert = $this->penialianModel->addProcess($data);
        return redirect()->to('dataassessment/adddata');
    }

    public function deleteprocess($id_penilaian)
    {
        $delete = $this->penialianModel->delete($id_penilaian);

        if ($delete) {
            return redirect()->to('/dataassessment');
        } else {
            echo "Failed to delete data.";
        }
    }

    public function clearprocess()
    {
        $truncate = $this->penialianModel->truncateTable('penilaian');

        if ($truncate) {
            return redirect()->to('/dataassessment');
        } else {
            echo "Failed to delete data.";
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
        return redirect()->to('/dataassessment');
    }
}