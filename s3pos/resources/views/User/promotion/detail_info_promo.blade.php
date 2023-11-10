<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body py-4 mt-4" style="padding-left: 0px">
            <form action="{{ route('promotion.update') }}" id="form-update-info" action="POST">
                <div class="row" id="kt_modal_create_app_stepper">
                    <input type="hidden" name="id" value="{{ $promotion->id }}">
                    <input type="hidden" name="type" value="all">
                    <div class="col-7" style="padding-left: 0px">
                        <!--begin::Nav-->
                        <div class="stepper-nav ps-lg-10 ">
                            <h4 class="">Thông tin chương trình
                            </h4>
                            <div class="fv-row mb-2">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="required">Tên chương trình</span>
                                </label>
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    name="subject" placeholder="Tên chương trình" value="{{ $promotion->subject }}" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="">Đối tượng áp dụng</span>
                                </label>
                                <select name="customer_group_id" id="" class="form-select"
                                    data-control="select2" data-hide-search="true">
                                    <option value="0" selected>Tất cả
                                    </option>
                                    @foreach ($data['customer_group'] as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $promotion->customer_group_id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-2" style="display: flex; align-items:center">
                                <div class="">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                        <span class="">Giá trị khuyến mãi</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-lg form-control-solid"
                                        name="value" placeholder="Giá trị khuyến mãi"
                                        value="{{ $promotion->value }}" />
                                </div>
                                <div class="" style="margin-left:10px; position: relative; top:20px">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="percent"
                                            {{ $promotion->type_value == 'percent' ? 'checked' : '' }}
                                            name="type_value" />
                                        <span class="form-check-label fw-semibold" style=color:black>
                                            %
                                        </span>
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="vnd" name="type_value"
                                            {{ $promotion->type_value == 'vnd' ? 'checked' : '' }} />
                                        <span class="form-check-label fw-semibold" style="color: rgb(0, 0, 0)">
                                            đ
                                        </span>
                                    </label>
                                </div>
                                <!--begin::Label-->
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-2">
                                <p class="text-uppercase fw-bold required">Điều kiện áp dụng</p>
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="">Tổng tiền đơn hàng >=</span>
                                </label>
                                <input type="number" class="form-control form-control-lg form-control-solid"
                                    name="total_order" placeholder="" value="{{ $promotion->total_order }}" />
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
                                <input class="form-control" placeholder="Chọn ngày" id="promotion_day_start1"
                                    value="{{ date('d/m/Y', strtotime($promotion->start)) }}" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                    <span class="">Kết thúc</span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control" placeholder="Chọn ngày" id="promotion_day_end2"
                                    value="{{ $promotion->end == '1970-01-01' ? date('d/m/Y', strtotime($promotion->end)) : '' }}" />
                            </div>
                            <div class="fv-row mb-2">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="">Mô tả</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control" name="description" aria-label="With textarea" rows="3">{{ $promotion->description }}</textarea>
                                <!--end::Input-->
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
                                            {{ $key == $promotion->status ? 'selected' : '' }}>{{ $item[0] }}
                                        </option>
                                    @endforeach
                                </select>
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
