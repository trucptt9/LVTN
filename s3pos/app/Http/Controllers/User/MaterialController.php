<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        return view('user.material.index');
    }

    public function table()
    {
        return view('user.material.table');
    }

    public function detail()
    {
        return view('user.material.detail');
    }
}
