<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\CardMember\CardMemberDeleteRequest;
use App\Http\Requests\CardMember\CardMemberInsertRequest;
use App\Http\Requests\CardMember\CardMemberUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\CardMember;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;

class CardMemberController extends Controller
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
      'status' => CardMember::get_status(),
    ];
    return view('user.customer_group.index', compact('data'));
  }

  public function list()
  {
    try {
      $limit = request('limit', $this->limit_default);
      $status = request('status', '');
      $search = request('search', '');

      $list = CardMember::storeId($this->store_id);
      $list = $status != '' ? $list->ofStatus($status) : $list;
      $list = $search != '' ? $list->search($search) : $list;

      $list = $list->latest()->paginate($limit);

      return Response::json([
        'status' => ResHTTP::HTTP_OK,
        'data' => view('User.customer_group.table', compact('list'))->render(),
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
      'status' => CardMember::get_status(),
    ];
    $card_member = CardMember::storeId($this->store_id)->findOrFail($id);
    return view('user.customer_group.modal_edit', compact('customer_group', 'data'))->render();
  }

  public function insert(CardMemberInsertRequest $request)
  {
    try {
      $data = $request->all();
      $data['store_id'] = $this->store_id;
      $data['status'] = request('status', CardMember::STATUS_BLOCKED);
      CardMember::create($data);
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

  public function update(CardMemberUpdateRequest $request)
  {
    try {
      DB::beginTransaction();
      $id = $request->get('id', '');
      $type = request('type', 'one');
      $card_member = CardMember::storeId($this->store_id)->whereId($id)->first();
      if ($type == 'all') {
        $data = $request->all();
        $data['status'] = $card_member->status == CardMember::STATUS_ACTIVE ? CardMember::STATUS_BLOCKED : CardMember::STATUS_ACTIVE;
        $card_member->update($data);
      } else {
        $card_member->status = $card_member->status == CardMember::STATUS_ACTIVE ? CardMember::STATUS_BLOCKED : CardMember::STATUS_ACTIVE;
        $card_member->save();
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

  public function delete(CardMemberDeleteRequest $request)
  {
    try {
      $id = $request->get('id', '');
      $card_member = CardMember::storeId($this->store_id)->whereId($id)->first();
      $card_member->delete();
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
