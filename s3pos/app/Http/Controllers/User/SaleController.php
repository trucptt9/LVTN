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
        return view('Sale.table.index');
    }
    public function choose_product($id)
    {
        $payment_method = MethodPayment::storeId($this->store_id)->get();
        $table = Table::find($id); 
        Cart::destroy();
        return view('Sale.home.index', compact('table','payment_method'));
    }
    public function category()
    {
        $categories = CategoryProduct::storeId($this->store_id)->where('status', CategoryProduct::STATUS_ACTIVE)->get();
        return view('Sale.home.category', compact('categories'));
    }
    public function payment($id)
    {
        $search = request('search' ,'');
        $condition = request('total' ,'');
        $current_day = now()->format('Y-m-d');
        $active = Promotion::STATUS_ACTIVE;
        
        $type = request('type', 'add');
        $rowId = request('rowId', '');
        if($rowId != ''){
            $item = Cart::get($rowId);
            $qty = $type == 'add' ? $item->qty + 1 : $item->qty - 1;
            
            Cart::update($rowId, ['qty' => $qty]);
        }
        $sql = "SELECT promotions.value, promotions.type_value, promotions.id FROM promotions LEFT JOIN stores ON promotions.store_id = stores.id WHERE 
        promotions.store_id = ".$this->store_id." AND promotions.status LIKE '$active'
        AND promotions.code = '$search'  AND  '$current_day' BETWEEN (promotions.start) AND promotions.`end` 
        ";
        $promotion = \DB::select($sql);
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
            'promotion' => $promotion,
            'payment' => view('Sale.home.payment', compact('promotion','detail_payment','table'))->render(),
            'cart' => view('Sale.home.cart',compact('table','order_detail'))->render(),
            'detail_payment' => $detail_payment
        ]);
    }
    public function product()   
    {
        $products = Product::whereHas('category', function ($q) {
            $q->storeId($this->store_id);
        })->where('status', Product::STATUS_ACTIVE)->get();
        return view('Sale.home.product', compact('products'));
    }
    public function area()
    {
        $areas = Area::storeId($this->store_id)->where('status', Area::STATUS_ACTIVE)->get();
        return view('Sale.table.area', compact('areas'));
    }

    public function table()
    {
        $tables = Table::whereHas('area', function ($q) {
            $q->storeId($this->store_id);
        })->where('status', Table::STATUS_ACTIVE)->get();
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

    public function add_cart(Request $request)
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
        
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'message'=>'Thêm mới thành công',
            'type' => 'success',
            'data' => view('Sale.home.cart', compact('table', 'order_detail'))->render(),
        ]);
    }

    public function cart($id)
    {
        $table = Table::find($id);
        $sql = "select orders.*, order_details.product_id, order_details.product_name, order_details.quantity,
        order_details.price, order_details.toppings, order_details.topping_total, products.image from `tables` JOIN orders ON tables.order_id = orders.id  
        JOIN order_details on orders.id = order_details.order_id JOIN products on product_id = products.id WHERE tables.status_order = 'active' AND tables.id = $id";
        $order_detail = \DB::select($sql);
        return view('Sale.home.cart',compact('table', 'order_detail'))->render();
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
    public function delete_order(){
       try{
            $id = request('id', 0);
            $order = Order::find($id);           
            $table = Table::find($order->table_id);
            $table->status_order = Table::STATUS_ORDER_UN_ACTIVE;
            $table->order_id = null;
            $order->delete();
            $table->update();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Đã hủy giỏ hàng!',
                'type' => 'success'
            ]);
       }catch (\Throwable $th) {
        showLog($th);
        return Response::json([
            'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
            'message' => 'Không thể xóa giỏ hàng!',
            'type' => 'error'
        ]);
    }
        
    }
    public function order(){
        
    }
    public function acceptPayment()
    {
        $table_id = request('table', null);
        $customer_id = request('customer', null);
        $promotion_id = request('promotion', null);
        $discount = request('discount', null);
        $type_discount = request('type_discount', null);
        $discount_total = request('discount_total', null);
        $total = request('total', 0);
        $sub_total = request('sub_total', 0);
        $payment_method = request('payment_method',null);
        $cost = request('total_cost',0);
        $topping_total = request('topping_total' ,0);
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
            'sub_total' =>$sub_total,
            'method_payment_id' => $payment_method,
            'cost'=>$cost,
            'profit' => $total - $cost
        ]);
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'toppings' => json_encode($item->options->topping),
                'total' => $item->subtotal,
                'topping_total' => $topping_total,
            ]);
        }
        $order->status = Order::STATUS_FINISH;
        $order->save();
        $table = Table::find($table_id);
        $table->status_order = Table::STATUS_ORDER_UN_ACTIVE;
        $table->order_id = $order->id;
        $table->update();
        Cart::destroy();
        $sql1 = "select orders.id,orders.promotion_id, orders.total, orders.sub_total, promotions.`value`, promotions.type_value from `tables` JOIN orders ON tables.order_id = orders.id  
        LEFT JOIN promotions on orders.promotion_id = promotions.id
        WHERE tables.status_order = 'active' AND tables.id = $table_id";
        $detail_payment = \DB::select($sql1);
        return Response::json([
            'status' => ResHTTP::HTTP_OK,
            'payment' => view('Sale.home.payment', compact('detail_payment','table'))->render(),
            'new_item' => '<li class="list-group-item d-flex justify-content-between align-items-center">
                ' . $order->code . '
                <span class="badge bg-primary rounded-pill">
                    ' . number_format($order->total) . '
                </span>
            </li>'
        ]);
    }
    public function saveOrder()
    {
        $table_id = request('table', null);
        $customer_id = request('customer', null);
        $promotion_id = request('promotion', null);
        $discount = request('discount', null);
        $type_discount = request('type_discount', null);
        $discount_total = request('discount_total', null);
        $total = request('total', 0);
        $sub_total = request('sub_total', 0);
        $customer_name = request('customer_name','');
        $cost = request('total_cost',0);
        $topping_total =  request('topping_total',0);
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
            'sub_total' =>$sub_total,
            'customer_name' =>$customer_name,
            'cost'=>$cost,
            'profit' => $total - $cost
        ]);
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
                'toppings' => json_encode($item->options->topping),
                'total' => $item->subtotal,
                'topping_total' => $topping_total,
            ]);
        }
        $order->status = Order::STATUS_TMP;
        $order->save();
        $table = Table::find($table_id);
        $table->status_order = Table::STATUS_ORDER_ACTIVE;
        $table->order_id = $order->id;
        $table->update();
        // Cart::destroy();
        return redirect()->route('sale.index')->with('success', 'Cập nhật thành công');
    }   
    public function try(){
        return to_route('index');
    }
    public function paymentOrderTmp(Request $request){
        try{
            $id = $request->order_id;
            $order = Order::find($id);
            $order->status = Order::STATUS_FINISH;
            $table = Table::find($order->table_id);
            $table->status_order = Table::STATUS_ORDER_UN_ACTIVE;
            $table->order_id = null;
            $order->update();
            $table->update();
            return redirect('/sale');
            
        }catch (\Throwable $th) {
                showLog($th);
                return Response::json([
                    'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                    'data' => '',
                ]);
            }
        
    }
    public function customer()
    {
        $search = request('phone','');
        $customer = Customer::storeId($this->store_id)->where('status',Customer::STATUS_ACTIVE)->where('phone','like',$search)->first();
        return $customer;
    }

    
}