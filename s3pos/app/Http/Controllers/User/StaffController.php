<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        return view('user.staff.index');
    }

    public function list()
    {
        return view('user.staff.staffs');
    }

    public function table()
    {
        return view('user.staff.staff_table');
    }

    public function detail()
    {
        return view('user.staff.staff_detail');
    }
    public function report()
    {
        return view('user.staff.staff_report');
    }
}
