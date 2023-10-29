<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ToppingController extends Controller
{

    public function index()
    {
        return view('user.topping.index');
    }

    public function table()
    {
        return view('user.topping.table');
    }

    public function detail()
    {
        return view('user.topping.detail');
    }
}
