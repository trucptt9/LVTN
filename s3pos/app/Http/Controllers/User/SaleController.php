<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\CategoryProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Table;
use App\Models\ToppingGroup;
use App\Models\Toppings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class SaleController extends Controller
{
    protected $store_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->store_id = request()->user()->store_id;
            return $next($request);
        });
    }

    public function index()
    {
        return view('Sale.home.index');
    }

    public function category()
    {
        $categories = CategoryProduct::storeId($this->store_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();
        return view('Sale.home.category', compact('categories'));
    }

    public function product()
    {
        $cat = CategoryProduct::storeId($this->store_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();
        $category_id = array();
        foreach ($cat as $val) {
            $category_id[] = $val->id;
        }
        $products = Product::categoryId($category_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();
        return view('Sale.home.product', compact('products'));
    }

    public function detail($id)
    {
        $topping_group = ToppingGroup::storeId($this->store_id)->where('status', ToppingGroup::STATUS_ACTIVE)->get();
        $group_id = array();
        foreach ($topping_group as $val) {
            $group_id[] = $val->id;
        }
        $toppings = Toppings::groupId($group_id)->where('status', Toppings::STATUS_ACTIVE)->get();
        $product = Product::find($id);
        return view('Sale.home.modal_add', compact('product', 'toppings'))->render();
    }

    public function add_cart(Request $request)
    {
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->quantity;
        $data['price'] = $request->price;
        $data['options']['image'] = $request->image;
        $data['options']['topping'] = $request->addon;
        Cart::add($data);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'data' => view('Sale.home.cart')->render()
        ]);
    }

    public function cart()
    {
        return view('Sale.home.cart')->render();
    }

    public function payment()
    {
        return view('Sale.home.payment')->render();
    }

    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,

        ]);
    }

    public function table()
    {
        $area = Area::storeId($this->store_id)->get();
        $area_id = array();
        foreach ($area as $val) {
            $area_id[] = $val->id;
        }
        $table = Table::areaId($area_id)->get();
        return view('Sale.home.modal_table', compact('area', 'table'))->render();
    }

    public function destroy()
    {
        Cart::destroy();
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'data' => 'Đã hủy giỏ hàng'
        ]);
    }

    public function acceptPayment()
    {
        $table_id = request('table_id', null);
        $cart = Cart::content();
        $order = Order::create([
            'staff_id' => auth()->user()->id,
            'store_id' => $this->store_id,
            'sub_total' => Cart::total(),
            'total' => Cart::subTotal(),
            'table_id' => $table_id
        ]);
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'toppings' => json_encode($item->options),
                'total' => $item->subtotal
            ]);
        }
        $order->status = Order::STATUS_FINISH;
        $order->save();
        Cart::destroy();
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'payment' => view('Sale.home.payment')->render(),
            'new_item' => '<li class="list-group-item d-flex justify-content-between align-items-center">
                ' . $order->code . '
                <span class="badge bg-primary rounded-pill">
                    ' . number_format($order->total) . '
                </span>
            </li>'
        ]);
    }

    public function load_history_order()
    {
        $list = Order::storeId($this->store_id)->ofStatus(Order::STATUS_FINISH)->whereDate('created_at', date('Y-m-d'))->latest()->get();
        return view('Sale.home.history_order', compact('list'))->render();
    }

    public function update_item()
    {
        $type = request('type', 'add');
        $rowId = request('rowId', '');
        $item = Cart::get($rowId);
        $qty = $type == 'add' ? $item->qty + 1 : $item->qty - 1;
        Cart::update($rowId, ['qty' => $qty]);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'cart' => view('Sale.home.cart')->render(),
            'payment' => view('Sale.home.payment')->render()
        ]);
    }
}
