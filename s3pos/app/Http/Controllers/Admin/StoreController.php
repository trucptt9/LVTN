<?php

namespace App\Http\Controllers\Admin;

use App\Events\GenerateDataStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResetManagerPassword;
use App\Models\BusinessType;
use App\Models\Order;
use App\Models\Staff;
use App\Models\Store;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    protected $limit_default;

    public function __construct()
    {
        $this->limit_default = 10;
    }

    public function index()
    {
        $data = [
            'status' => Store::get_status(),
            'business_types' => BusinessType::ofStatus(BusinessType::STATUS_ACTIVE)->get(),
        ];
        return view('Admin.store.index', compact('data'));
    }

    public function table()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $business_type_id = request('business_type_id', '');

            $list = Store::with('businessType');
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;
            $list = $business_type_id != '' ? $list->businessTypeId($business_type_id) : $list;

            $list = $list->latest()->paginate($limit);
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('Admin.store.table', compact('list'))->render(),
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
<<<<<<< HEAD
        $store = Store::with('businessType', 'manager')->findOrFail($id);
        $data = [
            'status' => Store::get_status($store->status),
            'business_types' => BusinessType::ofStatus(BusinessType::STATUS_ACTIVE)->get(),
=======
        $store = Store::with('businessType')->findOrFail($id);
        $data = [
            'status' => Store::get_status($store->status),
            'types' => BusinessType::ofStatus(BusinessType::STATUS_ACTIVE)->get(),
>>>>>>> 33dc2908c96ac78ce7f9e0f86e699d7dac34b851
            'staffs' => Staff::storeId($id)->count(),
            'revenue' => Order::storeId($id)->sum('total'),
            'orders' => Order::storeId($id)->count(),
        ];
        if (request()->ajax()) {
            return view('Admin.store.show', compact('store', 'data'))->render();
        }
        return view('Admin.store.detail', compact('store', 'data'));
    }

    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $store = Store::create($data);
            DB::commit();
            if (request('generate_data', '') == '1') {
                event(new GenerateDataStore($store));
            }
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
            $store = Store::find($id);
            $data = request()->all();
            $store->update($data);
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
            $store = Store::ofStatus(Store::STATUS_UN_ACTIVE)->find($id);
            if ($store) {
                $store->delete();
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

    public function report_revenue_by_month()
    {
        $year = request('year', date('Y'));
        $store_id = request('store_id', '');
        $sql = "SELECT MONTH(orders.created_at) AS month, SUM(total) AS revenue, COUNT(*) AS order_count
            FROM orders LEFT JOIN stores ON orders.store_id = stores.id
            WHERE store_id = " . $store_id . "
            AND YEAR(orders.created_at) = " . $year . "
            GROUP BY month ORDER BY month";
        $list = DB::select($sql);
        return $list;
    }

    public function report_revenue_by_product()
    {
        $store_id = request('store_id', '');
        $sql = "SELECT product_id, product_name, SUM(order_details.total) AS revenue, SUM(quantity) AS quantity
            FROM order_details JOIN orders ON order_details.order_id = orders.id
            WHERE orders.store_id = " . $store_id . "
            GROUP BY product_id, product_name ORDER BY revenue DESC
            LIMIT 10";
        $list = DB::select($sql);
        return $list;
    }
<<<<<<< HEAD

    public function reset_password_manager(ResetManagerPassword $request)
    {
        try {
            DB::beginTransaction();
            $store_id = $request->store_id ?? '';
            $store = Store::with('manager')->findOrFail($store_id);
            if ($store && $store->manager) {
                $store->manager->password = Hash::make(trim($request->password));
                $store->manager->save();
                DB::commit();
                return redirect()->back()->with('success', 'Khôi phục thành công');
            }
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
        }
        return redirect()->back()->with('error', 'Khôi phục thất bại!');
    }
=======
>>>>>>> 33dc2908c96ac78ce7f9e0f86e699d7dac34b851
}
