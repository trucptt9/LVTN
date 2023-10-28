<!--begin::Modal - Create App-->
<div class="modal fade" id="modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Thêm khuyến mãi</h2>
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
                    <div class="col-7">
                        <!--begin::Nav-->
                        <div class="stepper-nav ps-lg-10">
                            <h4 class="">Thông tin chương trình
                            </h4>
                            <div class="fv-row mb-2">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Tên chương trình</span>

                                </label>
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="name" placeholder="Tên chương trình" value="" />
                                <!--begin::Label-->

                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Loại khuyến mãi</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="type" id="" class="form-select form-select-solid"
                                    data-control="select2" data-hide-search="true">
                                    <option value="0">Chọn loại khuyến mãi</option>
                                    <option value="1">Tạo coupon
                                    </option>
                                    <option value="2">Tạo mã khuyến mãi</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Số lượng</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-lg form-control-solid"
                                    name="quantity" placeholder="Số lượng khuyến mãi" value="" />

                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Đối tượng áp dụng</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="position_id" id="" class="form-select form-select-solid"
                                    data-control="select2" data-hide-search="true">
                                    <option value="0">Chọn đối tượng</option>
                                    <option value="1">Tất cả
                                    </option>
                                    <option value="2">Áp dụng cho thành viên</option>
                                    <option value="2">Áp dụng cho nhân viên</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-2" style="display: flex; align-items:center">
                                    <div class="">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                            <span class="required">Giá trị khuyến mãi</span>
        
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="value" placeholder="Giá trị khuyến mãi" value="" />
                                    </div>
                              
                                <div class="" style="margin-left:10px; position: relative; top:20px">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="" checked name="type_value"/>
                                        <span class="form-check-label fw-semibold" style=color:black>
                                           %
                                        </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="" name="type_value"/>
                                        <span class="form-check-label fw-semibold" style="color: rgb(0, 0, 0)">
                                           đ
                                        </span>
                                    </label>
                                </div>
                                  
                                <!--begin::Label-->


                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-5">
                                    <h4 class="required">Điều kiện áp dụng</h4>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="" id="flexRadioDefault" checked
                                        name="condition_apply" />
                                    <label class=" fs-6 fw-semibold px-3" for="flexRadioDefault">
                                        Không có
                                    </label>

                                </div>
                                <div class="form-check form-check-custom form-check-solid mt-2">
                                    <input class="form-check-input" type="radio" value="" id="flexRadioDefault"
                                        name="condition_apply" />
                                    <label class="fs-6 fw-semibold px-3" for="flexRadioDefault">
                                        Tổng giá trị đơn hàng lớn hơn
                                    </label>

                                </div>
                                <!--end::Input-->
                            </div>

                        </div>


                        <!--end::Nav-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="col-5">
                        <!--begin::Nav-->

                        <div class="stepper-nav ps-lg-10">

                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <h4 class="">Thời gian áp dụng</h4>

                            </label>



                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Bắt đầu</span>


                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" placeholder="Chọn ngày"
                                    id="promotion_day_start" />

                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Kết thúc</span>


                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" placeholder="Chọn ngày"
                                    id="promotion_day_end" />

                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Mô tả</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control" aria-label="With textarea" rows="3"></textarea>
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
                                    <option value="1">Kích hoạt
                                    </option>
                                    <option value="">Khóa</option>
                                </select>
                                <!--end::Input-->
                            </div>

                        </div>
                        <!--end::Nav-->
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3 btn-cancle"
                            data-kt-users-modal-action="cancel">Hủy</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Lưu</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
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
