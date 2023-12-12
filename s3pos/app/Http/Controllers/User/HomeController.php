<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Promotion;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $store_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->store_id = request()->user()->store_id;
            return $next($request);
        });
    }

    public function index()
    {
        $data = [
            'staffs' => Staff::storeId($this->store_id)->count(),
            'promotions' => Promotion::storeId($this->store_id)->count(),
            'customers' => Customer::storeId($this->store_id)->count(),
            'orders' => Order::storeId($this->store_id)->count(),
        ];
        return view('User.home.index', compact('data'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }

    public function revenue()
    {
        $data = [];
        $category = [];
        try {
            $date = request('date', '');
            if ($date != '') {
                $_array = explode('to', $date);
                $from = trim($_array[0]);
                $to = isset($_array[1]) ? trim($_array[1]) : $_array[0];
            } else {
                $to = now();
                $from = now()->subDays(30);
            }
            $start = date_format(date_create($from), 'Y-m-d');
            $end = date_format(date_create($to), 'Y-m-d');

            $sql_day = "SELECT DATE_FORMAT(orders.created_at,'%Y-%m-%d') AS day, SUM(total) AS revenue,
            SUM(profit) as profit, SUM(discount_total) as discount, SUM(cost) as cost , COUNT(*) AS order_count
            FROM orders LEFT JOIN stores ON orders.store_id = stores.id  WHERE stores.id = " . $this->store_id . " 
            AND  DATE_FORMAT(orders.created_at,'%Y-%m-%d') BETWEEN  '$start' AND '$end' GROUP BY day ORDER BY day";
            $list = DB::select($sql_day);
            foreach ($list as $value) {
                array_push($data, $value->revenue);
                array_push($category, date('d/m/Y', strtotime($value->day)));
            }
        } catch (\Throwable $th) {
            showLog($th);
        }
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'chart' => [
                'data' => $data,
                'category' => $category,
            ],
        ]);
    }
}