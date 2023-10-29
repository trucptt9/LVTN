<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        return view('user.coupon.index');
    }

    public function table()
    {
        return view('user.coupon.table');
    }

    public function detail()
    {
        return view('user.coupon.detail');
    }
}
