<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function process_login()
    {
        $user = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userFound = $user->where([
            'email' => $email
        ])->first();

        if ($userFound) {
            if (password_verify($password, $userFound['password'])) {
                session()->set([
                    'email' => $userFound['email'],
                ]);

                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->back();
        }
    }

    public function process_logout()
    {

        session()->remove('email');
        return redirect()->to('/');
    }

}