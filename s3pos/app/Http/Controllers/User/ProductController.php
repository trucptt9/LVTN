<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('user.product.index');
    }

    public function table()
    {
        return view('user.product.table');
    }

    public function add()
    {
        return view('user.product.add');
    }

    public function detail()
    {
        return view('user.product.detail');
    }
}
