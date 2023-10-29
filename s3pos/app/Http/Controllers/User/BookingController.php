<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        return view('user.booking.index');
    }

    public function table()
    {
        return view('user.booking.table');
    }

    public function detail()
    {
        return view('user.booking.detail');
    }
}
