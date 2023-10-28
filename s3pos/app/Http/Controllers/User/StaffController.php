<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function index(){
        return view('user.staff.index');
    }
    public function list(){
        return view('user.staff.staffs');
    }
    public function table(){
        return view('user.staff.staff_table');
    }
    public function detail(){
        return view('user.staff.staff_detail');
    }
    public function report(){
        return view('user.staff.staff_report');
    }
    public function table_permision(){
        return view('user.staff.permission_table');
    }
   
    // Ca làm việc
    public function table_shift(){
        return view('user.staff.shift.table');
    }
}