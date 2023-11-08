<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Package;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'status' => Package::get_status(),
            'modules' => Module::ofStatus(Module::STATUS_ACTIVE)->get(),
        ];
        return view('Admin.package.index', compact('data'));
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $list = Package::withCount('licenses');
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.package.table', compact('list'))->render(),
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
        $package = Package::withCount('licenses')->findOrFail($id);
        $data = [
            'status' => Package::get_status(),
            'modules' => Module::ofStatus(Module::STATUS_ACTIVE)->get(),
        ];
        return view('Admin.package.detail', compact('package', 'data'));
    }

    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['modules'] = json_encode($data['modules']);
            Package::create($data);
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
            $package = Package::find($id);
            if ($type == 'all') {
                $data = request()->all();
                $data['status'] = $package->status == Package::STATUS_ACTIVE ? Package::STATUS_BLOCKED : Package::STATUS_ACTIVE;
                $data['modules'] = json_encode($data['modules']);
                $package->update($data);
            } else {
                $package->status = $package->status == Package::STATUS_ACTIVE ? Package::STATUS_BLOCKED : Package::STATUS_ACTIVE;
                $package->save();
            }
            DB::commit();
            if (request()->ajax()) {
                return Response::json([
                    'status' => ResHTTP::HTTP_OK,
                    'message' => 'Cập nhật thành công',
                    'type' => 'success'
                ]);
            }
            return redirect()->back()->with('success', 'Cập nhật thành công');
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
            $package = Package::withCount('licenses')->find($id);
            if ($package && $package->licenses_count == 0) {
                $package->delete();
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
