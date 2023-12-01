<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffHistory;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class StaffHistoryController extends Controller
{
    protected $limit_default, $store_id;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->middleware(function ($request, $next) {
            $this->store_id = request()->user()->store_id;
            return $next($request);
        });
    }

    public function index()
    {
        $this->authorize('staff_history-view');
        $data = [
            'staffs' => Staff::ofStatus(Staff::STATUS_ACTIVE)->get(),
            'date' => get_date_string()
        ];
        return view('user.staff_history.index', compact('data'));
    }

    public function list()
    {
        $this->authorize('staff_history-view');
        try {
            $limit = request('limit', $this->limit_default);
            $search = request('search', '');
            $staff_id = request('staff_id', '');
            $date = request('date', date('Y-m-d'));

            $list = StaffHistory::whereHas('staff', function ($q) {
                $q->storeId($this->store_id);
            })->staffId($staff_id);
            $list = $search != '' ? $list->search($search) : $list;
            $list = $staff_id != '' ? $list->staffId($staff_id) : $list;
            // $list = $date != '' ? $list->ofDate($date) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.staff_history.table', compact('list'))->render(),
                'total' => $list->total(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }


    public function detail($id)
    {
        $staff_history = StaffHistory::findOrFail($id);
        return view('user.staff_history.detail', compact('staff_history'));
    }
}