<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PetugasModel;

class KetinggianAirController extends BaseController
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

        return view('petugas/ketinggian_air', $data);
    }
}
