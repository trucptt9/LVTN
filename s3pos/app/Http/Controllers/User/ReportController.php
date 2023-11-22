<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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
       
        return view('User.report.index');
    }

    public function report_all()
    {
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
        $query = Order::storeId($this->store_id);
        $sql = "select count(orders.id) as count_order from orders where orders.status != 'destroy'
         and orders.store_id = ".$this->store_id." AND DATE_FORMAT(orders.created_at,'%Y-%m-%d') BETWEEN  '$start' AND '$end'";
        
        $sql1 = "select sum(orders.total) as total from orders where orders.status = 'finish'
        and orders.store_id = ".$this->store_id." AND DATE_FORMAT(orders.created_at,'%Y-%m-%d') BETWEEN  '$start' AND '$end' ";
        $count = DB::select($sql);
        $total =  DB::select($sql1);
        $data = [
            'total' => $count[0]->count_order ,
            'revenue' => number_format( $total[0]->total),
        ];  
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'data' => $data
        ]);
    }

    public function report_chart()
    {
        $data = [];
        $category = [];
        $status = [];
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
            $sql_status = "SELECT orders.`status` as `status`, SUM(total) AS revenue,count(orders.id) as total,
            SUM(profit) as profit, SUM(discount_total) as discount, SUM(cost) as cost ,
            COUNT(*) AS order_count FROM orders LEFT JOIN stores ON orders.store_id = stores.id 
            WHERE stores.id = " . $this->store_id . "  
            AND  DATE_FORMAT(orders.created_at,'%Y-%m-%d') BETWEEN  '$start' AND '$end' GROUP BY status ORDER BY status";
             $status = self::report_by_status($sql_status);
           
            foreach ($list as $value) {
                array_push($data, $value->revenue);
                array_push($category, date('d/m/Y', strtotime($value->day)));
            }
             
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'chart' => [
                'data' => $data,
                'category' => $category,
            ],
            'content' => $status
        ]); 
        } catch (\Throwable $th) {
            showLog($th);
        }
       
    }

    public static function report_by_status($query)
    {
        $category = [];
        $data = [];
        $list = DB::select($query);
        if (!is_null($list)) {
            foreach ($list as $item) {
                array_push($data, $item->revenue);
                array_push($category, $item->status);
            }
        }
        return [
            'table' => view('User.report.table', compact('list'))->render(),
            'data' => $data,
            'category' => $category
        ];
    }
}