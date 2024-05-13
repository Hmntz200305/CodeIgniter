<?php

namespace App\Controllers;

class DataAssessment extends BaseController
{
    public function index()
    {
        return view('page/DataAssessment/index');
    }
    public function addData()
    {
        return view('page/DataAssessment/addData');
    }
    public function editData()
    {
        return view('page/DataAssessment/editData');
    }
}
