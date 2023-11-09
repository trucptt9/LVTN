@extends('user.layout.guest')
@section('content')
    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
        <!--begin::Wrapper-->
        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                id="kt_password_reset_form" action="{{ route('license_active') }}" method="POST">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Kích hoạt license?</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-6">
                        Kích hoạt license để sử dụng hệ thống
                    </div>
                    <!--end::Link-->
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        Lỗi kích hoạt!
                    </div>
                @endif
                <!--begin::Heading-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8 fv-plugins-icon-container">
                    <!--begin::Email-->
                    <input type="text" placeholder="Nhập license" name="license" autocomplete="off"
                        class="form-control bg-transparent">
                    <!--end::Email-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" class="btn btn-primary me-4">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Kích hoạt</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-light">
                        Quay lại
                    </a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
