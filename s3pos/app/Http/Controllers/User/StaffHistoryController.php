<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffHistory;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class StaffHistoryController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        return view('user.staff_history.index');
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $search = request('search', '');
            $staff_id = request('staff_id', '');
            $date = request('date', date('Y-m-d'));

            $list = StaffHistory::staffId($staff_id);
            $list = $search != '' ? $list->search($search) : $list;
            $list = $staff_id != '' ? $list->staffId($staff_id) : $list;
            // $list = $date != '' ? $list->ofDate($date) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Uesr.staff.table_log', compact('list'))->render(),
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


    public function detail()
    {
        return view('user.staff_history.detail');
    }
}
