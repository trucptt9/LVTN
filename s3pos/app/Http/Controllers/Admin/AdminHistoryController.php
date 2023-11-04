<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminHistory;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class AdminHistoryController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'admins' => Admin::all(),
        ];
        return view('Admin.admin_history.index', compact('data'));
    }

    public function list()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $search = request('search', '');
            $admin_id = request('admin_id', '');

            $list = AdminHistory::query();
            $list = $search != '' ? $list->search($search) : $list;
            $list = $admin_id != '' ? $list->adminId($admin_id) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.admin_history.table', compact('list'))->render(),
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
        $admin_history = AdminHistory::with('admin')->findOrFail($id);
        return view('Admin.admin_history.detail', compact('admin_history'));
    }
}
