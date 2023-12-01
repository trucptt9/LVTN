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
    $this->authorize('order-view');
    $data = [
      'status' => Order::get_status(),
    ];
    return view('user.order.index', compact('data'));
  }

  public function table()
  {
    $this->authorize('order-view');
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
    $this->authorize('order-view');
    $order = Order::storeId($this->store_id)->findOrFail($id);
    // return $order; 
    return view('user.order.detail', compact('order'));
  }
  public function table_detail($id)
  {
    $order = Order::storeId($this->store_id)->findOrFail($id);
    $sql = "select order_details.product_id, order_details.product_name, order_details.quantity,
    order_details.price, order_details.toppings, order_details.topping_total from orders JOIN 
    order_details ON orders.id = order_details.order_id where orders.id = $id ";
      $order_detail = \DB::select($sql);
    return view('user.order.table_detail', compact('order_detail'));
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