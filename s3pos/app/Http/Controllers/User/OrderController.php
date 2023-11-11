<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class OrderController extends Controller
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
      'status' => Order::get_status(),
    ];
    return view('user.order.index', compact('data'));
  }

  public function table()
  {
    try {
      $limit = request('limit', $this->limit_default);
      $status = request('status', '');
      $search = request('search', '');

      $list = Order::storeId($this->store_id);
      $list = $status != '' ? $list->ofStatus($status) : $list;
      $list = $search != '' ? $list->search($search) : $list;

      $list = $list->latest()->paginate($limit);

      return Response::json([
        'status' => ResHTTP::HTTP_OK,
        'data' => view('User.order.table', compact('list'))->render(),
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
    $order = Order::storeId($this->store_id)->findOrFail($id);
    return view('user.order.detail', compact('order'));
  }

  public function delete(Request $request)
  {
    try {
      $id = $request->get('id', '');
      $order = Order::storeId($this->store_id)->ofStatus(Order::STATUS_TMP)->whereId($id)->first();
      if ($order) {
        $order->delete();
        return Response::json([
          'status' => ResHTTP::HTTP_OK,
          'message' => 'Xóa dữ liệu thành công',
          'type' => 'success'
        ]);
      }
    } catch (\Throwable $th) {
      showLog($th);
    }
    return Response::json([
      'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
      'message' => 'Không thể xóa dữ liệu này!',
      'type' => 'error'
    ]);
  }
}
