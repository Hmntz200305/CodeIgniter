<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    public function LoginProccess($username, $password)
    {
        $user = $this->where('username', $username)
            ->where('password', $password)
            ->first();

        return $user;
    }
}
