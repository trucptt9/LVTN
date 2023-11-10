<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ToppingGroup;
use App\Models\Toppings;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $limit_default, $store_id;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->store_id = request()->user()->store_id;
            return $next($request);
        });
    }

    public function index()
    {
        return view('Sale.home.index');
    }

    public function category()
    {
        $categories = CategoryProduct::storeId($this->store_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();
        return view('Sale.home.category', compact('categories'));
    }

    public function product()
    {
        $cat = CategoryProduct::storeId($this->store_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();
        $category_id = array();
        foreach ($cat as $val) {
            $category_id[] = $val->id;
        }
        $products = Product::categoryId($category_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();

        return view('Sale.home.product', compact('products'));
    }

    public function detail($id)
    {
        $topping_group = ToppingGroup::storeId($this->store_id)->where('status', ToppingGroup::STATUS_ACTIVE)->get();
        $group_id = array();
        foreach ($topping_group as $val) {
            $group_id[] = $val->id;
        }
        $toppings = Toppings::groupId($group_id)->where('status', Toppings::STATUS_ACTIVE)->get();
        $product = Product::find($id);

        return view('Sale.home.modal_add', compact('product', 'toppings'))->render();
    }

    public function add()
    {
    }
}
