<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function table()
    {
        return view('admin.order.table');
    }

    public function detail()
    {
        return view('admin.order.detail');
    }
}
