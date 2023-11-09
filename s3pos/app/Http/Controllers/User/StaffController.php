<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Staff\StaffDeleteRequest;
use App\Http\Requests\Staff\StaffInsertRequest;
use App\Http\Requests\Staff\StaffUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
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
            'status' => Staff::get_status(),
            'departments' => Department::storeId($this->store_id)->get(),
            'positions' => Position::storeId($this->store_id)->get(),
        ];

        return view('user.staff.index', compact('data'));
    }

    public function permission()
    {
        return view('user.staff.permission')->render();
    }
    public function list()
    {

        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');
            $list = Staff::storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.staff.table', compact('list'))->render(),
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
            'status' => Staff::get_status(),
            'departments' => Department::storeId($this->store_id)->get(),
            'positions' => Position::storeId($this->store_id)->get(),
        ];
        $staff = Staff::storeId($this->store_id)->findOrFail($id);
        if (request()->ajax()) {
            return view('user.staff.modal_edit', compact('staff', 'data'))->render();
        }
        return view('user.staff.detail', compact('staff', 'data'));


    }

    public function insert(StaffInsertRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('avatar') != null) {
                $path = $request->file('avatar')->store('staff');
                $data['avatar'] = $path;
            } else {
                $data['avatar'] = null;
            }
            $data['store_id'] = $this->store_id;
            $data['status'] = request('status', Staff::STATUS_UN_ACTIVE);
            Staff::create($data);
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

    public function update(StaffUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $staff = Staff::storeId($this->store_id)->whereId($id)->first();
            if ($type == 'all') {
                $data = $request->all();
                if ($request->file('avatar') != null) {
                    if ($staff->avatar != null) {
                        \Storage::delete($staff->avatar);
                    } else {
                        $path = $request->file('avatar')->store('staff');
                        $data['avatar'] = $path;
                    }

                }
                $staff->update($data);

            } elseif($type == 'account'){
               
                $staff->email = $request->email;
                $staff->password = $request->password;
                $staff->save();
            }else {
                $staff->status = $staff->status == Staff::STATUS_ACTIVE ? Staff::STATUS_UN_ACTIVE : Staff::STATUS_ACTIVE;
                $staff->save();

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
 
    public function delete(StaffDeleteRequest $request)
    {
        try {
            $id = $request->get('id', '');
            $staff = Staff::whereId($id)->first();
            $staff->delete();
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