<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Product\ProductDeleteRequest;
use App\Http\Requests\Product\ProductInsertRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class ProductController extends Controller
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
            'status' => Product::get_status(),
        ];

        return view('user.product.index', compact('data'));
    }
    public function add()
    {
        return view('User.product.add');
    }

    public function list()
    {

        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $category = CategoryProduct::storeId($this->store_id)->get();
            $category_id = array();
            foreach ($category as $val) {
                $category_id[] = $val->id;
            }
            $list = Product::categoryId($category_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.product.table', compact('list'))->render(),
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
        return view('user.product.detail');
    }

    public function insert(ProductInsertRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('image') != null) {
                $path = $request->file('image')->store('product');
                $data['image'] = $path;
            } else {
                $data['image'] = null;
            }

            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', Product::STATUS_BLOCKED);
            Product::create($data);
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

    public function update(ProductUpdateRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $topping_group = Product::storeId($this->store_id)->whereId($id)->first();
            $topping_group->status = $topping_group->status == Product::STATUS_ACTIVE ? Product::STATUS_BLOCKED : Product::STATUS_ACTIVE;
            $topping_group->save();
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

    public function delete(ProductDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $topping_group = Product::storeId($this->store_id)->whereId($id)->first();
            $topping_group->delete();
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