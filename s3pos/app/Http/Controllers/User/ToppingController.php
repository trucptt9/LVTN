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
        $data = [
            'status' => Toppings::get_status(),
            'group_topping'=>ToppingGroup::storeId($this->store_id)->get(), 
        ];

        return view('user.topping.index', compact('data'));
    }
  

    public function list()
    {

        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $group = ToppingGroup::storeId($this->store_id)->get();
            $group_id = array();
            foreach ($group as $val) {
                $group_id[] = $val->id;
            }
            $list = Toppings::groupId($group_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

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


    public function detail()
    {
        return view('user.topping.detail');
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
            $id = $request->get('id', '');
            $topping = Toppings::whereId($id)->first();
            $topping->status = $topping->status == Toppings::STATUS_ACTIVE ? Toppings::STATUS_BLOCKED : Toppings::STATUS_ACTIVE;
            $topping->save();
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