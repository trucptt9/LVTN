<input type="hidden" name="id" value="{{ $staff->id }}">
<input type="hidden" name="type" value="all">

<div class="col-5">
    <!--begin::Nav-->
    <div class="stepper-nav ps-lg-10">
        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
            <h4 class="">Thông tin tài
                khoản</h4>
        </label>

        <div class="fv-row mb-2 account_staff">

            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Email</span>

            </label>

            <input type="text" class="form-control form-control-lg form-control-solid" name="email"
                placeholder="Email đăng nhập" value="{{ $staff->email }}" />

            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                <span class="">Mật khẩu</span>

            </label>

            <input type="text" class="form-control form-control-lg form-control-solid" name="password"
                placeholder="Mật khẩu tài khoản" value="{{ $staff->password }}" />
            <!--end::Input-->
        </div>

        <div class="fv-row mb-2">

            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-3">
                <span class="">Chức vụ</span>

            </label>
            <select class="form-select" aria-label="Select example" name="position_id">
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
            <select class="form-select" aria-label="Select example" name="department_id">
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
            <select class="form-select" aria-label="Select example" name="status">
                <option selected value="">Trạng thái </option>
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $staff->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}</option>
                @endforeach


            </select>
        </div>

    </div>
</div>

<div class="col-6">
    <!--begin::Nav-->
    <div class="stepper-nav ps-lg-10">
        <div class="fv-row mb-2">
            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                <h4 class="">Thông tin liên hệ </h4>

            </label>
            <!--begin::Label-->

            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Họ tên</span>

            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="name"
                placeholder="Họ tên nhân viên" value="{{ $staff->name }}" />
            <!--end::Input-->
        </div>
        <div class="fv-row mb-2">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Mã</span>
            </label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="code"
                placeholder="Để trống tự sinh" value="{{ $staff->code }}" />
        </div>
        <div class="fv-row mb-2">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Số điện
                    thoại</span>

            </label>

            <input type="text" class="form-control form-control-lg form-control-solid" name="phone"
                placeholder="0934 956 345" value="{{ $staff->phone }}" />
            <!--end::Input-->
        </div>
        <div class="fv-row mb-2">
            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Ảnh</span>
            </label>
            <div class="symbol symbol-circle symbol-100px overflow-hidden me-3">

                <div class="symbol-label">
                    @if ($staff->avatar == null)
                        <img src="{{ asset('images/avatar.jpg') }} " alt=""
                            class="w-100" />
                    @else
                        <img src="{{ asset('storage/' . $staff->avatar) }} " alt="{{ $staff->name }}"
                            class="w-100" />
                    @endif
                </div>

            </div>
          
            <input type="file" class="form-control form-control-lg form-control-solid" name="avatar"
                value="" />
        </div>
        <div class="fv-row mb-2">

            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="">Địa
                    chỉ</span>

            </label>
            <textarea name="description" id="" cols="" rows="2" class="form-control">{{ $staff->description }}</textarea>

        </div>

    </div>

</div>
