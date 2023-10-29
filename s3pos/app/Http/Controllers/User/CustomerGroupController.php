<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CustomerGroupController extends Controller
{
    public function index()
    {
        return view('user.customer_group.index');
    }

    public function table()
    {
        return view('user.customer_group.table');
    }

    public function detail()
    {
        return view('user.customer_group.detail');
    }
}
