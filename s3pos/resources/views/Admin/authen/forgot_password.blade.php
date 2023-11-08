@extends('Admin.layout.empty')
@section('title', 'Quên mật khẩu')
@section('content')
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <div class="card rounded-4">
                <div class="card-body">
                    <form action="{{ route('admin.forgot_password.post') }}" method="POST">
                        @csrf
                        <h4 class="text-center text-uppercase">Quên mật khẩu</h4>
                        <div class="text-gray-400 text-center mb-4">
                            Nhập email để gửi yêu cầu khôi phục mật khẩu
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" class="form-control form-control-lg fs-15px" value="{{ old('email') }}"
                                placeholder="Nhập email" required>
                        </div>
                        <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">
                            Gửi
                        </button>
                        <div class="text-center text-muted">
                            <a class="ms-auto text-muted" href="{{ route('admin.login.index') }}">
                                Quay lại đăng nhập!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
@endsection
