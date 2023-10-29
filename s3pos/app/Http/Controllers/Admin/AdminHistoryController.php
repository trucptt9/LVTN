<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHistoryController extends Controller
{
    public function index()
    {
        return view('admin.admin_history.index');
    }

    public function table()
    {
        return view('admin.admin_history.table');
    }

    public function detail()
    {
        return view('admin.admin_history.detail');
    }
}
