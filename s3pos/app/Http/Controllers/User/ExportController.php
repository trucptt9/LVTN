<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function index()
    {
        return view('user.export.index');
    }

    public function table()
    {
        return view('user.export.table');
    }

    public function detail()
    {
        return view('user.export.detail');
    }
}
