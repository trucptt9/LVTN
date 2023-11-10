<input type="hidden" name="id" value="{{ $unit->id }}">
<input type="hidden" name="type" value="all">
<div class="row">
    <div class="col-md-6">
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Tên đơn vị</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="name" class="form-control mb-3 mb-lg-0" value="{{ $unit->name }}" />
            <!--end::Input-->
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
                    <option value="{{ $key }}" {{ $unit->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">Ghi chú</label>
    <textarea name="description" rows="3" class="form-control">{{ $unit->description }}</textarea>
</div>
