<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponDeleteRequest;
use App\Http\Requests\Coupon\CouponInsertRequest;
use App\Http\Requests\Coupon\CouponUpdateRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
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
        $data = [
            'status' => Coupon::get_status(),
        ];
        return view('user.coupon.index', compact('data'));
    }

    public function add()
    {
        return view('User.coupon.add');
    }

    public function list()
    {

        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $list = Coupon::storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.coupon.table', compact('list'))->render(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }

    public function log()
    {
        return view('User.coupon.log');
    }

    public function detail($id)
    {
        $data = [
            'status' => Coupon::get_status(),
        ];
        $coupon = Coupon::storeId($this->store_id)->findOrFail($id);
        $status = Coupon::get_status($coupon->status);
        if (request()->ajax()) {
            return view('user.coupon.modal_edit', compact('coupon', 'data'))->render();
        }
        return view('user.coupon.detail', compact('coupon', 'data', 'status'))->render();
    }
    public function table_log($id)
    {
        try {
            // $limit = request('limit', $this->limit_default);
            // $status = request('status', '');
            // $search = request('search', '');
            // $type = request('type', '');
            // $list = Co::customerId($id);
            // $list = $status != '' ? $list->ofStatus($status) : $list;
            // $list = $search != '' ? $list->search($search) : $list;
            // $list = $type != '' ? $list->type($type) : $list;
            // $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.customer.table_customer', compact('list'))->render(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }

    public function insert(CouponInsertRequest $request)
    {
        try {
            $data = $request->all();

            $data['store_id'] = $this->store_id;

            $data['start'] = date('Y-m-d', strtotime($request->start));
            $data['end'] = date('Y-m-d', strtotime($request->end));
            $quantity = $request->quantity;
            for ($i = 0; $i < $quantity; ++$i) {
                Coupon::create($data);
            }

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Tạo mới thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);

            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi tạo mới',
                'type' => 'error'
            ]);
        }
    }

    public function update(CouponUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $Coupon = Coupon::storeId($this->store_id)->whereId($id)->first();
            $status_cur = Coupon::get_status($Coupon->status);
            if ($type == 'all') {
                $data = $request->all();
                $Coupon->update($data);
            } else {
                $Coupon->status = $Coupon->status == Coupon::STATUS_ACTIVE ? Coupon::STATUS_BLOCKED : Coupon::STATUS_ACTIVE;
                $Coupon->save();
            }
            DB::commit();
            $status_update = Coupon::get_status($Coupon->status);
            if (request()->ajax()) {
                return Response::json([
                    'status' => ResHTTP::HTTP_OK,
                    'message' => 'Cập nhật thành công',
                    'type' => 'success',
                    'status_update' => $status_update,
                    'status_cur' => $status_cur,

                ]);
            }
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi cập nhật',
                'type' => 'error'
            ]);
        }
    }

    public function delete(CouponDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $coupon = Coupon::storeId($this->store_id)->whereId($id)->first();
            $coupon->delete();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Xóa dữ liệu thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Không thể xóa dữ liệu này!',
                'type' => 'error'
            ]);
        }
    }
}
