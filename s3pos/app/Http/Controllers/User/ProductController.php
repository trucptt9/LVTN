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
        $data = [
            'status' => Product::get_status(),
            'category'=> CategoryProduct::storeId($this->store_id)->get(),
        ];
        return view('User.product.add', compact('data'));
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
            \DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $product = Product::whereId($id)->first();
            if ($type == 'all') {
                $data = $request->all();
                $data['status'] = $product->status == Product::STATUS_ACTIVE ? Product::STATUS_BLOCKED : Product::STATUS_ACTIVE;
                $product->update($data);
            } else {
                $product->status = $product->status == Product::STATUS_ACTIVE ? Product::STATUS_BLOCKED : Product::STATUS_ACTIVE;
                $product->save();
            }
            \DB::commit();
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
            \DB::rollBack();
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
            $product = Product::whereId($id)->first();
            $product->delete();
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