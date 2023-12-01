<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class SaleController extends Controller
{
    //
    protected $store_id;

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->store_id = request()->user()->store_id;
        //     return $next($request);
        // });
    }
    public function product(){
        $products = Product::whereHas('category', function ($q) {
            $q->storeId(1);
        })->where('status', Product::STATUS_ACTIVE)->get();

        return response()->json($products);
    }
}