<?php

namespace App\Controllers;

class History extends BaseController
{
    protected $ActivityLog;
    protected $userDataModel;

    public function __construct()
    {
        $this->ActivityLog = new  \App\Models\ActivityLogModel();
        $this->userDataModel = new \App\Models\UserDataModel();
    }

    public function index()
    {
        // Mengambil semua data log
        $logs = $this->ActivityLog->findAll();

        // Menyimpan log berdasarkan jenis kegiatan (Delete, Update, Add)
        $deleteLogs = [];
        $updateLogs = [];
        $addLogs = [];

        // Mendapatkan nama pengguna untuk setiap log
        foreach ($logs as $log) {
            $username = $this->userDataModel->getUser($log['id_user'])['nama'];

            switch ($log['activity_type']) {
                case 'Delete':
                    // Menambahkan nama pengguna ke log delete
                    $log['username'] = $username;
                    $deleteLogs[] = $log;
                    break;
                case 'Update':
                    $log['username'] = $username;
                    $updateLogs[] = $log;
                    break;
                case 'Add':
                    $log['username'] = $username;
                    $addLogs[] = $log;
                    break;
                default:
                    // Do nothing or handle other types if needed
                    break;
            }
        }

        // Mengirimkan data ke view
        $data = [
            'deleteLogs' => $deleteLogs,
            'updateLogs' => $updateLogs,
            'addLogs' => $addLogs
        ];

        return view('page/History/index', $data);
    }
}
