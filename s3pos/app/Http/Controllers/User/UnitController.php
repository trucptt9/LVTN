<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UnitController extends Controller
{

  public function index()
  {
    return view('user.unit.index');
  }

  public function table()
  {
    return view('user.unit.table');
  }

  public function detail()
  {
    return view('user.unit.detail');
  }
}
