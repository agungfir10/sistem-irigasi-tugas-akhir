<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $email = session()->get('email');

        $user = $userModel->where([
            'email' => $email
        ])->first();

        return view('home', $user);
    }
}