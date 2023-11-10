<input type="hidden" name="id" value="{{ $topping_group->id }}">
<input type="hidden" name="type" value="all">
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name" class="form-control mb-3 mb-lg-0" placeholder="Tên danh mục"
        value="{{ $topping_group->name }}" />
    <!--end::Input-->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <label class=" fw-semibold fs-6 mb-2">Hình ảnh</label>
            <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class=" fw-semibold fs-6 mb-2">Trạng
                thái</label>
            <select class="form-select" data-hide-search="true" data-control="select2" aria-label="Select example"
                name="status">
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $topping_group->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control" aria-label="With textarea" rows="2" name="description">{{ $topping_group->description }}</textarea>
    <!--end::Input-->
</div>
