<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('Admin.authen.login');
    }

    public function login_post()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $rules = array(
                'email' => 'required|email|exists:admins,email',
                'password' => 'required',
            );
            $messages = array(
                'email.required' => 'Nhập email!',
                'email.email' => 'Email chưa đúng định dạng!',
                'email.exists' => 'Không tồn tại tài khoản này!',
                'password.required' => 'Nhập mật khẩu!',
            );
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                $error = $validator->errors()->all();
                $msg = array_shift($error);
                return redirect()->back()->with('error', $msg);
            }
            $admin = Admin::ofEmail(request('email'))->ofStatus(Admin::STATUS_ACTIVE)->first();
            if (!$admin || !Hash::check(request('password'), $admin->password)) {
                return redirect()->back()->with('error', 'Đăng nhập thất bại!');
            }
            $admin->last_login = now();
            $admin->save();
            DB::commit();
            return redirect()->route('admin.index')->with('success', 'Đăng nhập thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            showLog($th);
            return redirect()->back()->with('error', 'Đăng nhập thất bại!');
        }
    }

    public function forgot_password()
    {
        return view('Admin.authen.forgot_password');
    }

    public function forgot_password_post()
    {
    }

    public function reset()
    {
        return view('Admin.authen.reset');
    }

    public function reset_post()
    {
    }
}
