<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\Shift\ShiftDeleteRequest;
use App\Http\Requests\Shift\ShiftInsertRequest;
use App\Http\Requests\Shift\ShiftUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
class ShiftController extends Controller
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
        'status' => Shift::get_status(),
      ];
  
      return view('user.shift.index', compact('data'));
    }
  
    public function list()
    {
      try {
        $limit = request('limit', $this->limit_default);
        $status = request('status', '');
        $search = request('search', '');
  
        $list = Shift::storeId($this->store_id);
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $search != '' ? $list->search($search) : $list;
  
        $list = $list->latest()->paginate($limit);
  
        return Response::json([
          'status' => ResHTTP::HTTP_OK,
          'data' => view('User.shift.table', compact('list'))->render(),
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
      return view('user.shift.detail');
    }
  
    public function insert(ShiftInsertRequest $request)
    {
        try {
            $data = $request->all();
            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', Shift::STATUS_BLOCKED);
            Shift::create($data);
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
  
    public function update(ShiftUpdateRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $shift = Shift::storeId($this->store_id)->whereId($id)->first();
            $shift->status = $shift->status == Shift::STATUS_ACTIVE ? Shift::STATUS_BLOCKED : Shift::STATUS_ACTIVE;
            $shift->save();
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
  
    public function delete(ShiftDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $shift = Shift::storeId($this->store_id)->whereId($id)->first();
            $shift->delete();
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