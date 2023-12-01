<input type="hidden" name="id" value="{{ $method_payment->id }}">
<input type="hidden" name="type" value="all">
<div class="row">
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Tên phương thức</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="name" class="form-control mb-3 mb-lg-0" placeholder="Tên nhóm khách hàng"
                value="{{ $method_payment->name }}" />
            <!--end::Input-->
        </div>
    </div>
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2">Mã</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="code" class="form-control mb-3 mb-lg-0" placeholder="Để trống tự sinh"
                value="{{ $method_payment->code }}" />
            <!--end::Input-->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fw-semibold fs-6 mb-2">Mô tả</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="number" name="capacity" class="form-control mb-3 mb-lg-0" 
                value="{{ $method_payment->description }}" />
            <!--end::Input-->
        </div>
    </div>
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class=" fw-semibold fs-6 mb-2">Trạng
                thái</label>
            <select class="form-select" data-control="select2" data-hide-search="true" aria-label="Select example"
                name="status">
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $method_payment->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
