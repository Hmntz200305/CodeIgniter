<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDataModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user_level', 'nama', 'email', 'username', 'password'];


    public function getUser($id_user)
    {
        $get = $this->where('id_user', $id_user)
            ->first();

        return $get;
    }

    public function isUnique($kolom, $value)
    {
        $result = $this->where($kolom, $value)
            ->countAllResults();

        return $result === 0;
    }

    public function addProcess($role, $nama, $email, $username, $password)
    {
        $data = [
            'id_user_level' => $role,
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ];

        $this->insert($data);
    }

    public function editProcess($id_user, $name,  $role)
    {
        $update = $this->where('id_user', $id_user)
            ->set(['nama' => $name, 'id_user_level' => $role])
            ->update();

        return true;
    }
}