<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $alternatifModel;
    protected $kriteriaModel;
    protected $penialianModel;
    protected $userDataModel;

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->kriteriaModel = new \App\Models\CriteriaModel();
        $this->penialianModel = new \App\Models\AssessmentModel();
        $this->userDataModel = new \App\Models\UserDataModel();
    }


    public function index()
    {
        // Mengambil jumlah data dari masing-masing model
        $jumlahAlternatif = $this->alternatifModel->countAll();
        $jumlahKriteria = $this->kriteriaModel->countAll();
        $jumlahPenilaian = $this->penialianModel->countAll();
        $jumlahUserData = $this->userDataModel->countAll();

        // Mengirimkan data ke view
        $data = [
            'jumlahAlternatif' => $jumlahAlternatif,
            'jumlahKriteria' => $jumlahKriteria,
            'jumlahPenilaian' => $jumlahPenilaian,
            'jumlahUserData' => $jumlahUserData
        ];

        return view('page/Dashboard/index', $data);
    }
}
