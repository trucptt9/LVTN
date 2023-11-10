<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    protected $limit_default, $store_id;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->middleware(function ($request, $next) {
            $this->store_id = request()->user()->store_id;
            return $next($request);
        });
    }

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
