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
    public function staff_table(){
        return view('user.staff.staff_table');
    }
    public function staff_detail(){
        return view('user.staff.staff_detail');
    }
    public function schedule(){
        return view('user.staff.schedule.schedule_table');
    }
   
}