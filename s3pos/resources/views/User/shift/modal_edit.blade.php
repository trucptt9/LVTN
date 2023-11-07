<input type="hidden" name="id" value="{{ $shift->id }}">
<input type="hidden" name="type" value="all">

<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Tên ca</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control  " placeholder="Nhập tên ca" name="name"
            value="{{ $shift->name }}" />
    </div>

    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Mã
        </label>
        <!--end::Label-->
        <!--begin::Input wrapper-->
        <div class="position-relative">
            <!--begin::Input-->
            <input type="text" class="form-control  " placeholder="Để trống tự sinh" name="code"
                value="{{ $shift->code }}" />

        </div>
        <!--end::Input wrapper-->
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Bắt đầu</span>

        </label>
        <!--end::Label-->
        <input class="form-control" placeholder="Chọn giờ" id="startdatepicker1" name="start"
            value="{{ $shift->start }}" />
    </div>

    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Kết thúc</span>

        </label>
        <!--end::Label-->
        <input class="form-control" placeholder="Chọn giờ" id="enddatepicker2" name="end"
            value="{{ $shift->end }}" />
    </div>
</div>

<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Tiền lương</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control  " placeholder="Nhập tiền lương" name="salary"
            value="{{ $shift->salary }}" />
    </div>
    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
        <select class="form-select w-50" aria-label="Select example" name="status">

            @foreach ($data['status'] as $key => $item)
                <option value="{{ $key }}" {{ $shift->status == $key ? 'selected' : '' }}>
                    {{ $item[0] }}</option>
            @endforeach


        </select>
    </div>

</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-semibold fs-6 mb-2">Mô tả</label>
    <textarea name="description" class="form-control" id="" rows="2">{{ $shift->description }}</textarea>
</div>
