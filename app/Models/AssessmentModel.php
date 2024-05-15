<?php

namespace App\Models;

use CodeIgniter\Model;

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

    public function checkDuplicate($periode_penilaian, $id_alternatif, $checkbox, $kriteria_penilaian)
    {
        foreach ($kriteria_penilaian as $id_kriteria => $nilai_kriteria) {
            if (isset($checkbox[$id_kriteria]) && $checkbox[$id_kriteria] == 'on') {
                $query = $this->where('periode_penilaian', $periode_penilaian)
                    ->where('id_alternatif', $id_alternatif)
                    ->where('id_kriteria', $id_kriteria)
                    ->countAllResults();

                if ($query > 0) {
                    // Duplikasi ditemukan, simpan data terkait dengan duplikasi dalam array
                    $data = [
                        'periode' => $periode_penilaian,
                        'kriteria' => $id_kriteria
                    ];
                    return $data;
                }
            }
        }

        return false; // Tidak ada duplikasi
    }





    public function addProcess($data_penilaian)
    {
        $data = $data_penilaian;
        $periode_penilaian = $data['periode_penilaian'];
        $id_alternatif = $data['alternatif_penilaian'];
        $checkbox = $data['checkbox'];
        $kriteria_penilaian = $data['kriteria_penilaian'];
        foreach ($kriteria_penilaian as $id_kriteria => $nilai) {
            if (isset($checkbox[$id_kriteria]) && $checkbox[$id_kriteria] == 'on') {
                $data_insert = [
                    'periode_penilaian' => $periode_penilaian,
                    'id_alternatif' => $id_alternatif,
                    'id_kriteria' => $id_kriteria,
                    'nilai' => $nilai
                ];
                $this->insert($data_insert);
            }
        }
    }

    public function truncateTable($table)
    {
        $query = $this->db->query("TRUNCATE TABLE $table");

        if ($query) {
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
}
