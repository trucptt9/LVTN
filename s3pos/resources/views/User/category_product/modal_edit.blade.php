<input type="hidden" name="id" value="{{ $category_product->id }}">
<input type="hidden" name="type" value="all">
<div class="row">
    <div class="col-md-6 mb-2">
        <div class="fv-row">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="name" class="form-control mb-3 mb-lg-0" placeholder="Tên nhóm khách hàng"
                value="{{ $category_product->name }}" />
            <!--end::Input-->
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <div class="fv-row">
            <!--begin::Label-->
            <label class=" fw-semibold fs-6 mb-2">Trạng
                thái</label>
            <select class="form-select" aria-label="Select example" name="status">
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $category_product->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="fv-row mb-2">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <textarea name="description" class="form-control" rows="2">{{ $category_product->description }}</textarea>
</div>
