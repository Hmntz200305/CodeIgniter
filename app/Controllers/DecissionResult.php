<?php

namespace App\Controllers;

class DecissionResult extends BaseController
{

    protected $alternatifModel;
    protected $hasilModel;
    protected $ActivityLog;
    protected $session;

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->hasilModel = new \App\Models\ResultModel();
        $this->ActivityLog = new  \App\Models\ActivityLogModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data = [];
        $hasil = $this->hasilModel->findAll();
        foreach ($hasil as $key => $row) {
            $name_alternatif = $this->alternatifModel->getAlternatif($row['id_alternatif']);

            $hasil[$key]['nama_alternatif'] = $name_alternatif['nama_alternatif'];
        }

        $data['hasil'] = $hasil;

        return view('page/DecissionResult/index', $data);
    }

    public function clearprocess()
    {
        $truncate = $this->hasilModel->truncateTable('hasil_perhitungan');

        if ($truncate) {
            $this->ActivityLog->saveActivityLog("Semua data dihapus", 'hasil_perhitungan', 'Delete');
            $this->session->setFlashdata('message', 'Table Successfully cleaned!');
            $this->session->setFlashdata('message_type', 'success');
            return redirect()->back();
        } else {
            $this->session->setFlashdata('message', 'Failed to clean table!');
            $this->session->setFlashdata('message_type', 'error');
            return redirect()->back();
        }
    }
}
