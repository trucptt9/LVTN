<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    //
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
    public function table_log()
    {
        return view('user.promotion.detail_table_log');
    }
}