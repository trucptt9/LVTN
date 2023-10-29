@extends('user.layout.guest')
@section('content')
    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
        <!--begin::Wrapper-->
        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                id="kt_new_password_form" action="{{ route('reset_post') }}" method="POST">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Khôi phục mật khẩu!</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-6">
                        Bạn đã khôi phục mật khẩu?
                        <a href="{{ route('login') }}" class="link-primary fw-bold">Đăng nhập</a>
                    </div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control bg-transparent" type="password" placeholder="Nhập mật khẩu mới"
                                name="password" autocomplete="off">
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-2"></i>
                                <i class="ki-duotone ki-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">Sử dụng 8 ký tự trở lên kết hợp giữa chữ cái, số và biểu tượng</div>
                    <!--end::Hint-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <!--end::Input group=-->
                <!--end::Input group=-->
                <div class="fv-row mb-8 fv-plugins-icon-container">
                    <!--begin::Repeat Password-->
                    <input type="password" placeholder="Nhập lại mật khẩu" name="confirm-password" autocomplete="off"
                        class="form-control bg-transparent">
                    <!--end::Repeat Password-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                </div>
                <!--end::Input group=-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="toc" value="1">
                        <span class="form-check-label fw-semibold text-gray-700 fs-6 ms-1">Tôi đồng ý &amp;
                            <a href="#" class="ms-1 link-primary">với điều khoản của
                                {{ env('COPYRIGHT') }}</a></span>
                    </label>
                </div>
                <!--end::Input group=-->
                <!--begin::Action-->
                <div class="d-grid mb-10">
                    <button type="button" id="kt_new_password_submit" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Khôi phục</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Action-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
