<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\MethodPayment\MethodPaymentDeleteRequest;
use App\Http\Requests\MethodPayment\MethodPaymentInsertRequest;
use App\Http\Requests\MethodPayment\MethodPaymentUpdateRequest;
use App\Models\MethodPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class MethodPaymentController extends Controller
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
      $this->authorize('method_payment-view');
      $data = [
        'status' => MethodPayment::get_status(),
      ];
      return view('User.method_payment.index', compact('data'));
    }
  
    public function list()
    {
      $this->authorize('method_payment-view');
      try {
        $limit = request('limit', $this->limit_default);
        $status = request('status', '');
        $search = request('search', '');

        $list = MethodPayment::storeId($this->store_id);
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $search != '' ? $list->search($search) : $list;
  
        $list = $list->latest()->paginate($limit);
  
        return Response::json([
          'status' => ResHTTP::HTTP_OK,
          'data' => view('User.method_payment.table', compact('list'))->render(),
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
        'status' => MethodPayment::get_status(),
      ];
      $method_payment = MethodPayment::findOrFail($id);
      return view('user.method_payment.modal_edit', compact('method_payment', 'data'))->render();
    }
  
    public function insert(MethodPaymentInsertRequest $request)
    {
      try {
        $data = $request->all();
  
        $data['status'] = request('status', MethodPayment::STATUS_BLOCKED);
        $data['store_id'] = $this->store_id;
        MethodPayment::create($data);
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
  
    public function update(MethodPaymentUpdateRequest $request)
    {
      try {
        DB::beginTransaction();
        $id = $request->get('id', '');
        $type = request('type', 'one');
        $method_payment = MethodPayment::whereId($id)->first();
        if ($type == 'all') {
          $data = $request->all();
          $method_payment->update($data);
        } else {
          $method_payment->status = $method_payment->status == MethodPayment::STATUS_ACTIVE ? MethodPayment::STATUS_BLOCKED : MethodPayment::STATUS_ACTIVE;
          $method_payment->save();
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
  
    public function delete(MethodPaymentDeleteRequest $request)
    {
      try {
        $id = $request->get('id', '');
        $method_payment = MethodPayment::whereId($id)->first();
        $method_payment->delete();
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