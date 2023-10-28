<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    public function index(){
        return view('user.product.unit.index');  
      }
      public function table(){
        return view('user.product.unit.table');  
      }
}