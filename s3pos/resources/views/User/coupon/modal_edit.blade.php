<input type="hidden" name="id" value="{{ $coupon->id }}">
<input type="hidden" name="type" value="all">
<div class="col-6">
    <!--begin::Nav-->
    <div class="stepper-nav ps-lg-10">
        <div class="fv-row mb-2">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="required">Tên phiếu</span>
            </label>
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Tên chương trình"
                value="{{ $coupon->name }}" />
            <!--begin::Label-->
            <!--end::Input-->
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


    </div>


    <!--end::Nav-->
</div>

<div class="col-6">
    <!--begin::Nav-->

    <div class="stepper-nav ps-lg-10">
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="required">Bắt đầu</span>
            </label>

            <input class="form-control" placeholder="Chọn ngày" name="start" id="coupon_day_start1"
                value="{{ date('d/m/Y', strtotime($coupon->start)) }}" />

        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Kết thúc</span>
            </label>
            <!--end::Label-->
            <input class="form-control" placeholder="Chọn ngày" name="end" id="coupon_day_end2"
                value=" {{ date('d/m/Y', strtotime($coupon->end)) }}" />
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Mô tả</span>

            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <textarea class="form-control" name="description" aria-label="With textarea" rows="3">{{ $coupon->description }}</textarea>
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
                <option value="" selected>Chọn trạng thái
                </option>
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $key == $coupon->status ?? 'selected' }}>{{ $item[0] }}
                    </option>
                @endforeach
            </select>
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
            <input class="form-control" placeholder="Chọn ngày" name="start" id="coupon_day_start1"
                value="{{ date('d/m/Y', strtotime($coupon->start)) }}" />
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Kết thúc</span>
            </label>
            <!--end::Label-->
            <input class="form-control" placeholder="Chọn ngày" name="end" id="coupon_day_end2"
                value=" {{ date('d/m/Y', strtotime($coupon->end)) }}" />
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Mô tả</span>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <textarea class="form-control" name="description" aria-label="With textarea" rows="3">{{ $coupon->description }}</textarea>
            <!--end::Input-->
        </div>
    </div>
    <!--end::Nav-->
</div>
@section('script')
    <script>
        $(document).ready(function() {
            $("#coupon_day_start1").flatpickr({
                dateFormat: 'd-m-Y'
            });
            $("#coupon_day_end2").flatpickr({
                dateFormat: 'd-m-Y'
            });
        })
    </script>
@endsection
