<?php

namespace App\Controllers;

class DecissionResult extends BaseController
{

    protected $alternatifModel;
    protected $hasilModel;

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->hasilModel = new \App\Models\ResultModel();
    }
    public function index()
    {
        $data = [];
        $hasil = $this->hasilModel->findAll();
        foreach ($hasil as $key => $row) {
            // Mendapatkan nama alternatif berdasarkan id_alternatif
            $name_alternatif = $this->alternatifModel->getAlternatif($row['id_alternatif']);

            // Menambahkan 'nama_alternatif' ke dalam setiap elemen hasil
            $hasil[$key]['nama_alternatif'] = $name_alternatif['nama_alternatif'];
        }

        // Menyimpan hasil di dalam array data
        $data['hasil'] = $hasil;

        // Mengirimkan data ke view
        return view('page/DecissionResult/index', $data);
    }
}
