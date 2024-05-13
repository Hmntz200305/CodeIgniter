<?php

namespace App\Controllers;

class DataAlternative extends BaseController
{

    protected $alternatifModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternatifModel();
    }

    public function index()
    {
        $DataTable = $this->alternatifModel->findAll();
        $data = [
            'Alternatif' => $DataTable
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
                    'required' => 'Kode harus diisi',
                    'is_unique' => 'Kode sudah terdaftar'
                ]
            ],
            'nama_alternatif' => [
                'rules' => 'required|is_unique[alternatif.nama_alternatif]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'is_unique' => 'Nama sudah terdaftar'
                ]
            ]
        ]);

        // Jalankan validasi
        if (!$validation->run($this->request->getPost())) {
            // Jika validasi gagal, kembalikan dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari input form
        $kode_alternatif = $this->request->getPost('kode_alternatif');
        $nama_alternatif = $this->request->getPost('nama_alternatif');

        // Panggil method untuk menambahkan data baru ke dalam model
        $insert = $this->alternatifModel->addProcess($kode_alternatif, $nama_alternatif);

        // Redirect ke halaman yang sesuai setelah proses selesai
        return redirect()->to('dataalternative/adddata');
    }


    public function deleteprocess($id_alternatif)
    {
        $delete = $this->alternatifModel->delete($id_alternatif);

        if ($delete) {
            return redirect()->to('/dataalternative');
        } else {
            echo "Failed to delete data.";
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
                $validation->setError('kode_alternatif', 'Kode harus diisi');
            }

            if (empty($nama_alternatif)) {
                $validation->setError('nama_alternatif', 'Nama harus diisi');
            }

            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $alternatif = $this->alternatifModel->getAlternatif($id_alternatif);

        $isKodeUnique = true;
        $isNamaUnique = true;

        if ($kode_alternatif !== $alternatif[0]['kode_alternatif']) {
            $isKodeUnique = $this->alternatifModel->isUnique('kode_alternatif', $kode_alternatif);
        }

        if ($nama_alternatif !== $alternatif[0]['nama_alternatif']) {
            $isNamaUnique = $this->alternatifModel->isUnique('nama_alternatif', $nama_alternatif);
        }

        if (!$isKodeUnique || !$isNamaUnique) {
            if (!$isKodeUnique) {
                $validation->setError('kode_alternatif', 'Kode sudah terdaftar');
            }
            if (!$isNamaUnique) {
                $validation->setError('nama_alternatif', 'Nama sudah terdaftar');
            }
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $update = $this->alternatifModel->editProcess($id_alternatif, $kode_alternatif, $nama_alternatif);
        return redirect()->to('/dataalternative');
    }
}
