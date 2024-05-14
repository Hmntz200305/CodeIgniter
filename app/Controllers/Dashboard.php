<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $username = $this->getName();
        return view('page/Dashboard/index', ['username' => $username]);
    }
}
