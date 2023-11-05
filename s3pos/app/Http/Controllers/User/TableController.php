<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\Table\TableDeleteRequest;
use App\Http\Requests\Table\TableInsertRequest;
use App\Http\Requests\Table\TableUpdateRequest;
use App\Models\Table;
use App\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;

class TableController extends Controller
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
      'status' => Table::get_status(),
      'areas' => Area::storeId($this->store_id)->get(),
    ];
   
    return view('User.tables.index', compact('data'));
  }

  public function list()
  {
    try {
      $limit = request('limit', $this->limit_default);
      $status = request('status', '');
      $search = request('search', '');

      $list = Table::storeId($this->store_id);
      $list = $status != '' ? $list->ofStatus($status) : $list;
      $list = $search != '' ? $list->search($search) : $list;

      $list = $list->latest()->paginate($limit);
     
     return Response::json([
        'status' => ResHTTP::HTTP_OK,
        'data' => view('User.tables.table', compact('list'))->render(),
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
    return view('user.tables.detail');
  }

  public function insert(TableInsertRequest $request)
  {
      try {
          $data = $request->all();
          $data['store_id'] = $this->store_id;
          $data['status'] = request('status', Table::STATUS_BLOCKED);
         
          Table::create($data);
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

  public function update(TableUpdateRequest $request)
  {
      try {
          $id = $request->get('id', '');
          $table = Table::storeId($this->store_id)->whereId($id)->first();
          $table->status = $table->status == Table::STATUS_ACTIVE ? Table::STATUS_BLOCKED : Table::STATUS_ACTIVE;
          $table->save();
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

  public function delete(TableDeleteRequest $request)
  {
      try {
          $id = $request->get('id', '');
          $table = Table::storeId($this->store_id)->whereId($id)->first();
          $table->delete();
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