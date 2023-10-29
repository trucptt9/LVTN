<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('user.warehouse.index');
    }

    public function table()
    {
        return view('user.warehouse.table');
    }

    public function detail()
    {
        return view('user.warehouse.detail');
    }
}
