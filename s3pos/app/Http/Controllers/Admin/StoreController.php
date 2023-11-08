<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'status' => Store::get_status(),
        ];
        return view('Admin.store.index', compact('data'));
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $business_type_id = request('business_type_id', '');

            $list = Store::with('businessType');
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;
            $list = $business_type_id != '' ? $list->businessTypeId($business_type_id) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.store.table', compact('list'))->render(),
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
        $store = Store::with('businessType')->findOrFail($id);
        return view('Admin.store.detail', compact('store'));
    }

    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            Store::create($data);
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
            $store = Store::find($id);
            if ($type == 'all') {
                $data = request()->all();
                $data['status'] = $store->status == Store::STATUS_ACTIVE ? Store::STATUS_BLOCKED : Store::STATUS_ACTIVE;
                $store->update($data);
            } else {
                $store->status = $store->status == Store::STATUS_ACTIVE ? Store::STATUS_BLOCKED : Store::STATUS_ACTIVE;
                $store->save();
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
            $store = Store::ofStatus(Store::STATUS_UN_ACTIVE)->find($id);
            if ($store) {
                $store->delete();
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
