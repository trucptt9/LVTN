<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function show(){
        return view('User.user.store.area.all_area');
    }
}