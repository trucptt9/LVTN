<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\Position\PositionDeleteRequest;
use App\Http\Requests\Position\PositionInsertRequest;
use App\Http\Requests\Position\PositionUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
class PositionController extends Controller
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
        'status' => Position::get_status(),
      ];
  
      return view('user.position.index', compact('data'));
    }
  
    public function list()
    {
      try {
        $limit = request('limit', $this->limit_default);
        $status = request('status', '');
        $search = request('search', '');
  
        $list = Position::storeId($this->store_id);
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $search != '' ? $list->search($search) : $list;
  
        $list = $list->latest()->paginate($limit);
  
        return Response::json([
          'status' => ResHTTP::HTTP_OK,
          'data' => view('User.position.table', compact('list'))->render(),
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
      return view('user.position.detail');
    }
  
    public function insert(PositionInsertRequest $request)
    {
        try {
            $data = $request->all();
            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', Position::STATUS_BLOCKED);
            Position::create($data);
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
  
    public function update(PositionUpdateRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $position = Position::storeId($this->store_id)->whereId($id)->first();
            $position->status = $position->status == Position::STATUS_ACTIVE ? Position::STATUS_BLOCKED : Position::STATUS_ACTIVE;
            $position->save();
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
  
    public function delete(PositionDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $position = Position::storeId($this->store_id)->whereId($id)->first();
            $position->delete();
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