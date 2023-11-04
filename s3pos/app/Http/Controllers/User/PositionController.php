<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return view('user.position.index');
    }

    public function table()
    {
        return view('user.position.table');
    }

    public function detail()
    {
        return view('user.position.detail');
    }
}
