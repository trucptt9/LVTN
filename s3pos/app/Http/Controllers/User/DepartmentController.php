<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\Department\DepartmentDeleteRequest;
use App\Http\Requests\Department\DepartmentInsertRequest;
use App\Http\Requests\Department\DepartmentUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;
class DepartmentController extends Controller
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
        'status' => Department::get_status(),
      ];
  
      return view('user.department.index', compact('data'));
    }
  
    public function list()
    {
      try {
        $limit = request('limit', $this->limit_default);
        $status = request('status', '');
        $search = request('search', '');
  
        $list = Department::storeId($this->store_id);
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $search != '' ? $list->search($search) : $list;
  
        $list = $list->latest()->paginate($limit);
  
        return Response::json([
          'status' => ResHTTP::HTTP_OK,
          'data' => view('User.department.table', compact('list'))->render(),
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
        'status' => Department::get_status(),
      ];
      $department = Department::storeId($this->store_id)->findOrFail($id);
      return view('user.department.modal_edit', compact('department', 'data'))->render();
  
  
    }
    public function insert(DepartmentInsertRequest $request)
    {
      try {
        $data = $request->all();
        $data['store_id'] = $this->store_id;
        $data['status'] = request('status', Department::STATUS_BLOCKED);
        Department::create($data);
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
  
    public function update(DepartmentUpdateRequest $request)
    {
      try {
        DB::beginTransaction();
        $id = $request->get('id', '');
        $type = request('type', 'one');
        $department = Department::storeId($this->store_id)->whereId($id)->first();
        if ($type == 'all') {
          $data = $request->all();
          $department->update($data);
        } else {
          $department->status = $department->status == Department::STATUS_ACTIVE ? Department::STATUS_BLOCKED : Department::STATUS_ACTIVE;
          $department->save();
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
  
    public function delete(DepartmentDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $department = Department::storeId($this->store_id)->whereId($id)->first();
            $department->delete();
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