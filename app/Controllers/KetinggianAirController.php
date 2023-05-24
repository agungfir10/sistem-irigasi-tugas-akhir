<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KetinggianAirController extends BaseController
{
    public function index()
    {
        return view('admin/ketinggian_air');
    }
}