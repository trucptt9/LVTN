<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class StaffHistoryController extends Controller
{

    public function index()
    {
        return view('user.staff_history.index');
    }

    public function table()
    {
        return view('user.staff_history.table');
    }

    public function detail()
    {
        return view('user.staff_history.detail');
    }
}
