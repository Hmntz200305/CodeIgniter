<?php

namespace App\Models;

use CodeIgniter\Model;

class CriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields = ['kode_kriteria', 'deskripsi_kriteria', 'bobot_kriteria'];

    public function getKriteria($id_kriteria)
    {
        $get = $this->where('id_kriteria', $id_kriteria)->findAll();

        return $get;
    }

    public function isUnique($kolom, $value)
    {
        $result = $this->where($kolom, $value)
            ->countAllResults();

        return $result === 0;
    }

    public function addProcess($kode_kriteria, $deskripsi_kriteria, $bobot_kriteria)
    {
        $check = $this->where('kode_kriteria', $kode_kriteria)
            ->orWhere('deskripsi_kriteria', $deskripsi_kriteria)
            ->first();

        if ($check) {
            return false;
        }

        $data = [
            'kode_kriteria' => $kode_kriteria,
            'deskripsi_kriteria' => $deskripsi_kriteria,
            'bobot_kriteria' => $bobot_kriteria
        ];

        $this->insert($data);

        return true;
    }

    public function editProcess($id_kriteria, $kode_kriteria, $deskripsi_kriteria,  $bobot_kriteria)
    {
        $update = $this->where('id_kriteria', $id_kriteria)
            ->set(['kode_kriteria' => $kode_kriteria, 'deskripsi_kriteria' => $deskripsi_kriteria, 'bobot_kriteria' => $bobot_kriteria])
            ->update();
    }
}
