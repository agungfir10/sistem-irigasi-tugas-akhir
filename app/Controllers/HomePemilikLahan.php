<?php

namespace App\Controllers;

use App\Models\PemilikLahanModel;

class HomePemilikLahan extends BaseController
{
    public function index()
    {
        $userModel = new PemilikLahanModel();
        $email = session()->get('pemilik-lahan');

        $user = $userModel->where([
            'email' => $email
        ])->first();

        return view('pemilik-lahan/home', $user);
    }
}