<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        return view('auth/forgot_password');
    }
}
