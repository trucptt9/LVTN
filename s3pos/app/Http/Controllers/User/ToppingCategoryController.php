<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ToppingCategory\ToppingCategoryDeleteRequest;
use App\Http\Requests\ToppingCategory\ToppingCategoryInsertRequest;
use App\Http\Requests\ToppingCategory\ToppingCategoryUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\ToppingGroup;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class ToppingCategoryController extends Controller
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
            'status' => ToppingGroup::get_status(),
        ];

        return view('user.topping_category.index', compact('data'));
    }

    public function list()
    {
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $list = ToppingGroup::storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.topping_category.table', compact('list'))->render(),
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
        $data = [
            'status' => ToppingGroup::get_status(),
        ];
        $topping_group = ToppingGroup::storeId($this->store_id)->findOrFail($id);
        return view('user.topping_category.modal_edit', compact('topping_group', 'data'))->render();


    }

    public function insert(ToppingCategoryInsertRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('image') != null) {
                $path = $request->file('image')->store('topping_category');
                $data['image'] = $path;
            } else {
                $data['image'] = null;
            }

            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', ToppingGroup::STATUS_BLOCKED);
            ToppingGroup::create($data);
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

    public function update(ToppingCategoryUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $topping_group = ToppingGroup::storeId($this->store_id)->whereId($id)->first();
            if ($type == 'all') {
                $data = $request->all();
                if ($request->file('image') != null) {
                    if ($topping_group->image != null) {
                        \Storage::delete($topping_group->image);
                    } else {
                        $path = $request->file('image')->store('topping_category');
                        $data['image'] = $path;
                    }

                }
                $topping_group->update($data);
            } else {
                $topping_group->status = $topping_group->status == ToppingGroup::STATUS_ACTIVE ? ToppingGroup::STATUS_BLOCKED : ToppingGroup::STATUS_ACTIVE;
                $topping_group->save();
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

    public function delete(ToppingCategoryDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $topping_group = ToppingGroup::storeId($this->store_id)->whereId($id)->first();
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