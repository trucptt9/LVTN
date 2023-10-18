<!--begin::Modal - Create App-->
<div class="modal fade" id="modal_add_staff" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Thêm nhân viên</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <!--begin::Stepper-->
                <div class="row" id="kt_modal_create_app_stepper">
                    <!--begin::Aside-->
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
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Tên đăng
                                        nhập</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="username" placeholder="Username" value="" />
                                <!--end::Input-->

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Mật khẩu</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="password" placeholder="Mật khẩu tài khoản" value="" />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-2">

                                <!--begin::Label-->

                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-3">
                                    <span class="required">Chức
                                        vụ</span>

                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="position" placeholder="Chức vụ nhân viên" value="" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Phòng
                                        ban</span>


                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="department_id" id="" class="form-select form-select-solid"
                                    data-control="select2" data-hide-search="true">
                                    <option value="1">Chọn phòng
                                        ban
                                    </option>
                                    <option value="">Ẩn</option>
                                </select>
                                <!--end::Input-->
                            </div>

                        </div>

                        <!--end::Nav-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="col-6">
                        <!--begin::Nav-->
                        <div class="stepper-nav ps-lg-10">
                            <div class="fv-row mb-2">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <h4 class="">Thông tin liên
                                        hệ
                                    </h4>

                                </label>
                                <!--begin::Label-->

                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Họ và
                                        tên</span>

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
                                    <span class="">Mã nhân
                                        viên</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="code" placeholder="Nhập mã hoặc tự sinh" value="" />
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
                                    <span class="required">Trạng thái</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="position_id" id="" class="form-select form-select-solid"
                                    data-control="select2" data-hide-search="true">
                                    <option value="1">Hiển thị
                                    </option>
                                    <option value="">Ẩn</option>
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create App-->
