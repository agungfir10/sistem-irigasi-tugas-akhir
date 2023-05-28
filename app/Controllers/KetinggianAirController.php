<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemilikLahanModel;

class KetinggianAirController extends BaseController
{
    public function index()
    {
        $userModel = new PemilikLahanModel();
        $email = session()->get('pemilik-lahan');

        $user = $userModel->where([
            'email' => $email
        ])->first();

        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'listPetani' => []
        ];

        return view('pemilik-lahan/ketinggian_air', $data);
    }
}
