<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;

class LogoutController extends BaseController
{
    public function logOut()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }
}
