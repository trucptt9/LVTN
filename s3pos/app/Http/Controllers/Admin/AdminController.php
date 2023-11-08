<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'status' => Admin::get_status(),
        ];
        return view('Admin.admin.index', compact('data'));
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $list = Admin::query();
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.admin.table', compact('list'))->render(),
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
        $admin = Admin::findOrFail($id);

        if (request()->ajax()) {
            return view('Admin.admin.show', compact('admin'))->render();
        }
        return view('Admin.admin.detail', compact('admin'));
    }

    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            Admin::create($data);
            DB::commit();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Tạo mới thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi tạo mới',
                'type' => 'error'
            ]);
        }
    }

    public function update()
    {
        try {
            DB::beginTransaction();
            $id = request()->get('id', '');
            $type = request('type', 'one');
            $admin = Admin::find($id);
            if ($type == 'all') {
                $data = request()->all();
                $data['status'] = $admin->status == Admin::STATUS_ACTIVE ? Admin::STATUS_SUSPEND : Admin::STATUS_ACTIVE;
                $admin->update($data);
            } else {
                $admin->status = $admin->status == Admin::STATUS_ACTIVE ? Admin::STATUS_SUSPEND : Admin::STATUS_ACTIVE;
                $admin->save();
            }
            DB::commit();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Cập nhật thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
        }
        return Response::json([
            'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
            'message' => 'Lỗi cập nhật',
            'type' => 'error'
        ]);
    }

    public function delete()
    {
        try {
            DB::beginTransaction();
            $id = request()->get('id', '');
            $admin = Admin::ofRoot('false')->whereId($id)->first();
            if ($admin) {
                $admin->delete();
                DB::commit();
                return Response::json([
                    'status' => ResHTTP::HTTP_OK,
                    'message' => 'Xóa dữ liệu thành công',
                    'type' => 'success'
                ]);
            }
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
        }
        return Response::json([
            'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
            'message' => 'Không thể xóa dữ liệu này!',
            'type' => 'error'
        ]);
    }

    public function report()
    {
        try {
            $sql = "SELECT status, COUNT(*) as total FROM admins GROUP BY status";
            $list = DB::select($sql);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.admin.report', compact('list'))->render(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }
}