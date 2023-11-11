<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Area\AreaDeleteRequest;
use App\Http\Requests\Area\AreaInsertRequest;
use App\Http\Requests\Area\AreaUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
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
      'status' => Area::get_status(),

    ];

    return view('user.areas.index', compact('data'));
  }

  public function list()
  {
    try {
      $limit = request('limit', $this->limit_default);
      $status = request('status', '');
      $search = request('search', '');

      $list = Area::storeId($this->store_id);
      $list = $status != '' ? $list->ofStatus($status) : $list;
      $list = $search != '' ? $list->search($search) : $list;

      $list = $list->latest()->paginate($limit);

      return Response::json([
        'status' => ResHTTP::HTTP_OK,
        'data' => view('User.areas.table', compact('list'))->render(),
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
      'status' => Area::get_status(),
    ];
    $area = Area::storeId($this->store_id)->findOrFail($id);
    return view('user.areas.modal_edit', compact('area', 'data'))->render();
  }

  public function insert(AreaInsertRequest $request)
  {
    try {
      $data = $request->all();
      $data['store_id'] = $this->store_id;
      $data['status'] = request('status', Area::STATUS_BLOCKED);
      Area::create($data);
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

  public function update(AreaUpdateRequest $request)
  {
    try {
      DB::beginTransaction();
      $id = $request->get('id', '');
      $type = request('type', 'one');
      $area = Area::storeId($this->store_id)->whereId($id)->first();
      if ($type == 'all') {
        $data = $request->all();
        $area->update($data);
      } else {
        $area->status = $area->status == Area::STATUS_ACTIVE ? Area::STATUS_BLOCKED : Area::STATUS_ACTIVE;
        $area->save();
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

  public function delete(AreaDeleteRequest $request)
  {
    try {
      $id = $request->get('id', '');
      $area = Area::storeId($this->store_id)->whereId($id)->first();
      $area->delete();
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
