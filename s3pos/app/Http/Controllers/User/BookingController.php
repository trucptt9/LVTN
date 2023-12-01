<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as ResHTTP;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Booking\BookingInsertRequest;
class BookingController extends Controller
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
        $this->authorize('booking-view');
        $data = [
            'status' => Booking::get_status(),
        ];
        return view('user.booking.index', compact('data'));
    }

    public function table()
    {
        $this->authorize('booking-view');
        try {
            $limit = request('limit', $this->limit_default);
            $status = request('status', '');
            $search = request('search', '');

            $list = Booking::storeId($this->store_id);
            $list = $status != '' ? $list->ofStatus($status) : $list;
            $list = $search != '' ? $list->search($search) : $list;

            $list = $list->latest()->paginate($limit);

            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'data' => view('User.booking.table', compact('list'))->render(),
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
            'status' => Booking::get_status(),
        ];
        $booking = Booking::storeId($this->store_id)->findOrFail($id);
        return view('user.booking.modal_edit', compact('booking', 'data'))->render();
    }

    public function insert(BookingInsertRequest $request)
    {
        try {
            $data = $request->all();
            $data['store_id'] = $this->store_id;
            $booking = Booking::create($data);
            return $booking;
            return Response::json([
                'status' => ResHTTP::HTTP_OK,
                'message' => 'Đặt bàn thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            return Response::json([
                'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
                'message' => 'Không thể đặt bàn này !',
                'type' => 'error'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->get('id', '');
            $type = request('type', 'one');
            $booking = Booking::storeId($this->store_id)->whereId($id)->first();
            if ($type == 'all') {
                $data = $request->all();
                $booking->update($data);
            } else {
                $booking->status = $booking->status == Booking::STATUS_ACTIVE ? Booking::STATUS_BLOCKED : Booking::STATUS_ACTIVE;
                $booking->save();
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

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id', '');
            $booking = Booking::storeId($this->store_id)->whereId($id)->first();
            if ($booking) {
                $booking->delete();
                return Response::json([
                    'status' => ResHTTP::HTTP_OK,
                    'message' => 'Xóa dữ liệu thành công',
                    'type' => 'success'
                ]);
            }
        } catch (\Throwable $th) {
            showLog($th);
        }
        return Response::json([
            'status' => ResHTTP::HTTP_FAILED_DEPENDENCY,
            'message' => 'Không thể xóa dữ liệu này!',
            'type' => 'error'
        ]);
    }
}