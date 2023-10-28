<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('user.customer.index');
    }
    public function list()
    {
        return view('user.customer.staffs');
    }
    public function table()
    {
        return view('user.customer.table');
    }
    public function detail()
    {
        return view('user.customer.detail');
    }
    public function report()
    {
        return view('user.customer.staff_report');
    }


    // group-customer
    public function index_group()
    {
        return view('user.customer.customer_group.index');
    }
   
    public function table_group()
    {
        return view('user.customer.customer_group.table');
    }
}