<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemilikLahanModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Config\Services;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        return view('auth/forgot_password');
    }

    public function reset()
    {
        $model = new PemilikLahanModel();

        // ambil email dari input field
        $email = $this->request->getPost('email');

        // cari user berdasarkan email
        $user = $model->where('email', $email)->first();

        if ($user === null) {
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('message', 'User Tidak Ditemukan!');
            // jika user tidak ditemukan, tampilkan pesan error
            return redirect()->back();
        }

        // buat token acak dan simpan ke dalam kolom reset_token pada tabel user
        $token = bin2hex(random_bytes(16));
        $expires_at = Time::now()->addMinutes(30);

        $model->update($user['id'], ['reset_token' => $token, 'reset_token_expires_at' => $expires_at]);

        $this->send_otp_email($user['email'], $token);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('message', 'Instruksi reset password telah dikirim ke email Anda!');
        return redirect()->to('/pemilik-lahan/login');
    }

    public function send_otp_email($to, $token)
    {
        $email = Services::email();
        $email->setTo($to);
        $email->setFrom('agungfirid@gmail.com', 'Reset Password');
        $email->setSubject('Reset Password');
        $email->setMessage('Click the following link to reset your password: ' . base_url('pemilik-lahan/reset?token=' . $token));
        if ($email->send()) {
            echo 'Email successfully sent';
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
}
