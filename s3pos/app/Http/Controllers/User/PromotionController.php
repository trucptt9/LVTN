<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\Promotions\PromotionsDeleteRequest;
use App\Http\Requests\Promotions\PromotionsInsertRequest;
use App\Http\Requests\Promotions\PromotionsUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\CustomerGroup;
use App\Models\Promotion;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
class PromotionController extends Controller
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
            'status' => Promotion::get_status(),
            'customer_group'=> CustomerGroup::storeId($this->store_id)->get(), 
        ];

        return view('user.promotion.index', compact('data'));
    }
    public function add()
    {
        return view('User.promotion.add');
    }

    public function list()
    {

        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $list = Promotion::storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.promotion.table', compact('list'))->render(),
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
        return view('user.promotion.detail');
    }

    public function insert(PromotionsInsertRequest $request)
    {
        try {
            $data = $request->all();
           
            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', Promotion::STATUS_BLOCKED);
            Promotion::create($data);
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

    public function update(PromotionsUpdateRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $promotion = Promotion::storeId($this->store_id)->whereId($id)->first();
            $promotion->status = $promotion->status == Promotion::STATUS_ACTIVE ? Promotion::STATUS_BLOCKED : Promotion::STATUS_ACTIVE;
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

    public function delete(PromotionsDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $promotion = Promotion::storeId($this->store_id)->whereId($id)->first();
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