<?php

namespace App\Controllers;

use App\Models\PemilikLahanModel;
use App\Models\UserModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class HomePemilikLahan extends BaseController
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

        return view('pemilik-lahan/home', $data);
    }

    public function listPetani()
    {
        $userModel = new PemilikLahanModel();
        $email = session()->get('pemilik-lahan');

        $user = $userModel->where([
            'email' => $email
        ])->first();

        $petani = new UserModel();

        $listPetani = $petani->findAll();
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'listPetani' => $listPetani
        ];

        return view('pemilik-lahan/petani', $data);


    }

    public function tambahPetani()
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
        return view('pemilik-lahan/tambah-petani', $data);
    }

    public function processTambahPetani()
    {
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if (empty($name) && empty($email) && empty($password)) {
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('message', 'Nama, Email dan Password tidak boleh kosong!');
            return redirect()->back();
        }

        $user = new UserModel();

        $userFound = $user->where('email', $email)->find();

        if ($userFound != null) {
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('message', 'Email sudah terdaftar!');
            return redirect()->back();
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $user->save([
            'email' => $email,
            'name' => $name,
            'password' => $passwordHash
        ]);
        session()->setFlashdata('status', 'success');
        session()->setFlashdata('message', 'Sukses menambahkan petani');
        return redirect()->back();


    }
}