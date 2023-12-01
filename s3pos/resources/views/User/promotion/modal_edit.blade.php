<input type="hidden" name="id" value="{{ $promotion->id }}">
<input type="hidden" name="type" value="all">
<div class="col-6">
    <!--begin::Nav-->
    <div class="stepper-nav ps-lg-10">
        <div class="fv-row mb-2">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="required">Tên chương trình</span>
            </label>
            <input type="text" class="form-control form-control-lg" name="subject" placeholder="Tên chương trình"
                value="{{ $promotion->subject }}" />
            <!--begin::Label-->
            <!--end::Input-->
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Đối tượng áp dụng</span>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <select name="customer_group_id" id="" class="form-select" data-control="select2"
                data-hide-search="true">
                <option value="0" selected>Tất cả
                </option>
                @foreach ($data['customer_group'] as $item)
                    <option value="{{ $item->id }}"
                        {{ $item->id == $promotion->customer_group_id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
        <div class="fv-row mb-2" style="display: flex; align-items:center">
            <div class="">
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                    <span class="">Giá trị khuyến mãi</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="number" class="form-control form-control-lg" name="value"
                    placeholder="Giá trị khuyến mãi" value="{{ $promotion->value }}" />
            </div>

            <div class="" style="margin-left:10px; position: relative; top:20px">
                <label class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="radio" value="percent"
                        {{ $promotion->type_value == 'percent' ? 'checked' : '' }} name="type_value" />
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
        </div>
        <div class="fv-row mt-5">
            <span class="text-uppercase fw-bold required">Điều kiện áp dụng</span>
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-1">
                <span class="">Tổng tiền đơn hàng >=</span>
            </label>
            <input type="number" class="form-control form-control-lg" name="total_order" placeholder=""
                value="{{ $promotion->total_order }}" />
            <!--end::Input-->
        </div>
    </div>
    <!--end::Nav-->
</div>
<div class="col-6">
    <!--begin::Nav-->
    <div class="stepper-nav pe-lg-10">
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="required">Bắt đầu</span>
            </label>
            <input class="form-control" placeholder="Chọn ngày" name="start" id="promotion_day_start"
                value="{{ $promotion->start }}" />
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Kết thúc</span>
            </label>
            <!--end::Label-->
            <input class="form-control" placeholder="Chọn ngày" name="end" id="promotion_day_end"
                value="{{ $promotion->end }}" />
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
            <!--end::Label-->
            <!--begin::Input-->
            <select name="status" id="" class="form-select" data-control="select2" data-hide-search="true">

                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $key == $promotion->status ?? 'selected' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
    </div>
    <!--end::Nav-->
</div>
