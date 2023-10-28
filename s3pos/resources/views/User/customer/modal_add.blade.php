<!--begin::Modal - Create App-->
<div class="modal fade" id="modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Thêm khách hàng</h2>
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
                            <div class="fv-row mb-2">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <h4 class="">Thông tin liên
                                        hệ
                                    </h4>

                                </label>
                                <!--begin::Label-->

                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Họ
                                        tên</span>

                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="name" placeholder="Họ tên khách hàng" value="" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Mã khách hàng</span>

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
                            
                        </div>
                       

                        <!--end::Nav-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="col-6">
                        <!--begin::Nav-->
                        <div class="stepper-nav ps-lg-10">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <h4 class="">Thông tin thẻ thành viên</h4>

                            </label>
                          

                          
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Loại thẻ thành viên</span>


                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="" id="flexRadioDefault" name="customer_group"/>
                                    <label class=" fs-6 fw-semibold px-3" for="flexRadioDefault">
                                        Hạng đồng
                                    </label>    
                                    
                                </div>
                                <div class="form-check form-check-custom form-check-solid mt-2">
                                    <input class="form-check-input" type="radio" value="" id="flexRadioDefault" name="customer_group"/>
                                    <label class="fs-6 fw-semibold px-3" for="flexRadioDefault">
                                        Hạng bạc
                                    </label>
                                    
                                </div>
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
                                    <option value="1">Đang hoạt động
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
                        <button type="submit" class="btn btn-primary"
                            data-kt-users-modal-action="submit">
                            <span class="indicator-label">Lưu</span>
                            <span class="indicator-progress">Please wait...
                                <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
