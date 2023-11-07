<input type="hidden" name="id" value="{{ $category_product->id }}">
<input type="hidden" name="type" value="all">
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tên danh mục"
        value="{{ $category_product->name }}" />
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mã</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="Để trống tự sinh" value="{{ $category_product->code }}" />
    <!--end::Input-->
</div>


<div class="fv-row mb-7">
    <div class="card-title">
        <span class=" fw-semibold fs-6 mb-2">Hình ảnh</span>
    </div>
    @if ($category_product->image != null)
        <img src="{{ asset('storage/' . $category_product->image) }}" alt="" width="50" height="50">
    @else
        <img src="{{ asset('images/image_none.png') }}" alt="" width="50" height="50">
    @endif
    <input type="file" name="image" accept=".png, .jpg, .jpeg" />


</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control" name="description" aria-label="With textarea" rows="2">{{ $category_product->description }}</textarea>
    <!--end::Input-->
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
