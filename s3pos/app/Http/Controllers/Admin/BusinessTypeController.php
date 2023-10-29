<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BusinessTypeController extends Controller
{
    public function index()
    {
        return view('admin.business_type.index');
    }

    public function table()
    {
        return view('admin.business_type.table');
    }

    public function detail()
    {
        return view('admin.business_type.detail');
    }
}
