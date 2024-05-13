<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $userData = session()->get();

        if (isset($userData['logged_in']) && $userData['logged_in'] === true && isset($userData['username'])) {
            $username = $userData['username'];

            return view('page/Dashboard/index', ['username' => $username]);
        } else {
            return redirect()->to('/login');
        }
    }
}
