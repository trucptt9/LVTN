<input type="hidden" name="id" value="{{ $category_product->id }}">
<input type="hidden" name="type" value="all">
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control mb-3 mb-lg-0" placeholder="Tên nhóm khách hàng"
        value="{{ $category_product->name }}" />
    <!--end::Input-->
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mã</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="code" class="form-control mb-3 mb-lg-0" placeholder="Để trống tự sinh"
        value="{{ $category_product->code }}" />
    <!--end::Input-->
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <textarea name="description" id="" rows="2">{{ $category_product->description }}</textarea>
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class=" fw-semibold fs-6 mb-2">Trạng
        thái</label>
    <select class="form-select w-50" aria-label="Select example" name="status">
        @foreach ($data['status'] as $key => $item)
            <option value="{{ $key }}" {{ $category_product->status == $key ? 'selected' : '' }}>
                {{ $item[0] }}</option>
        @endforeach
    </select>
</div>
