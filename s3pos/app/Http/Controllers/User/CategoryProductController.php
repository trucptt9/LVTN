<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\CategoryProduct\CategoryProductDeleteRequest;
use App\Http\Requests\CategoryProduct\CategoryProductInsertRequest;
use App\Http\Requests\CategoryProduct\CategoryProductUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
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
            'status' => CategoryProduct::get_status(),
        ];
        return view('user.category_product.index', compact('data'));
    }

    public function list()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $list = CategoryProduct::withCount('products')->storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.category_product.table', compact('list'))->render(),
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'data' => '',
            ]);
        }
    }

    public function category_has_product($id)
    {
        $products = CategoryProduct::where('id', $id)->products()->where('status', 'active');
        return view('user.home.product', compact('products'))->render();
    }

    public function detail($id)
    {
        $data = [
            'status' => CategoryProduct::get_status(),
        ];
        $category_product = CategoryProduct::storeId($this->store_id)->findOrFail($id);
        return view('user.category_product.modal_edit', compact('category_product', 'data'))->render();
    }

    public function insert(CategoryProductInsertRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('image') != null) {
                $path = $request->file('image')->store('category_product');
                $data['image'] = $path;
            } else {
                $data['image'] = null;
            }

            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', CategoryProduct::STATUS_BLOCKED);
            CategoryProduct::create($data);
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

    public function update(CategoryProductUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $CategoryProduct = CategoryProduct::storeId($this->store_id)->whereId($id)->first();
            if ($type == 'all') {
                $data = $request->all();
                $CategoryProduct->update($data);
            } else {
                $CategoryProduct->status = $CategoryProduct->status == CategoryProduct::STATUS_ACTIVE ? CategoryProduct::STATUS_BLOCKED : CategoryProduct::STATUS_ACTIVE;
                $CategoryProduct->save();
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

    public function delete(CategoryProductDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $CategoryProduct = CategoryProduct::storeId($this->store_id)->whereId($id)->first();
            $CategoryProduct->delete();
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
