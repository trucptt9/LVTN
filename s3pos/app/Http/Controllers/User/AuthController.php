<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.authen.login');
    }

    public function login_post()
    {
    }

    public function forgot_password()
    {
        return view('user.authen.login');
    }

    public function forgot_password_post()
    {
    }
}
