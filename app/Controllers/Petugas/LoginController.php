<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PetugasModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('petugas/auth/login');
    }

    public function logIn()
    {
        $user = new PetugasModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userFound = $user->where([
            'email' => $email
        ])->first();

        if ($userFound) {
            if (password_verify($password, $userFound['password'])) {
                session()->set('petugas', $userFound['email']);

                return redirect()->to(base_url('/petugas'));
            } else {
                session()->setFlashdata('error', 'Username dan Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username dan Password Salah');
            return redirect()->back();
        }
    }
}
