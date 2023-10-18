<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function index(){
        return view('user.tables.index');  
      }
      public function table(){
        return view('user.tables.table');  
      }
      public function detail(){
        // return view('user.areas.detail');  
      }
      public function report(){
        return view('user.tables.report');  
      }
}