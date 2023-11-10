<input type="hidden" name="id" value="{{ $customer->id }}">
<input type="hidden" name="type" value="all">
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên khách hàng</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control mb-3 mb-lg-0" placeholder="Tên khách hàng"
        value="{{ $customer->name }}" />
    <!--end::Input-->
</div>
<div class="fv-row mb-7">
    <label class="fw-semibold fs-6 mb-2">Mã</label>
    <input type="text" name="code" class="form-control mb-3 mb-lg-0" placeholder="Để trống tự sinh"
        value="{{ $customer->code }}" />
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Số điện thoại</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="phone" class="form-control mb-3 mb-lg-0" placeholder="0988 676 676"
        value="{{ $customer->phone }}" />
    <!--end::Input-->
</div>
<div class="fv-row row mb-7">
    <!--begin::Label-->
    <div class="col">
        <label class=" fw-semibold fs-6 mb-2">Nhóm khách hàng</label>
        <select class="form-select" aria-label="Select example" name="group_id">
            <option value="">Chọn</option>
            @foreach ($data['customer_group'] as $item)
                <option value="{{ $item->id }}" {{ $item->id == $customer->group_id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label class=" fw-semibold fs-6 mb-2">Trạng
            thái</label>
        <select class="form-select" aria-label="Select example" name="status">
            <option selected value="">Trạng thái </option>
            @foreach ($data['status'] as $key => $item)
                <option value="{{ $key }}">{{ $item[0] }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control" aria-label="With textarea" rows="2" name="description">{{ $customer->description }}</textarea>
    <!--end::Input-->
</div>
