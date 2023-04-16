<?php

namespace App\Controllers;

use App\Models\PemilikLahanModel;
use App\Models\UserModel;

class AuthControllerPemilikLahan extends BaseController
{
    public function index()
    {
        return view('auth/pemiliklahan/login');
    }

    public function process_login()
    {
        $user = new PemilikLahanModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userFound = $user->where([
            'email' => $email
        ])->first();

        if ($userFound) {
            if (password_verify($password, $userFound['password'])) {
                session()->set('pemilik-lahan', $userFound['email']);

                return redirect()->to(base_url('/pemilik-lahan'));
            } else {
                session()->setFlashdata('error', 'Username dan Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username dan Password Salah');
            return redirect()->back();
        }
    }

    public function process_logout()
    {

        session()->remove('pemilik-lahan');
        return redirect()->to('/pemilik-lahan');
    }

}