<div class="modal fade" id="modal_add_staff" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Thêm nhân viên</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <form class="form" action="{{ route('staff.insert') }}" id="form-create" method="POST"
                    enctype="multipart/form-data">
                    <div class="row" id="kt_modal_create_app_stepper">

                        <div class="col-5">
                            <!--begin::Nav-->
                            <div class="stepper-nav ps-lg-10">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <h4 class="">Thông tin tài
                                        khoản</h4>
                                </label>
                                <div class="fv-row mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="account_staff" />
                                    <label class="form-check-label fs-6" for="flexCheckDefault">
                                        Cấp tài khoản đăng nhập
                                    </label>
                                </div>
                                <div class="fv-row mb-2 account_staff" hidden>
                               
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                        <span class="required">Email</span>

                                    </label>
                                    
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="email" placeholder="Email đăng nhập" value="" />

                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                        <span class="required">Mật khẩu</span>

                                    </label>

                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="password" placeholder="Mật khẩu tài khoản" value="" />
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-2">

                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-3">
                                        <span class="required">Chức vụ</span>

                                    </label>
                                    <select class="form-select" aria-label="Select example" name="position_id">
                                        <option selected value="">-- Chọn chức vụ -- </option>
                                        @foreach ($data['positions'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fv-row mb-2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Phòng ban</span>
                                    </label>
                                    <select class="form-select" aria-label="Select example" name="department_id">
                                        <option selected value="">-- Chọn phòng ban -- </option>
                                        @foreach ($data['departments'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <!--begin::Nav-->
                            <div class="stepper-nav ps-lg-10">
                                <div class="fv-row mb-2">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                        <h4 class="">Thông tin liên hệ </h4>

                                    </label>
                                    <!--begin::Label-->

                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Họ tên</span>

                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="name" placeholder="Họ tên nhân viên" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Mã</span>

                                    </label>
                                 
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="code" placeholder="Để trống tự sinh" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Số điện
                                            thoại</span>

                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="phone" placeholder="0934 956 345" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Địa
                                            chỉ</span>

                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="" id="" cols="" rows="2" class="form-control"></textarea>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="">Trạng thái</span>

                                    </label>
                                    <select class="form-select" aria-label="Select example" name="status">
                                        <option selected value="">Trạng thái </option>
                                        @foreach ($data['status'] as $key => $item)
                                            <option value="{{ $key }}">{{ $item[0] }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <!--end::Nav-->
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
