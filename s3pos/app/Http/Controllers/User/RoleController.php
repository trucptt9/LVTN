<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function index()
    {
        return view('user.role.index');
    }

    public function table()
    {
        return view('user.role.table');
    }

    public function detail()
    {
        return view('user.role.detail');
    }
}
