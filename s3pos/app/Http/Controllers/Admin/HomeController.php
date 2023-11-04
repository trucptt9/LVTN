<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\License;
use App\Models\Package;
use App\Models\Store;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('Admin.home.index');
    }

    public function total()
    {
        $data = [
            'admins' => Admin::count(),
            'licenses' => License::all(),
            'stores' => Store::all(),
            'packages' => Package::all(),
        ];
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'data' => $data
        ]);
    }

    public function revenue()
    {
        $sql = "SELECT store_id, SUM(total) AS amount, COUNT(*) as total, stores.name FROM orders INNER JOIN stores ON orders.store_id = stores.id GROUP BY store_id, name";
        $list = DB::select($sql);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'data' => $list
        ]);
    }
}
