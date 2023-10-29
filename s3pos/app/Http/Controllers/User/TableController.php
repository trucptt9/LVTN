<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TableController extends Controller
{
  public function index()
  {
    return view('user.table.index');
  }

  public function table()
  {
    return view('user.table.table');
  }

  public function detail()
  {
    return view('user.table.detail');
  }

  public function report()
  {
    return view('user.table.report');
  }
}
