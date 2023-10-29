<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ToppingCategoryController extends Controller
{

    public function index()
    {
        return view('user.topping_category.index');
    }

    public function table()
    {
        return view('user.topping_category.table');
    }

    public function detail()
    {
        return view('user.topping_category.detail');
    }
}
