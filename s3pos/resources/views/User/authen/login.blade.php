@extends('user.layout.guest')
@section('content')
    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
        <!--begin::Wrapper-->
        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100" action="{{ route('login_post') }}" method="POST">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Đăng nhập</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-6">
                        Đăng nhập để sử dụng hệ thống
                    </div>
                    <!--end::Link-->
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        Đăng nhập thất bại!
                    </div>
                @endif
                <!--begin::Heading-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="text" placeholder="Nhập email" name="email" autocomplete="off"
                        class="form-control bg-transparent" />
                    <!--end::Email-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row mb-3">
                    <!--begin::Password-->
                    <input type="password" placeholder="Nhập mật khẩu" name="password" autocomplete="off"
                        class="form-control bg-transparent" />
                    <!--end::Password-->
                </div>
                <!--end::Input group=-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <a href="{{ route('license') }}" class="link-primary">
                        Kích hoạt license?
                    </a>
                    <!--begin::Link-->
                    <a href="{{ route('forgot_password') }}" class="link-primary">
                        Quên mật khẩu?
                    </a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button type="submit" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Đăng nhập</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Vui lòng chờ...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Submit button-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
