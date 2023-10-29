<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        return view('user.customer.index');
    }

    public function list()
    {
        return view('user.customer.staffs');
    }

    public function table()
    {
        return view('user.customer.table');
    }

    public function detail()
    {
        return view('user.customer.detail');
    }

    public function report()
    {
        return view('user.customer.staff_report');
    }
}
