<input type="hidden" name="id" value="{{ $topping_group->id }}">
<input type="hidden" name="type" value="all">
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tên danh mục"
        value="{{ $topping_group->name }}" />
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mã</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="Để trống tự sinh" value="{{ $topping_group->code }}" />
    <!--end::Input-->
</div>
<!--end::Input group-->

<div class="fv-row mb-7">
    <div class="card-title">
        <span class=" fw-semibold fs-6 mb-2">Hình ảnh</span>
    </div>
    @if ($topping_group->image != null)
        <img src="{{ asset('storage/' . $topping_group->image) }}" alt="" width="100" height="100">
    @else
        <img src="{{ asset('images/image_none.png') }}" alt="" width="100" height="100">
    @endif
    <input type="file" name="image" accept=".png, .jpg, .jpeg" />


</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control" aria-label="With textarea" rows="2" name="description">{{ $topping_group->description }}</textarea>
    <!--end::Input-->
</div>

<!--end::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class=" fw-semibold fs-6 mb-2">Trạng
        thái</label>
    <select class="form-select w-50" aria-label="Select example" name="status">

        @foreach ($data['status'] as $key => $item)
            <option value="{{ $key }}" {{ $topping_group->status == $key ? 'selected' : '' }}>
                {{ $item[0] }}</option>
        @endforeach


    </select>
</div>
