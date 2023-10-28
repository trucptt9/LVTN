<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        return view('user.order.index');  
      }
      public function table(){
        return view('user.order.table');  
      }
      public function detail(){
        return view('user.order.detail');  
      }
      public function report(){
        return view('user.order.report');  
      }
      public function table_detail(){
        return view('user.order.table_detail');  
      }
}