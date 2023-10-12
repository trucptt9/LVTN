<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function show(){
        return view('User.user.store.all_store');
    }
    public function table(){
        return view('User.user.store.table_store');
    }
}