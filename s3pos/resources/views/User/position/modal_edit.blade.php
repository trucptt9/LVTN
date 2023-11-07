<input type="hidden" name="id" value="{{ $position->id }}">
<input type="hidden" name="type" value="all">
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên chức vụ</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="Tên nhóm khách hàng" value="{{ $position->name }}" />
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mã</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="Để trống tự sinh" value="{{ $position->code }}" />
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea name="description" class="form-control" rows="2">{{ $position->description }}</textarea>
    <!--end::Input-->
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class=" fw-semibold fs-6 mb-2">Trạng
        thái</label>
    <select class="form-select w-50" aria-label="Select example" name="status">

        @foreach ($data['status'] as $key => $item)
            <option value="{{ $key }}" {{ $position->status == $key ? 'selected' : '' }}>
                {{ $item[0] }}</option>
        @endforeach


    </select>
</div>
