<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class SupplierController extends Controller
{

    public function index()
    {
        return view('user.supplier.index');
    }

    public function table()
    {
        return view('user.supplier.table');
    }

    public function detail()
    {
        return view('user.supplier.detail');
    }
}
