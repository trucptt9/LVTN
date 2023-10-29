<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LicenseController extends Controller
{
    public function index()
    {
        return view('admin.license.index');
    }

    public function table()
    {
        return view('admin.license.table');
    }

    public function detail()
    {
        return view('admin.license.detail');
    }
}
