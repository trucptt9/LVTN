<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Thêm nhân viên</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('staff.insert') }}" id="form-create" method="POST"
                    enctype="multipart/form-data">
                    <div id="kt_modal_create_app_stepper" class="px-6 pb-5">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <!--begin::Nav-->
                                <div class="">
                                    <div class="fv-row mb-2 account_staff">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                            <span class="">Email</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="email"
                                            placeholder="Email đăng nhập" value="" />
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                            <span class="">Mật khẩu</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="password"
                                            placeholder="Mật khẩu tài khoản" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-2">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-3">
                                            <span class="">Chức vụ</span>
                                        </label>
                                        <select class="form-select" data-control="select2" aria-label="Select example"
                                            name="position_id">
                                            <option selected value="">-- Chọn chức vụ -- </option>
                                            @foreach ($data['positions'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row mb-2">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="">Phòng ban</span>
                                        </label>
                                        <select class="form-select" data-control="select2" aria-label="Select example"
                                            name="department_id">
                                            <option selected value="">-- Chọn phòng ban -- </option>
                                            @foreach ($data['departments'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <!--begin::Nav-->
                                <div class="mt-3">
                                    <div class="fv-row mb-2">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Họ tên</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg" name="name"
                                            placeholder="Họ tên nhân viên" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-2">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Số điện
                                                thoại</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="phone"
                                            placeholder="0934 956 345" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-2">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="">Ảnh</span>
                                        </label>
                                        <input type="file" class="form-control form-control-lg" name="avatar"
                                            value="" />
                                    </div>
                                    <div class="fv-row mb-2">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="">Trạng thái</span>
                                        </label>
                                        <select class="form-select" data-hide-search="true" data-control="select2"
                                            aria-label="Select example" name="status">
                                            <option selected value="">Trạng thái </option>
                                            @foreach ($data['status'] as $key => $item)
                                                <option value="{{ $key }}">{{ $item[0] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-2">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Địa
                                    chỉ</span>
                            </label>
                            <textarea name="" id="" cols="" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="text-center pt-5">
                            <button type="reset" class="btn btn-light me-3 close-btn">Hủy</button>
                            <button type="submit" class="btn btn-primary btn-create">
                                <span class="indicator-label">Tạo mới </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
