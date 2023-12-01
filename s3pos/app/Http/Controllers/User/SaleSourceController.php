<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\SaleSource\SaleSourceDeleteRequest;
use App\Http\Requests\SaleSource\SaleSourceInsertRequest;
use App\Http\Requests\SaleSource\SaleSourceUpdateRequest;
use App\Models\SaleSource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class SaleSourceController extends Controller
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
      $this->authorize('sale_source-view');
      $data = [
        'status' => SaleSource::get_status(),
      ];
      return view('User.sale_source.index', compact('data'));
    }
  
    public function list()
    {
      $this->authorize('sale_source-view');
      try {
        $limit = request('limit', $this->limit_default);
        $status = request('status', '');
        $search = request('search', '');

        $list = SaleSource::storeId($this->store_id);
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $search != '' ? $list->search($search) : $list;
  
        $list = $list->latest()->paginate($limit);
  
        return Response::json([
          'status' => ResHTTP::HTTP_OK,
          'data' => view('User.sale_source.table', compact('list'))->render(),
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
        'status' => SaleSource::get_status(),
      ];
      $sale_source = SaleSource::findOrFail($id);
      return view('user.sale_source.modal_edit', compact('sale_source', 'data'))->render();
    }
  
    public function insert(SaleSourceInsertRequest $request)
    {
      try {
        $data = $request->all();
  
        $data['status'] = request('status', SaleSource::STATUS_BLOCKED);
        $data['store_id'] = $this->store_id;
        SaleSource::create($data);
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
  
    public function update(SaleSourceUpdateRequest $request)
    {
      try {
        DB::beginTransaction();
        $id = $request->get('id', '');
        $type = request('type', 'one');
        $sale_source = SaleSource::whereId($id)->first();
        if ($type == 'all') {
          $data = $request->all();
          $sale_source->update($data);
        } else {
          $sale_source->status = $sale_source->status == SaleSource::STATUS_ACTIVE ? SaleSource::STATUS_BLOCKED : SaleSource::STATUS_ACTIVE;
          $sale_source->save();
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
  
    public function delete(SaleSourceDeleteRequest $request)
    {
      try {
        $id = $request->get('id', '');
        $sale_source = SaleSource::whereId($id)->first();
        $sale_source->delete();
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