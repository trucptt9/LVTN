<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AreaController extends Controller
{
  public function index()
  {
    return view('user.areas.index');
  }

  public function table()
  {
    return view('user.areas.table');
  }

  public function detail()
  {
    return view('user.areas.detail');
  }
}
