<input type="hidden" name="id" value="{{ $supplier->id }}">
<input type="hidden" name="type" value="all">
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên nhà cung cấp</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control mb-3 mb-lg-0" value="{{ $supplier->name }}" />
    <!--end::Input-->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class=" fw-semibold fs-6 mb-2">Trạng
                thái</label>
            <select class="form-select" data-hide-search="true" data-control="select2" aria-label="Select example"
                name="status">
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $supplier->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Điện thoại</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="phone" class="form-control mb-3 mb-lg-0" value="{{ $supplier->phone }}" />
            <!--end::Input-->
        </div>
    </div>
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Địa chỉ</label>
    <textarea name="address" rows="3" class="form-control">{{ $supplier->address }}</textarea>
</div>
