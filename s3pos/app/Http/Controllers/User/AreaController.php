<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function index(){
        return view('user.areas.index');  
      }
      public function table(){
        return view('user.areas.table');  
      }
      public function detail(){
        // return view('user.areas.detail');  
      }
      public function report(){
        return view('user.areas.report');  
      }
}