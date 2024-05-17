<?php

namespace App\Models;

use CodeIgniter\Model;

class CalculationModel extends Model
{

    public function getMaxValuesByCriteria()
    {
        $maxValues = [];
        $kriteria = $this->db->table('kriteria')->get()->getResultArray();
        foreach ($kriteria as $kriteria_item) {
            $maxValue = $this->db->table('penilaian')
                ->selectMax('nilai')
                ->where('id_kriteria', $kriteria_item['id_kriteria'])
                ->get()
                ->getRow();
            $maxValues[$kriteria_item['deskripsi_kriteria']] = $maxValue->nilai;
        }
        return $maxValues;
    }

    public function getMinValuesByCriteria()
    {
        $minValues = [];
        $kriteria = $this->db->table('kriteria')->get()->getResultArray();
        foreach ($kriteria as $kriteria_item) {
            $minValue = $this->db->table('penilaian')
                ->selectMin('nilai')
                ->where('id_kriteria', $kriteria_item['id_kriteria'])
                ->get()
                ->getRow();
            $minValues[$kriteria_item['deskripsi_kriteria']] = $minValue->nilai;
        }
        return $minValues;
    }

    public function getBobotKriteria()
    {
        $bobotKriteria = [];
        $kriteria = $this->db->table('kriteria')->get()->getResultArray();
        foreach ($kriteria as $kriteria_item) {
            $bobotKriteria[] = $kriteria_item['bobot_kriteria'];
        }
        return $bobotKriteria;
    }

    public function hasil_perhitungan($nama_hasil, $id_alternatif, $total_nilai)
    {
        $data = [
            'nama_hasil' => $nama_hasil,
            'periode_hasil' => date('Y'),
            'id_alternatif' => $id_alternatif,
            'total_nilai' => $total_nilai
        ];

        $this->db->table('hasil_perhitungan')->insert($data);
    }
}
