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
        $query = Order::storeId($this->store_id);
        $sql = "select count(orders.id) as count_order from orders where orders.status != 'destroy'";
        $sql1 = "select sum(orders.total) as total from orders where orders.status == 'finish'";
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
        try{
            $type_time = request('type_time', '');
            $start = request('start');
            $end = request('end');
            $start = date_format(date_create($start), 'Y-m-d');
            $end = date_format(date_create($end), 'Y-m-d');
            if (!$type_time || $type_time == 'hour') {
                $sql_hour = "SELECT DATE_FORMAT(orders.created_at, '%H:00') AS hour_range, SUM(total) AS revenue,
                    SUM(profit) as profit, SUM(discount_total) as discount, SUM(cost) as cost ,
                     COUNT(*) AS order_count
                    FROM orders LEFT JOIN stores ON orders.store_id = stores.id
                    WHERE stores.id = " . $this->store_id . " 
                    AND orders.created_at BETWEEN  '$start' AND '$end' GROUP BY hour_range ORDER BY hour_range";
                $list = DB::select($sql_hour);
            } else if ($type_time == 'date') {
                $sql_day = "SELECT DATE_FORMAT(orders.created_at,'%Y-%m-%d') AS day, SUM(total) AS revenue,
                    SUM(profit) as profit, SUM(discount_total) as discount, SUM(cost) as cost ,
                    COUNT(*) AS order_count, stores.name
                    FROM orders LEFT JOIN stores ON orders.store_id = stores.id 
                    WHERE stores.id = " . $this->store_id . " 
                    AND orders.created_at BETWEEN  '$start' AND '$end' GROUP BY day ORDER BY day";
                $list = DB::select($sql_day);
            } else {
                $sql_month = "SELECT DATE_FORMAT(orders.created_at,'%c') AS month, SUM(total) AS revenue, 
                    SUM(profit) as profit, SUM(discount_amount) as discount, SUM(cost) as cost ,
                   COUNT(*) AS order_count
                    FROM orders LEFT JOIN stores ON orders.store_id = stores.id
                    WHERE stores.id = " . $this->store_id . " AND YEAR(orders.created_at) BETWEEN YEAR('$start')  AND YEAR('$end')
                    AND orders.created_at BETWEEN  '$start' AND '$end' GROUP BY month ORDER BY CAST(month as INT) ASC ";
                $list = DB::select($sql_month);
            }
            $data = [
                $list,
                $type_time
            ];
             return $data;
        }catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }

    }

    public static function report_by_status($query)
    {
        $category = [];
        $data = [];
        $list = $query->select(DB::raw("count(*) as total"), DB::raw("sum(total) as revenue"), 'status')
            ->groupBy('status')->orderBy('total', 'desc')->get();
        if (!is_null($list)) {
            foreach ($list as $item) {
                array_push($data, $item->revenue);
                array_push($category, $item->status);
            }
        }
        return [
            'table' => view('User.report.table', ['list' => $list])->render(),
            'data' => $data,
            'category' => $category
        ];
    }
}