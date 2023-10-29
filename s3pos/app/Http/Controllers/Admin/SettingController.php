<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function table()
    {
        return view('admin.setting.table');
    }

    public function detail()
    {
        return view('admin.setting.detail');
    }
}
