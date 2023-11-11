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
        $data = [
            'total' => number_format($query->clone()->count()),
            'revenue' => number_format($query->clone()->ofStatus(Order::STATUS_FINISH)->sum('total')),
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

            $list = Order::between($from, $to)->storeId($this->store_id);
            $clone = $list->clone();
            $status = self::report_by_status($clone);
            $list = $list->select(DB::raw("sum(total) as total"), DB::raw("date(created_at) as date"))
                ->groupBy('date')->orderBy('date', 'asc')->get();
            foreach ($list as $value) {
                array_push($data, $value->total);
                array_push($category, date('d/m/Y', strtotime($value->date)));
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
            'content' => $status
        ]);
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
