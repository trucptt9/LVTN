<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        return view('user.product.products.index');
    }

    public function table(){
        return view('user.product.products.table');
    }
    public function add(){
        return view('user.product.products.add');
    }
    
    
//  Start danh mục món
    public function category(){
        return view('user.product.category.index');
    }
    public function category_table(){
        return view('user.product.category.table');
    }

//  End danh mục món
//  Start topping
    public function topping(){
        return view('user.product.topping.index');
    }
    public function topping_table(){
        return view('user.product.topping.table');
    }
    public function topping_add(){
        return view('user.product.topping.add');
    }
//  End topping
//  Start danh mục topping
    public function category_topping(){
        return view('user.product.category_topping.index');
    }
    public function category_topping_table(){
        return view('user.product.category_topping.table');
    }
}