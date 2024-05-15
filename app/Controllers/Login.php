<?php

namespace App\Controllers;

class Login extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new \App\Models\LoginModel();
    }

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('login');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $md5password = md5($password);
        $user = $this->loginModel->LoginProccess($username, $md5password);

        if ($user) {
            $userData = [
                'user_id' => $user['id_user'],
                'username' => $user['username'],
                'name' => $user['nama'],
                'id_user_level' => $user['id_user_level'],
                'logged_in' => true
            ];

            session()->set($userData);

            return redirect()->to('/');
        } else {
            // Display error message or redirect back to login page with error message
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}