<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function index()
    {
        return view('user.promotion.index');
    }

    public function table()
    {
        return view('user.promotion.table');
    }

    public function detail()
    {
        return view('user.promotion.detail');
    }
}
