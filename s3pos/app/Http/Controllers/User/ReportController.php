<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function index()
    {
        return view('user.report.index');
    }
}
