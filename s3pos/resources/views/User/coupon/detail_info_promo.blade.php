<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body py-4 mt-4" style="padding-left: 0px">
            <form action="{{ route('coupon.update') }}" id="form-update-info" action="POST">
                <div class="row" id="kt_modal_create_app_stepper">
                    <input type="hidden" name="id" value="{{ $coupon->id }}">
                    <input type="hidden" name="type" value="all">
                    <div class="col-md-6 mb-2">
                        <!--begin::Nav-->
                        <div class="">
                            <div class="fv-row mb-2">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Tên phiếu</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" name="name"
                                    placeholder="Tên chương trình" value="{{ $coupon->name }}" />
                            </div>
                            <div class="fv-row mb-2" style="display: flex; align-items:center">
                                <div class="">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                        <span class="">Giá trị phiếu</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-lg" name="value"
                                        placeholder="Giá trị phiếu mua hàng" value="{{ $coupon->value }}" />
                                </div>
                                <div class="" style="margin-left:10px; position: relative; top:20px">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="percent"
                                            {{ $coupon->type_value == 'percent' ? 'checked' : '' }} name="type_value" />
                                        <span class="form-check-label fw-semibold" style=color:black>
                                            %
                                        </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="vnd" name="type_value"
                                            {{ $coupon->type_value == 'vnd' ? 'checked' : '' }} />
                                        <span class="form-check-label fw-semibold" style="color: rgb(0, 0, 0)">
                                            đ
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Trạng thái</span>
                                </label>
                                <select name="status" id="" class="form-select" data-control="select2"
                                    data-hide-search="true">
                                    @foreach ($data['status'] as $key => $item)
                                        <option value="{{ $key }}"
                                            {{ $key == $coupon->status ? 'selected' : '' }}>{{ $item[0] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="col-md-6 mb-2">
                        <!--begin::Nav-->
                        <div class="">
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Bắt đầu</span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control" placeholder="Chọn ngày" id="coupon_day_start1"
                                    value="{{ date('d/m/Y', strtotime($coupon->start)) }}" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="">Kết thúc</span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control" placeholder="Chọn ngày" id="coupon_day_end2"
                                    value="{{ date('d/m/Y', strtotime($coupon->end)) }}" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Mô tả</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control" name="description" aria-label="With textarea" rows="1">{{ $coupon->description }}</textarea>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Content-->
                </div>
                <button class="btn btn-success btn-update" style="float:inline-end" type="submit">Cập
                    nhật</button>
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
