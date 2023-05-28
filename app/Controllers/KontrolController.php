<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemilikLahanModel;
use App\Models\UserModel;

class KontrolController extends BaseController
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
        ];
        return view('pemilik-lahan/kontrol', $data);
    }
}