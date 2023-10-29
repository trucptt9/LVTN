<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
  public function index()
  {
    return view('user.stores.index');
  }

  public function table()
  {
    return view('user.stores.table');
  }

  public function detail()
  {
    return view('user.stores.detail');
  }

  public function report()
  {
    return view('user.stores.report');
  }
}
