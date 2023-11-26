<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\License;
use App\Models\Module;
use App\Models\Package;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'admins' => Admin::count(),
            'licenses' => License::count(),
            'stores' => Store::count(),
            'packages' => Package::count(),
            'modules' => Module::count(),
        ];
        return view('Admin.home.index', compact('data'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cache::flush();
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');
    }

    public function top_store()
    {
        $sql = "SELECT store_id, SUM(total) AS revenue, COUNT(*) AS order_count, stores.name
            FROM orders LEFT JOIN stores ON orders.store_id = stores.id
            WHERE orders.status = 'finish'
            GROUP BY store_id, name 
            ORDER BY revenue DESC
            LIMIT 10";
        $list = DB::select($sql);
        return view('Admin.home.store', compact('list'))->render();
    }

    public function top_product()
    {
        $sql = "SELECT product_id, product_name, SUM(order_details.total) AS revenue, SUM(quantity) as quantity 
        FROM order_details INNER JOIN orders ON order_details.order_id = orders.id 
        WHERE orders.status = 'finish'
        GROUP BY product_id, product_name 
        ORDER BY revenue DESC
        LIMIT 10
        ";
        $list = DB::select($sql);
        return view('Admin.home.product', compact('list'))->render();
    }

    public function revenue_by_month()
    {
        $year = request('year', date('Y'));
        $sql = "SELECT MONTH(orders.created_at) AS month, SUM(total) AS revenue, COUNT(*) AS order_count
            FROM orders LEFT JOIN stores ON orders.store_id = stores.id
            WHERE orders.status = 'finish'
            AND YEAR(orders.created_at) = " . $year . "
            GROUP BY month ORDER BY month";
        $list = DB::select($sql);
        return $list;
    }

    public function guide()
    {
        return view('Admin.guide.index');
    }
}