<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{

    public function index()
    {
        return view('user.department.index');
    }

    public function table()
    {
        return view('user.department.table');
    }

    public function detail()
    {
        return view('user.department.department_detail');
    }
}
