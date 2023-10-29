<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('user.product_category.index');
    }

    public function table()
    {
        return view('user.product_category.table');
    }

    public function detail()
    {
        return view('user.product_category.detail');
    }
}
