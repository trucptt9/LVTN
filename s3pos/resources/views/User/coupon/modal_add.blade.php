<!--begin::Modal - Create App-->
<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Thêm phiếu mua hàng</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-close btn-sm btn-icon btn-active-color-primary close-btn" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-6 py-3">
                <!--begin::Stepper-->
                <form action="{{ route('coupon.insert') }}" method="POST" id="form-create">
                    <div class="row" id="kt_modal_create_app_stepper">
                        <div class="col-md-6 mb-2">
                            <!--begin::Nav-->
                            <div class="\">
                                <div class="fv-row mb-2">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Tên</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" name="name"
                                    placeholder="Tên " value="" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="">Số lượng phiếu tạo</span>
                                </label>
                                <input type="number" class="form-control form-control-lg" name="quantity"
                                    placeholder="Số lượng phiếu" value="1" />
                            </div>
                            <div class="fv-row mb-2" style="display: flex; align-items:center">
                                <div class="">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                        <span class="">Giá trị phiếu</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-lg" name="value"
                                        placeholder="Giá trị phiếu mua hàng" value="0" />
                                </div>
                                <div class="" style="margin-left:10px; position: relative; top:20px">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="percent" checked
                                            name="type_value" />
                                        <span class="form-check-label fw-semibold" style=color:black>
                                            %
                                        </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="vnd"
                                            name="type_value" />
                                        <span class="form-check-label fw-semibold" style="color: rgb(0, 0, 0)">
                                            đ
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <div class="col-md-6 mb-2">
                        <!--begin::Nav-->
                        <div class="">
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Bắt đầu</span>
                                </label>
                                <input class="form-control" placeholder="Chọn ngày" name="start"
                                    id="coupon_day_start" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="">Kết thúc</span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control" placeholder="Chọn ngày" name="end"
                                    id="coupon_day_end" />
                            </div>
                            <div class="fv-row mb-2 pt-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Trạng thái</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="status" id="" class="form-select" data-control="select2"
                                    data-hide-search="true">
                                    <option value="" selected>Chọn trạng thái
                                    </option>
                                    @foreach ($data['status'] as $key => $item)
                                        <option value="{{ $key }}">{{ $item[0] }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="fv-row mb-2">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Mô tả</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control" name="description" aria-label="With textarea" rows="3"></textarea>
                            <!--end::Input-->
                        </div>
                    </div>
                    <div class="text-center pt-5">
                        <button type="reset" class="btn btn-light me-3 btn-cancle"
                            data-kt-users-modal-action="cancel">Hủy</button>
                        <button type="submit" class="btn btn-primary btn-create" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Tạo mới</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
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
