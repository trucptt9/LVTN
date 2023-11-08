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
            // 'customer_group'=> CustomerGroup::storeId($this->store_id)->get(), 
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


    public function detail($id)
    {
      $data = [
        'status' => Coupon::get_status(),
      ];
      $coupon = Coupon::storeId($this->store_id)->findOrFail($id);
      return view('user.coupon.modal_edit', compact('coupon', 'data'))->render();
  
  
    }
    public function insert(CouponInsertRequest $request)
    {
        try {
            $data = $request->all();
           
            $data['store_id'] = $this->store_id;
            // $data['status'] = request('status', Coupon::STATUS_BLOCKED);
            $data['start'] = date('Y-m-d', strtotime($request->start)) ;
            $data['end'] = date('Y-m-d', strtotime($request->end)) ;
            Coupon::create($data);
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
          if ($type == 'all') {
            $data = $request->all();
            $Coupon->update($data);
          } else {
            $Coupon->status = $Coupon->status == Coupon::STATUS_ACTIVE ? Coupon::STATUS_BLOCKED : Coupon::STATUS_ACTIVE;
            $Coupon->save();
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