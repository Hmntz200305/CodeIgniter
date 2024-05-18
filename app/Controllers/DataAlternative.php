<?php

namespace App\Controllers;

class DataAlternative extends BaseController
{

    protected $alternatifModel;
    protected $penilaianModel;
    protected $ActivityLog;
    protected $session;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->penilaianModel = new \App\Models\AssessmentModel();
        $this->ActivityLog = new  \App\Models\ActivityLogModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $DataTable = $this->alternatifModel->findAll();

        $data = [
            'Alternatif' => $DataTable,
        ];

        return view('page/DataAlternative/index', $data);
    }

    public function addData()
    {
        return view('page/DataAlternative/adddata');
    }

    public function addprocess()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_alternatif' => [
                'rules' => 'required|is_unique[alternatif.kode_alternatif]',
                'errors' => [
                    'required' => 'Code must be filled in!',
                    'is_unique' => 'Kode sudah terdaftar'
                ]
            ],
            'nama_alternatif' => [
                'rules' => 'required|is_unique[alternatif.nama_alternatif]',
                'errors' => [
                    'required' => 'Name must be filled in!',
                    'is_unique' => 'Nama sudah terdaftar'
                ]
            ]
        ]);

        if (!$validation->run($this->request->getPost())) {
            // Jika validasi gagal, kembalikan dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $kode_alternatif = $this->request->getPost('kode_alternatif');
        $nama_alternatif = $this->request->getPost('nama_alternatif');
        $insert = $this->alternatifModel->addProcess($kode_alternatif, $nama_alternatif);
        if ($insert) {
            $this->ActivityLog->saveActivityLog("Kode $kode_alternatif ditambahkan", 'alternatif', 'Add');
            $this->session->setFlashdata('message', 'Alternative Successfully added!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Alternative has Failed to add!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }


    public function deleteprocess($id_alternatif)
    {
        $deleteAlternatif = $this->alternatifModel->delete($id_alternatif);
        if ($deleteAlternatif) {
            $deletePenilaian = $this->penilaianModel->deleteByAlternatifId($id_alternatif);
            if ($deletePenilaian) {
                $this->ActivityLog->saveActivityLog("ID $id_alternatif dihapus", 'alternatif', 'Delete');
                $this->session->setFlashdata('message', 'Alternative Successfully deleted!');
                $this->session->setFlashdata('message_type', 'success');
                return redirect()->back();
            } else {
                $this->session->setFlashdata('message', 'Alternative has Failed to delete!');
                $this->session->setFlashdata('message_type', 'error');
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata('message', 'Failed to Delete Alternative!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }

    public function editData($id_alternatif)
    {
        $alternatif = $this->alternatifModel->getAlternatif($id_alternatif);

        $data = [
            'id' => $id_alternatif,
            'alternatif' => $alternatif,
        ];

        return view('page/DataAlternative/editdata', $data);
    }

    public function editDataprocess($id_alternatif)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required'
        ]);

        $kode_alternatif = $this->request->getPost('kode_alternatif');
        $nama_alternatif = $this->request->getPost('nama_alternatif');

        if (empty($kode_alternatif) || empty($nama_alternatif)) {
            if (empty($kode_alternatif)) {
                $validation->setError('kode_alternatif', 'Code must be filled in!');
            }

            if (empty($nama_alternatif)) {
                $validation->setError('nama_alternatif', 'Name must be filled in!');
            }

            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $alternatif = $this->alternatifModel->getAlternatif($id_alternatif);

        $isKodeUnique = true;
        $isNamaUnique = true;

        if ($kode_alternatif !== $alternatif['kode_alternatif']) {
            $isKodeUnique = $this->alternatifModel->isUnique('kode_alternatif', $kode_alternatif);
        }

        if ($nama_alternatif !== $alternatif['nama_alternatif']) {
            $isNamaUnique = $this->alternatifModel->isUnique('nama_alternatif', $nama_alternatif);
        }

        if (!$isKodeUnique || !$isNamaUnique) {
            if (!$isKodeUnique) {
                $validation->setError('kode_alternatif', 'Code already exist!');
            }
            if (!$isNamaUnique) {
                $validation->setError('nama_alternatif', 'Name already exist!');
            }
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $update = $this->alternatifModel->editProcess($id_alternatif, $kode_alternatif, $nama_alternatif);
        if ($update) {
            $this->ActivityLog->saveActivityLog("ID $id_alternatif diupdate", 'alternatif', 'Update');
            $this->session->setFlashdata('message', 'Alternative Successfully updated!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Alternative has been Failed to update!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }
}
