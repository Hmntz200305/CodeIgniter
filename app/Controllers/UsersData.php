<?php

namespace App\Controllers;

class UsersData extends BaseController
{
    public function index()
    {
        return view('page/UsersData/index');
    }
    public function addUsers()
    {
        return view('page/UsersData/addusers');
    }
    public function editUsers()
    {
        return view('page/UsersData/editusers');
    }
}
