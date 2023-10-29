<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function index()
    {
        return view('user.import.index');
    }

    public function table()
    {
        return view('user.import.table');
    }

    public function detail()
    {
        return view('user.import.detail');
    }
}
