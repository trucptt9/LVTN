<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.store.index');
    }

    public function table()
    {
        return view('admin.store.table');
    }

    public function detail()
    {
        return view('admin.store.detail');
    }
}
