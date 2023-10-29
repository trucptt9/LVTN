<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  public function index()
  {
    return view('user.order.index');
  }

  public function table()
  {
    return view('user.order.table');
  }

  public function detail()
  {
    return view('user.order.detail');
  }

  public function report()
  {
    return view('user.order.report');
  }
}
