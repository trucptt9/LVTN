<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class BusinessTypeController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'status' => BusinessType::get_status(),
        ];
        return view('Admin.business_type.index', compact('data'));
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $list = BusinessType::withCount('stores');
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.business_type.table', compact('list'))->render(),
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
        $business_type = BusinessType::withCount('stores')->findOrFail($id);

        if (request()->ajax()) {
            return view('Admin.business_type.show', compact('business_type'))->render();
        }

        return view('Admin.business_type.detail', compact('business_type'));
    }

    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            BusinessType::create($data);
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
            $business_type = BusinessType::find($id);
            if ($type == 'all') {
                $data = request()->all();
                $data['status'] = $business_type->status == BusinessType::STATUS_ACTIVE ? BusinessType::STATUS_BLOCKED : BusinessType::STATUS_ACTIVE;
                $business_type->update($data);
            } else {
                $business_type->status = $business_type->status == BusinessType::STATUS_ACTIVE ? BusinessType::STATUS_BLOCKED : BusinessType::STATUS_ACTIVE;
                $business_type->save();
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
            $business_type = BusinessType::withCount('stores')->find($id);
            if ($business_type && $business_type->count_stores == 0) {
                $business_type->delete();
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
}