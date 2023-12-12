<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Topping\ToppingDeleteRequest;
use App\Http\Requests\Topping\ToppingInsertRequest;
use App\Http\Requests\Topping\ToppingUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\ToppingGroup;
use App\Models\Toppings;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class ToppingController extends Controller
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
        $this->authorize('topping-view');
        $data = [
            'status' => Toppings::get_status(),
            'group_topping' => ToppingGroup::storeId($this->store_id)->select('id', 'name')->get(),
        ];
        return view('user.topping.index', compact('data'));
    }

    public function list()
    {
        $this->authorize('topping-view');
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $group = request('group_id', '');
           
            $list = Toppings::whereHas('group', function ($q) {
                $q->storeId($this->store_id);
            });
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;
            $list = $group != '' ? $list->groupId($group) : $list;
            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.topping.table', compact('list'))->render(),
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
            'status' => Toppings::get_status(),
            'topping_group' => ToppingGroup::storeId($this->store_id)->get(),
        ];
        $topping = Toppings::findOrFail($id);
        return view('user.topping.modal_edit', compact('topping', 'data'))->render();
    }

    public function insert(ToppingInsertRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('image') != null) {
                $path = $request->file('image')->store('topping');
                $data['image'] = $path;
            } else {
                $data['image'] = null;
            }

            $data['status'] = request('status', Toppings::STATUS_BLOCKED);
            Toppings::create($data);
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

    public function update(ToppingUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $Toppings = Toppings::whereId($id)->first();
            if ($type == 'all') {
                $data = $request->all();
                if ($request->file('image') != null) {
                    if ($Toppings->image != null) {
                        \Storage::delete($Toppings->image);
                    } else {
                        $path = $request->file('image')->store('topping');
                        $data['image'] = $path;
                    }
                }
                $Toppings->update($data);
            } else {
                $Toppings->status = $Toppings->status == Toppings::STATUS_ACTIVE ? Toppings::STATUS_BLOCKED : Toppings::STATUS_ACTIVE;
                $Toppings->save();
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

    public function delete(ToppingDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $topping = Toppings::whereId($id)->first();
            $topping->delete();
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