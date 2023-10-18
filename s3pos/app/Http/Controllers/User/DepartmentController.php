<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function departments()
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