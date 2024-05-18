<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ActivityLogModel;

class AssessmentModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $allowedFields = ['periode_penilaian', 'id_alternatif', 'id_kriteria', 'nilai'];

    public function getPenilaian($id_penilaian)
    {
        $get = $this->where('id_penilaian', $id_penilaian)
            ->first();

        return $get;
    }

    public function get_Penilaian($id_alternatif, $id_kriteria)
    {
        $query = $this->where('id_alternatif', $id_alternatif)
            ->where('id_kriteria', $id_kriteria)
            ->select('nilai')
            ->get();

        return $query->getRowArray();
    }

    public function checkDuplicate($periode_penilaian, $id_alternatif, $checkbox, $kriteria_penilaian)
    {
        foreach ($kriteria_penilaian as $id_kriteria => $nilai_kriteria) {
            if (isset($checkbox[$id_kriteria]) && $checkbox[$id_kriteria] == 'on') {
                $query = $this->where('periode_penilaian', $periode_penilaian)
                    ->where('id_alternatif', $id_alternatif)
                    ->where('id_kriteria', $id_kriteria)
                    ->countAllResults();

                if ($query > 0) {
                    $data = [
                        'periode' => $periode_penilaian,
                        'kriteria' => $id_kriteria
                    ];
                    return $data;
                }
            }
        }

        return false;
    }

    public function addProcess($data_penilaian)
    {
        $data = $data_penilaian;
        $periode_penilaian = $data['periode_penilaian'];
        $id_alternatif = $data['alternatif_penilaian'];
        $checkbox = $data['checkbox'];
        $kriteria_penilaian = $data['kriteria_penilaian'];
        $ActivityLog = new ActivityLogModel();

        foreach ($kriteria_penilaian as $id_kriteria => $nilai) {
            if (isset($checkbox[$id_kriteria]) && $checkbox[$id_kriteria] == 'on') {
                $data_insert = [
                    'periode_penilaian' => $periode_penilaian,
                    'id_alternatif' => $id_alternatif,
                    'id_kriteria' => $id_kriteria,
                    'nilai' => $nilai
                ];
                $ActivityLog->saveActivityLog("Penilaian Alternatif ID $id_alternatif pada Kriteria ID $id_kriteria ditambahkan", 'penilaian', 'Add');
                $this->insert($data_insert);
            }
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

    public function editProcess($id_penilaian, $nilai)
    {
        $update = $this->where('id_penilaian', $id_penilaian)
            ->set(['nilai' => $nilai])
            ->update();

        return true;
    }

    public function deleteByAlternatifId($id_alternatif)
    {
        $this->where('id_alternatif', $id_alternatif)->delete();
        return true;
    }

    public function deleteByKriteriaId($id_kriteria)
    {
        $this->where('id_kriteria', $id_kriteria)->delete();
        return true;
    }
}
