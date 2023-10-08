<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('User.auth.login');
    }

    public function dashboard(){
        return view('User.user_layouts');
    }
}