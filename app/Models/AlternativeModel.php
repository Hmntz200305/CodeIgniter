<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternativeModel extends Model
{
    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $allowedFields = ['kode_alternatif', 'nama_alternatif'];


    public function getAlternatif($id_alternatif)
    {
        $get = $this->where('id_alternatif', $id_alternatif)
            ->first();

        return $get;
    }

    public function isUnique($kolom, $value)
    {
        $result = $this->where($kolom, $value)
            ->countAllResults();

        return $result === 0;
    }

    public function addProcess($kode_alternatif, $nama_alternatif)
    {
        $data = [
            'kode_alternatif' => $kode_alternatif,
            'nama_alternatif' => $nama_alternatif
        ];

        $this->insert($data);

        return true;
    }

    public function editProcess($id_alternatif, $kode_alternatif,  $nama_alternatif)
    {
        $update = $this->where('id_alternatif', $id_alternatif)
            ->set(['kode_alternatif' => $kode_alternatif, 'nama_alternatif' => $nama_alternatif])
            ->update();

        return true;
    }
}
