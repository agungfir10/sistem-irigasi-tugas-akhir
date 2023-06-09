<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PetugasModel;
use CodeIgniter\I18n\Time;

class ResetPasswordController extends BaseController
{

    public function index()
    {
        $model = new PetugasModel();

        // ambil token dari parameter url
        $token = $this->request->getGet('token');

        // cari user berdasarkan token
        $user = $model->where('reset_token', $token)
            ->where('reset_token_expires_at >', Time::now())
            ->first();

        if ($user === null) {
            // jika token tidak valid, tampilkan pesan error
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('message', 'Token tidak valid atau kadaluarsa!');
            return view('auth/reset_password');
        }

        $data = [
            'token' => $token
        ];
        return view('petugas/auth/reset_password', $data);
    }

    public function reset()
    {
        $model = new PetugasModel();

        // ambil token dari input field
        $token = $this->request->getPost('token');

        // cari user berdasarkan token
        $user = $model->where('reset_token', $token)
            ->where('reset_token_expires_at >', Time::now())
            ->first();

        if ($user === null) {
            // jika token tidak valid, tampilkan pesan error
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('message', 'Token tidak valid');

            return view('petugas/auth/reset_password');
        }

        // ambil password baru dan
        $password = $this->request->getVar('password');

        $model->update($user['id'], [
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        session()->setFlashdata('status', 'success');
        session()->setFlashdata('message', 'Sukses mengganti password, silahkan login dengan password baru');

        return redirect()->back();
    }
}
