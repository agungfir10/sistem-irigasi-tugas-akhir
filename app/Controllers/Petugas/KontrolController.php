<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PetugasModel;

class KontrolController extends BaseController
{
    public function index()
    {
        $userModel = new PetugasModel();
        $email = session()->get('petugas');

        $user = $userModel->where([
            'email' => $email
        ])->first();

        $data = [
            'title' => 'Dashboard',
            'user' => $user,
        ];
        return view('petugas/kontrol', $data);
    }
}
