<input type="hidden" name="id" value="{{ $staff->id }}">
<input type="hidden" name="type" value="all">
<div class="col-md-6 mb-2">
    <!--begin::Nav-->
    <div class="">
        <div class="fv-row mb-2 account_staff">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Email</span>
            </label>
            <input type="text" class="form-control form-control-lg" name="email" placeholder="Email đăng nhập"
                value="{{ $staff->email }}" />
        </div>
        <div class="fv-row mb-2">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-3">
                <span class="">Chức vụ</span>
            </label>
            <select class="form-select" data-control="select2" aria-label="Select example" name="position_id">
                <option selected value="">-- Chọn chức vụ -- </option>
                @foreach ($data['positions'] as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $staff->position_id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Phòng ban</span>
            </label>
            <select class="form-select" data-control="select2" aria-label="Select example" name="department_id">
                <option selected value="">-- Chọn phòng ban -- </option>
                @foreach ($data['departments'] as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $staff->department_id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Trạng thái</span>
            </label>
            <select class="form-select" data-hide-search="true" data-control="select2" aria-label="Select example"
                name="status">
                <option selected value="">Trạng thái </option>
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $staff->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-md-6 mb-2">
    <!--begin::Nav-->
    <div class="">
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Họ tên</span>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Họ tên nhân viên"
                value="{{ $staff->name }}" />
            <!--end::Input-->
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Số điện
                    thoại</span>
            </label>
            <input type="text" class="form-control form-control-lg" name="phone" placeholder="0934 956 345"
                value="{{ $staff->phone }}" />
            <!--end::Input-->
        </div>
        <div class="fv-row mb-2">
            <div class="symbol symbol-circle symbol-100px overflow-hidden me-3">
                <div class="symbol-label w-100 h-90px">
                    @if ($staff->avatar == null)
                        <img src="{{ asset('images/avatar.jpg') }} " alt="" class="w-100" />
                    @else
                        <img src="{{ asset('storage/' . $staff->avatar) }} " alt="{{ $staff->name }}"
                            class="w-100" />
                    @endif
                </div>
            </div>
            <input type="file" class="form-control form-control-lg" name="avatar" value="" />
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="fv-row mb-2">
        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
            <span class="">Địa
                chỉ</span>
        </label>
        <textarea name="description" id="" cols="" rows="2" class="form-control">{{ $staff->description }}</textarea>
    </div>
</div>
