<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ShiftController extends Controller
{

    public function index()
    {
        return view('user.shift.index');
    }

    public function table()
    {
        return view('user.shift.table');
    }

    public function detail()
    {
        return view('user.shift.detail');
    }
}
