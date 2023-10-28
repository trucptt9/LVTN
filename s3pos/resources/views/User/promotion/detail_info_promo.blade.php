<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Card-->
    <div class="card">

        <!--begin::Card body-->
        <div class="card-body py-4 mt-4" style="padding-left: 0px">
            <div class="row" id="kt_modal_create_app_stepper">
                <!--begin::Aside-->
                <div class="col-7" style="padding-left: 0px">
                    <!--begin::Nav-->
                    <div class="stepper-nav ps-lg-10 ">
                        <h4 class="">Thông tin chương trình
                        </h4>
                        <div class="fv-row mb-2">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                <span class="required">Tên chương trình</span>

                            </label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name"
                                placeholder="Tên chương trình" value="Giảm giá tháng 10" />
                            <!--begin::Label-->

                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                <span class="required">Loại khuyến mãi</span>

                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="type" id="" class="form-select form-select-solid"
                                data-control="select2" data-hide-search="true">

                                <option value="1" selected>Tạo coupon
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
                            <input type="number" class="form-control form-control-lg form-control-solid w-50"
                                name="quantity" placeholder="Số lượng khuyến mãi" value="100" />

                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-2">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                <span class="required">Đối tượng áp dụng</span>

                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="position_id" id="" class="form-select form-select-solid w-50"
                                data-control="select2" data-hide-search="true">

                                <option value="1" selected>Tất cả
                                </option>
                                <option value="2">Áp dụng cho thành viên</option>
                                <option value="3">Áp dụng cho nhân viên</option>
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
                                    name="value" placeholder="Giá trị khuyến mãi" value="10" />
                            </div>

                            <div class="" style="margin-left:10px; position: relative; top:20px">
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="" checked
                                        name="type_value" />
                                    <span class="form-check-label fw-semibold" style=color:black>
                                        %
                                    </span>
                                </label>
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="" name="type_value" />
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
                                <input class="form-check-input" type="radio" value="" id="flexRadioDefault"
                                    checked name="condition_apply" />
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
                                id="promotion_day_start1" value="25/10/2023" />

                        </div>
                        <div class="fv-row mb-2">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                <span class="required">Kết thúc</span>


                            </label>
                            <!--end::Label-->
                            <input class="form-control form-control-solid" placeholder="Chọn ngày"
                                id="promotion_day_end2" value="25/10/2023" />

                        </div>
                        <div class="fv-row mb-2">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Mô tả</span>

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

                <!--end::Content-->
            </div>
            <button class="btn btn-success" style="float:inline-end">Cập
                nhật</button>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
