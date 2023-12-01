<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\CategoryProduct;
use App\Models\Customer;
use App\Models\MethodPayment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Coupon;
use App\Models\Table;
use App\Models\SaleSource;
use App\Models\Booking;
use App\Models\ToppingGroup;
use App\Models\Toppings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\Cache;

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
        $this->authorize('sale-sale');
        return view('Sale.table.index');
    }

    public function choose_product($id)
    {
        $this->authorize('sale-sale');
        $payment_method = MethodPayment::storeId($this->store_id)->get();
        $table = Table::find($id);
        return view('Sale.home.index', compact('table', 'payment_method'));
    }
    public function category()
    {
        $key = 'sale-category';
        if (Cache::has($key)) {
            $categories = Cache::get($key);
        } else {
            $categories = Cache::rememberForever($key, function () {
                return CategoryProduct::storeId($this->store_id)->where('status', CategoryProduct::STATUS_ACTIVE)->select('id', 'name')->get();
            });
        }
        return view('Sale.home.category', compact('categories'));
    }
    public function payment($id)
    {
        $condition = request('total', '');
        $type = request('type', 'add');
        $rowId = request('rowId', '');
        if ($rowId != '') {
            $item = Cart::get($rowId);
            $qty = $type == 'add' ? $item->qty + 1 : $item->qty - 1;

            Cart::update($rowId, ['qty' => $qty]);
        }
        $sale_source = SaleSource::storeId($this->store_id)->ofStatus(SaleSource::STATUS_ACTIVE)->get();
        $sql1 = "select orders.id, orders.promotion_id, orders.total, orders.sub_total, promotions.`value`, promotions.type_value from `tables` JOIN orders ON tables.order_id = orders.id  
        LEFT JOIN promotions on orders.promotion_id = promotions.id
        WHERE tables.status_order = 'active' AND tables.id = $id";
        $detail_payment = \DB::select($sql1);
        $table = Table::find($id);
        $sql2 = "select orders.*, order_details.product_id, order_details.product_name, order_details.quantity,
        order_details.price, order_details.toppings, order_details.topping_total, products.image 
        from `tables` JOIN orders ON tables.order_id = orders.id JOIN order_details on orders.id = order_details.order_id 
        JOIN products on product_id = products.id WHERE tables.status_order = 'active' AND tables.id = $id";
        $order_detail = \DB::select($sql2);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'payment' => view('Sale.home.payment', compact('detail_payment', 'table', 'sale_source'))->render(),
            'cart' => view('Sale.home.cart', compact('table', 'order_detail'))->render(),
            'detail_payment' => $detail_payment
        ]);
    }
    public function product()
    {
        $key = 'sale-product';
        if (Cache::has($key)) {
            $products = Cache::get($key);
        } else {
            $products = Cache::rememberForever($key, function () {
                return Product::whereHas('category', function ($q) {
                    $q->storeId($this->store_id);
                })->where('status', Product::STATUS_ACTIVE)->select('id', 'name', 'category_id', 'price')->get();
            });
        }
        return view('Sale.home.product', compact('products'));
    }
    public function area()
    {
        $key = 'sale-table-area';
        if (Cache::has($key)) {
            $areas = Cache::get($key);
        } else {
            $areas = Cache::rememberForever($key, function () {
                return Area::storeId($this->store_id)->where('status', Area::STATUS_ACTIVE)->select('id', 'name')->get();
            });
        }
        return view('Sale.table.area', compact('areas'));
    }

    public function table()
    {
        $key = 'sale-table';
        if (Cache::has($key)) {
            $tables = Cache::get($key);
        } else {
            $tables = Cache::rememberForever($key, function () {
                return Table::whereHas('area', function ($q) {
                    $q->storeId($this->store_id);
                })->where('status', Table::STATUS_ACTIVE)->get();
            });
        }
        return view('Sale.table.table', compact('tables'));
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

    public function promotion()
    {
        try {
            $search = request('search', '');
            $current_day = now()->format('Y-m-d');
            $active = Promotion::STATUS_ACTIVE;
            $sql = "SELECT promotions.value, promotions.type_value, promotions.id FROM promotions LEFT JOIN stores ON promotions.store_id = stores.id WHERE 
            promotions.store_id = " . $this->store_id . " AND promotions.status LIKE '$active'
            AND promotions.code = '$search'  AND  '$current_day' BETWEEN (promotions.start) AND promotions.`end`  ";

            $promotion = \DB::select($sql);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'promotion' => $promotion,
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }
    public function add_cart(Request $request, $id)
    {
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->quantity;
        $data['price'] = $request->price;
        $data['options']['image'] = $request->image;
        $data['options']['topping'] = $request->addon;
        Cart::add($data);
        $table = Table::find($id);
        $sql = "select orders.*, order_details.product_id, order_details.product_name, order_details.quantity,
        order_details.price, order_details.toppings, order_details.topping_total,products.image from `tables` JOIN orders ON tables.order_id = orders.id  
        JOIN order_details on orders.id = order_details.order_id join products on product_id = products.id WHERE tables.status_order = 'active' AND tables.id = $id";
        $order_detail = \DB::select($sql);
        // return Cart::content();
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'message' => 'Thêm mới thành công',
            'type' => 'success',
            'data' => view('Sale.home.cart', compact('table', 'order_detail'))->render(),
        ]);
    }

    public function coupons()
    {
        try {
            $current_day = now()->format('Y-m-d');
            $active = Coupon::STATUS_ACTIVE;
            $coupon = Coupon::storeId($this->store_id)->ofStatus(Coupon::STATUS_ACTIVE)
                ->where('quantity', 1)->where('start', '<=', $current_day)->where('end', '>=', $current_day)->get();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('sale.home.promotion', compact('coupon'))->render(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }
    public function cart($id)
    {
        $table = Table::find($id);
        $sql = "select orders.*, order_details.product_id, order_details.product_name, order_details.quantity,
        order_details.price, order_details.toppings, order_details.topping_total, products.image from `tables` JOIN orders ON tables.order_id = orders.id  
        JOIN order_details on orders.id = order_details.order_id JOIN products on product_id = products.id WHERE tables.status_order = 'active' AND tables.id = $id";
        $order_detail = \DB::select($sql);
        return view('Sale.home.cart', compact('table', 'order_detail'))->render();
    }
    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,

        ]);
    }
    public function destroy()
    {
        Cart::destroy();
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'data' => 'Đã hủy giỏ hàng'
        ]);
    }
    public function delete_order()
    {
        try {
            $id = request('id', 0);
            $order = Order::find($id);
            $table = Table::find($order->table_id);
            $table->status_order = Table::STATUS_ORDER_UN_ACTIVE;
            $table->order_id = null;
            $table->booking_id = null;
            $order->delete();
            $table->update();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Đã hủy giỏ hàng!',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Không thể hủy giỏ hàng!',
                'type' => 'error'
            ]);
        }
    }
    public function order()
    {
    }
    public function acceptPayment()
    {
        $table_id = request('table', null);
        $customer_id = request('customer', null);
        $sale_source_id = request('sale_source_id', null);
        $customer_name = request('customer_name', null);
        $promotion_id = request('promotion', null);
        $promotion_type = request('promotion_type', null);
        $discount = request('discount', null);
        $type_discount = request('type_discount', null);
        $discount_total = request('discount_total', null);
        $total = request('total', 0);
        $sub_total = request('sub_total', 0);
        $payment_method = request('payment_method', null);
        $cost = request('total_cost', 0);
        $cart = Cart::content();
        $order = Order::create([
            'staff_id' => auth()->user()->id,
            'store_id' => $this->store_id,
            'sub_total' => Cart::total(),
            'total' => $total,
            'customer_id' => $customer_id,
            'customer_name' => $customer_name,
            'table_id' => $table_id,
            'promotion_id' => $promotion_id,
            'discount' => $discount,
            'discount_type' => $type_discount,
            'discount_total' => $discount_total,
            'sub_total' => $sub_total,
            'method_payment_id' => $payment_method,
            'cost' => $cost,
            'profit' => $total - $cost,
            'sale_source_id' => $sale_source_id
        ]);
        foreach ($cart as $item) {
            $total_topping = 0;
            $quantity = $item->qty;
            if ($item->options->topping) {
                foreach ($item->options->topping as $top) {
                    $tmp = json_decode($top);
                    $total_topping += ($tmp->price * $quantity);
                }
            }
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'toppings' => json_encode($item->options->topping),
                'total' => $item->subtotal,
                'topping_total' => $total_topping,
            ]);
        }
        $order->status = Order::STATUS_FINISH;
        $order->save();
        if ($promotion_type == 'coupon' && $promotion_id) {
            $coupon = Coupon::find($promotion_id);
            $coupon->quantity = 0;
            $coupon->usage = 1;
            $coupon->save();
        }
        if ($promotion_type == 'promotion' && $promotion_id) {
            $promotion = Promotion::find($promotion_id);
            $promotion->quantity =  $promotion->quantity - 1;
            $promotion->save();
        }
        $table = Table::find($table_id);
        if ($table && $table->order_id) {
            $table->status_order = Table::STATUS_ORDER_UN_ACTIVE;
            $table->order_id = null;
            $table->update();
        }

        Cart::destroy();
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
        ]);
    }
    public function saveOrder()
    {

        $table_id = request('table', null);
        $customer_id = request('customer', null);
        $promotion_id = request('promotion', null);
        $promotion_type = request('promotion_type', null);
        $discount = request('discount', null);
        $type_discount = request('type_discount', null);
        $discount_total = request('discount_total', null);
        $total = request('total', 0);
        $sub_total = request('sub_total', 0);
        $customer_name = request('customer_name', '');
        $cost = request('total_cost', 0);
        $sale_source_id = request('sale_source_id', null);
        // $topping_total =  request('topping_total',0);
        $cart = Cart::content();
        $order = Order::create([
            'staff_id' => auth()->user()->id,
            'store_id' => $this->store_id,
            'sub_total' => Cart::total(),
            'total' => $total,
            'customer_id' => $customer_id,
            'table_id' => $table_id,
            'promotion_id' => $promotion_id,
            'discount' => $discount,
            'discount_type' => $type_discount,
            'discount_total' => $discount_total,
            'sub_total' => $sub_total,
            'customer_name' => $customer_name,
            'cost' => $cost,
            'profit' => $total - $cost,
            'sale_source_id' => $sale_source_id
        ]);
        foreach ($cart as $item) {
            $total_topping = 0;
            $quantity = $item->qty;
            if ($item->options->topping) {
                foreach ($item->options->topping as $top) {
                    $tmp = json_decode($top);
                    $total_topping += ($tmp->price * $quantity);
                }
            }
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'toppings' => json_encode($item->options->topping),
                'total' => $item->subtotal,
                'topping_total' => $total_topping,
            ]);
        }
        $order->status = Order::STATUS_TMP;
        $order->save();
        if ($promotion_type == 'coupon' && $promotion_id) {
            $coupon = Coupon::find($promotion_id);
            $coupon->quantity = 0;
            $coupon->usage = 1;
            $coupon->save();
        }
        if ($promotion_type == 'promotion' && $promotion_id) {
            $promotion = Promotion::find($promotion_id);
            $promotion->quantity =  $promotion->quantity - 1;
            $promotion->save();
        }
        $table = Table::find($table_id);
        $table->status_order = Table::STATUS_ORDER_ACTIVE;
        $table->order_id = $order->id;
        $table->booking_id = null;
        $table->update();
        Cart::destroy();
        return redirect()->route('sale.index')->with('success', 'Cập nhật thành công');
    }
    public function try()
    {
        return to_route('index');
    }
    public function paymentOrderTmp(Request $request)
    {
        try {
            $id = $request->order_id;
            $order = Order::find($id);
            $order->status = Order::STATUS_FINISH;
            $table = Table::find($order->table_id);
            $table->status_order = Table::STATUS_ORDER_UN_ACTIVE;
            $table->order_id = null;
            $table->booking_id = null;
            $order->update();
            $table->update();
            Cart::destroy();
            return redirect('/sale');
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }
    public function customer()
    {
        try {
            $search = request('phone', '');
            $type = request('type', 'choose');
            $customer = Customer::storeId($this->store_id)->where('status', Customer::STATUS_ACTIVE)
                ->where('phone', 'like', "%$search%")->orWhere('code', 'like', "%$search%")->get();
            return view('Sale.home.customer', compact('customer', 'type'));
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi',
                'type' => 'error',
                'customer' => $customer
            ]);
        }
    }

    public function booking()
    {
        try {
            $customer_id = request('customer_id', null);
            $table_id = request('table_id', '');
            $name = request('name', '');
            $phone = request('phone');
            $quantity = request('quantity', '');
            $note = request('note', '');
            $booking = Booking::create([
                'table_id' => $table_id,
                'store_id' => $this->store_id,
                'customer_id' => $customer_id,
                'name' => $name,
                'phone' => $phone,
                'quantity' => $quantity,
                'note' => $note
            ]);

            $table = Table::find($table_id);
            $table->booking_id = $booking->id;
            $table->update();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Đặt bàn thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi',
                'type' => 'error'
            ]);
        }
    }
    public function destroy_booking($id)
    {
        try {
            $table = Table::find($id);
            $booking = Booking::find($table->booking_id);
            $booking->delete();
            $table->booking_id = null;
            $table->update();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Hủy đặt bàn thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi',
                'type' => 'error'
            ]);
        }
    }
}
