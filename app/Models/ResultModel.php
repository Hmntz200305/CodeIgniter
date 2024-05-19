<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table      = 'hasil_perhitungan';
    protected $primaryKey = 'id_hasil';
    protected $allowedFields = ['nama_hasil', 'periode_hasil', 'id_alternatif', 'total_nilai'];

    public function getLastNamaHasil()
    {
        $lastRow = $this->select('nama_hasil')
            ->orderBy('id_hasil', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();

        if ($lastRow) {
            return $lastRow->nama_hasil;
        } else {
            return 'PO0';
        }
    }

    public function truncateTable($table)
    {
        $query = $this->db->query("TRUNCATE TABLE $table");
        $ActivityLog = new ActivityLogModel();

        if ($query) {
            $ActivityLog->saveActivityLog("Semua data dihapus dari tabel $table", $table, 'delete');
            return true;
        } else {
            return false;
        }
    }
}
