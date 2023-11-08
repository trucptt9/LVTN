@extends('Admin.layout.empty')
@section('title', 'Đăng nhập')
@section('content')
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <div class="card rounded-4">
                <div class="card-body">
                    <form action="{{ route('admin.login.post') }}" method="POST">
                        @csrf
                        <h4 class="text-center text-uppercase">Đăng nhập</h4>
                        <div class="text-gray-400 text-center mb-4">
                            Đăng nhập tài khoản để sử dụng hệ thống
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                Đăng nhập thất bại!
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control form-control-lg fs-15px"
                                placeholder="Nhập email" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-label">Mật khẩu *</label>
                            </div>
                            <input type="password" name="password" class="form-control form-control-lg fs-15px"
                                placeholder="Nhập mật khẩu" required>
                        </div>
                        <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">
                            Đăng nhập
                        </button>
                        {{-- <div class="text-center text-muted">
                            <a class="ms-auto text-muted" href="{{ route('forgot_password.index') }}">
                                Quên mật khẩu?
                            </a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
@endsection
