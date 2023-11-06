<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\Customer\CustomerDeleteRequest;
use App\Http\Requests\Customer\CustomerInsertRequest;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class CustomerController extends Controller
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
            'status' => Customer::get_status(),
            'group'=>CustomerGroup::storeId($this->store_id)->get(),
        ];

        return view('user.customer.index', compact('data'));
    }
    public function add()
    {
        return view('User.customer.add');
    }

    public function list()
    {

        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $list = Customer::storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);
            
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.customer.table', compact('list'))->render(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }


    public function detail()
    {
        return view('user.customer.detail');
    }

    public function insert(CustomerInsertRequest $request)
    {
        try {
            $data = $request->all();
           
            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', Customer::STATUS_BLOCKED);
            Customer::create($data);
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

    public function update(CustomerUpdateRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $promotion = Customer::storeId($this->store_id)->whereId($id)->first();
            $promotion->status = $promotion->status == Customer::STATUS_ACTIVE ? Customer::STATUS_BLOCKED : Customer::STATUS_ACTIVE;
            $promotion->save();
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Cập nhật thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Lỗi cập nhật',
                'type' => 'error'
            ]);
        }
    }

    public function delete(CustomerDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $promotion = Customer::storeId($this->store_id)->whereId($id)->first();
            $promotion->delete();
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