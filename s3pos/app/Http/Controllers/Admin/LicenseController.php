<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\Package;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'status' => License::get_status(),
        ];
        return view('Admin.license.index', compact('data'));
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $store_id = request('store_id', '');
            $package_id = request('package_id', '');

            $list = License::query();
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;
            $list = $store_id != '' ? $list->storeId($store_id) : $list;
            $list = $package_id != '' ? $list->packageId($package_id) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.license.table', compact('list'))->render(),
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
        $license = License::with('payment', 'store', 'package')->findOrFail($id);
        return view('Admin.license.detail', compact('license'));
    }

    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $package = Package::find($data['package_id']);
            $total_month = $data['total_month'] ?? 1;
            $data['total_amount'] = $package->amount * $total_month;
            License::create($data);
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
            $license = License::ofStatus(License::STATUS_UN_ACTIVE)->whereId($id)->first();
            if ($type == 'all') {
                $data = request()->all();
                $package = Package::find($data['package_id']);
                $total_month = $data['total_month'] ?? 1;
                $data['total_amount'] = $package->amount * $total_month;
                $license->update($data);
            } else {
                $license->status = $license->status == License::STATUS_ACTIVE ? License::STATUS_SUSPEND : License::STATUS_ACTIVE;
                $license->save();
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
            $license = License::ofStatus(License::STATUS_UN_ACTIVE)->whereId($id)->first();
            if ($license) {
                $license->delete();
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
            $sql = "SELECT status, SUM(total_amount) AS amount, COUNT(*) as total FROM license GROUP BY status";
            $list = DB::select($sql);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.license.report', compact('list'))->render(),
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
