<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
  public function index()
  {
    return view('user.store.index');
  }

  public function table()
  {
    return view('user.store.table');
  }

  public function detail()
  {
    return view('user.store.detail');
  }

  public function report()
  {
    return view('user.store.report');
  }
}
