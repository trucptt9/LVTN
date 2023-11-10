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
use Illuminate\Support\Facades\DB;

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
      $area = Area::storeId($this->store_id)->get();
      $area_id = array();
      foreach ($area as $val) {
        $area_id[] = $val->id;
      }
      $list = Table::areaId($area_id);
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

  public function detail($id)
  {
    $data = [
      'status' => Table::get_status(),
      'areas' => Area::storeId($this->store_id)->get(),
    ];
    $table = Table::findOrFail($id);
    return view('user.tables.modal_edit', compact('table', 'data'))->render();
  }

  public function insert(TableInsertRequest $request)
  {
    try {
      $data = $request->all();

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
      DB::beginTransaction();
      $id = $request->get('id', '');
      $type = request('type', 'one');
      $table = Table::whereId($id)->first();
      if ($type == 'all') {
        $data = $request->all();
        $table->update($data);
      } else {
        $table->status = $table->status == Table::STATUS_ACTIVE ? Table::STATUS_BLOCKED : Table::STATUS_ACTIVE;
        $table->save();
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

  public function delete(TableDeleteRequest $request)
  {
    try {
      $id = $request->get('id', '');
      $table = Table::whereId($id)->first();
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
