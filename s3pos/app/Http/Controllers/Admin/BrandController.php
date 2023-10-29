<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function table()
    {
        return view('admin.brand.table');
    }

    public function detail()
    {
        return view('admin.brand.detail');
    }
}
