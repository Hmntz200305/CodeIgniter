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

    public function checkDuplicate($periode_penilaian, $id_alternatif, $kriteria_penilaian)
    {
        // Iterate over each element in the $kriteria_penilaian array
        foreach ($kriteria_penilaian as $id_kriteria => $nilai_kriteria) {
            // Retrieve the count of rows where the combination exists
            $query = $this->where('periode_penilaian', $periode_penilaian)
                ->where('id_alternatif', $id_alternatif)
                ->where('id_kriteria', $id_kriteria)
                ->countAllResults();
            // If a duplicate is found, return true immediately
            if ($query > 0) {
                return true;
            }
        }

        // If no duplicate is found, return false
        return false;
    }



    public function addProcess($data_penilaian)
    {
        $data = $data_penilaian;
        $periode_penilaian = $data['periode_penilaian'];
        $id_alternatif = $data['alternatif_penilaian'];
        $kriteria_penilaian = $data['kriteria_penilaian'];
        foreach ($kriteria_penilaian as $id_kriteria => $nilai) {
            $data_insert = [
                'periode_penilaian' => $periode_penilaian,
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_kriteria,
                'nilai' => $nilai
            ];
            $this->insert($data_insert);
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