<input type="hidden" name="id" value="{{ $customer_group->id }}">
<input type="hidden" name="type" value="all">
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên nhóm khách hàng</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="Tên nhóm khách hàng" value="{{ $customer_group->name }}" />
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mã</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="Để trống tự sinh" value="{{ $customer_group->code }}" />
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control" aria-label="With textarea" rows="2" name="description">{{ $customer_group->description }}</textarea>
    <!--end::Input-->
</div>


<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class=" fw-semibold fs-6 mb-2">Trạng
        thái</label>
    <select class="form-select w-50" aria-label="Select example" name="status">

        @foreach ($data['status'] as $key => $item)
            <option value="{{ $key }}" {{ $customer_group->status == $key ? 'selected' : '' }}>
                {{ $item[0] }}</option>
        @endforeach


    </select>
</div>
