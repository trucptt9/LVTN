  <!--begin::Modal - Create App-->
  <div class="modal fade" id="modal_add_shift" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Thêm ca làm</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary btn-close"
                    data-bs-dismiss="modal">
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
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                    id="kt_modal_create_app_stepper">
                    <!--begin::Aside-->

                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate"
                            id="kt_modal_create_app_form">
                            <!--begin::Step 4-->
                            <div data-kt-stepper-element="content" class="current">
                                <div class="w-100">
                                    <div class="row">
                                        <div
                                            class="col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label
                                                class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Tên ca</span>
                                              
                                            </label>
                                            <!--end::Label-->
                                            <input type="text"
                                                class="form-control  "
                                                placeholder="Nhập tên ca"
                                                name="name" value="" />
                                        </div>

                                        <div
                                            class=" col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label
                                                class="fs-6 fw-semibold form-label mb-2">Mã
                                                ca</label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text"
                                                    class="form-control  "
                                                    placeholder="Nhập mã hoặc mã tự sinh"
                                                    name="code" value="" />
                                                <!--end::Input-->
                                               
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label
                                                class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Bắt đầu</span>
                                                
                                            </label>
                                            <!--end::Label-->
                                            <input class="form-control" placeholder="Chọn giờ" id="start_modal_add_schedule_datepicker"/>
                                        </div>

                                        <div
                                        class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label
                                            class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Kết thúc</span>
                                            
                                        </label>
                                        <!--end::Label-->
                                        <input class="form-control" placeholder="Chọn giờ" id="end_modal_add_schedule_datepicker"/>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div
                                        class=" col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label
                                            class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
                                        <!--end::Label-->
                                       <select name="status" id="" class="form-select form-select-solid" data-control="select2" data-hide-search="true">
                                        <option value="1">Hiển thị</option>
                                        <option value="">Ẩn</option>
                                       </select>
                                    </div>

                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-semibold fs-6 mb-2">Mô tả</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control" aria-label="With textarea" rows="2"></textarea>
                                        <!--end::Input-->
                                    </div>
                                   
                                </div>
                            </div>
                            

                            <!--begin::Actions-->
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
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
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