<input type="hidden" name="id" value="{{ $customer->id }}">
<input type="hidden" name="type" value="all">
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Tên khách hàng</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="Nhập tên khách hàng" name="name"
            value="{{ $customer->name }}" />
    </div>

    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Mã
        </label>
        <!--end::Label-->
        <!--begin::Input wrapper-->
        <div class="position-relative">
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Đê trống tự sinh" name="code"
                value="{{ $customer->code }}" />
            <!--end::Input-->
            <!--begin::Card logos-->

        </div>
        <!--end::Input wrapper-->
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="">Địa chỉ</span>

        </label>
        <!--end::Label-->
        <textarea class="form-control form-control-solid" rows="2" name="address" placeholder="Địa chỉ khách hàng">{{ $customer->address }}</textarea>
    </div>

    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="">Mô tả</span>

        </label>
        <!--end::Label-->
        <textarea class="form-control form-control-solid" rows="2" name="description" placeholder="Mô tả">{{ $customer->description }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Số điện thoại</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="0786 665 545" name="phone"
            value="{{ $customer->phone }}" />
    </div>

    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="">Email</span>

        </label>
        <!--end::Label-->
        <input type="email" class="form-control form-control-solid" placeholder="a@gmail.com" name="email"
            value="{{ $customer->email }}" />
    </div>
</div>
<div class="row">
    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Nhóm khách hàng</label>
        <!--end::Label-->
        <select class="form-select" aria-label="Select example" name="group_id">

            @foreach ($data['group'] as $item)
                <option value="{{ $item->id }}" {{ $item->id == $customer->group_id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
        <!--end::Label-->
        <select class="form-select" aria-label="Select example" name="status">

            @foreach ($data['status'] as $key => $item)
                <option value="{{ $key }}" {{ $key == $customer->status ? 'selected' : '' }}>
                    {{ $item[0] }}</option>
            @endforeach


        </select>
    </div>
</div>
