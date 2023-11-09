
  <div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Thêm topping</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary btn-close" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-lg-10">
                <!--begin::Stepper-->
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                    id="kt_modal_create_app_stepper">
                    <!--begin::Aside-->

                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('topping.insert') }}" id="form-create" method="POST" enctype="multipart/form-data">
                            <!--begin::Step 4-->
                            <div data-kt-stepper-element="content" class="current">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Tên topping</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Nhập tên topping" name="name" value="" />
                                        </div>

                                        <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">Mã
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="Đê trống tự sinh" name="code" value="" />
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
                                                <span class="required">Giá bán</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Giá bán topping" name="price" value="" />
                                        </div>

                                        <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Giá vốn</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Giá vốn topping" name="cost" value="" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 required fw-semibold form-label mb-2">Danh mục</label>
                                            <!--end::Label-->
                                            <select class="form-select" aria-label="Select example" name="group_id">
                                                <option selected value="">Chọn danh mục </option>
                                                @foreach ($data['group_topping'] as  $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>

                                        <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
                                            <!--end::Label-->
                                            <select class="form-select" aria-label="Select example" name="status">
                                                <option selected value="">Trạng thái </option>
                                                @foreach ($data['status'] as $key => $item)
                                                    <option value="{{ $key }}">{{ $item[0] }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="">Hình ảnh</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="file" class="form-control form-control-solid"
                                               name="image" value="" />
                                        </div>

                                       
                                    </div>
                                   
                                </div>
                            </div>


                            <!--begin::Actions-->
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-sm btn-light me-3 btn-cancle"
                                    data-kt-users-modal-action="cancel">Hủy</button>
                                <button type="submit" class="btn btn-sm btn-primary btn-create" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Thêm</span>
                                    <span class="indicator-progress">Please wait...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
