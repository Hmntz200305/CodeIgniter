<?php

namespace App\Controllers;

class DataCriteria extends BaseController
{
    protected $kriteriaModel;
    protected $session;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->kriteriaModel = new \App\Models\CriteriaModel();
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
                    'required' => 'Kode harus diisi',
                    'is_unique' => 'Kode sudah terdaftar'
                ]
            ],
            'deskripsi_kriteria' => [
                'rules' => 'required|is_unique[kriteria.deskripsi_kriteria]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'is_unique' => 'Nama sudah terdaftar'
                ]
            ],
            'bobot_kriteria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bobot harus diisi',
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
            $this->session->setFlashdata('message', 'Kriteria berhasil ditambahkan!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Kriteria tidak berhasil disimpan!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function deleteprocess($id_kriteria)
    {
        $delete = $this->kriteriaModel->delete($id_kriteria);

        if ($delete) {
            $this->session->setFlashdata('message', 'Kriteria berhasil dihapus!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Gagal menghapus data!');
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
                $validation->setError('kode_kriteria', 'Kode harus diisi');
            }

            if (empty($deskripsi_kriteria)) {
                $validation->setError('deskripsi_kriteria', 'Nama harus diisi');
            }
            if (empty($bobot_kriteria)) {
                $validation->setError('bobot_kriteria', 'Bobot harus diisi');
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
                $validation->setError('kode_kriteria', 'Kode sudah terdaftar');
            }
            if (!$isDescUnique) {
                $validation->setError('deskripsi_kriteria', 'Nama sudah terdaftar');
            }
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $update = $this->kriteriaModel->editProcess($id_kriteria, $kode_kriteria, $deskripsi_kriteria,  $bobot_kriteria);
        if ($update) {
            $this->session->setFlashdata('message', 'Kriteria berhasil diupdate!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Kriteria tidak berhasil disimpan!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }
}
