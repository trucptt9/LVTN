  <!--begin::Modal - Create App-->
  <div class="modal fade" id="modal_add_area" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-900px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                  <!--begin::Modal title-->
                  <h2>Thêm khu vực bàn</h2>
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
                          <form class="form" action="{{ route('area.insert') }}" id="form-create" method="POST" enctype="multipart/form-data">
                              <!--begin::Step 4-->
                              <div data-kt-stepper-element="content" class="current">
                                  <div class="w-100">
                                      <div class="row">
                                          <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                              <!--begin::Label-->
                                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                  <span class="required">Tên khu
                                                      vực</span>

                                              </label>
                                              <!--end::Label-->
                                              <input type="text" class="form-control form-control-solid"
                                                  placeholder="Nhập tên khu vực" name="name" value="" />
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
                                                  <span class="required">Sức chứa</span>

                                              </label>
                                              <!--end::Label-->
                                              <input type="number" class="form-control form-control-solid"
                                                  placeholder="Sức chứa khu vực" name="capacity" value="" />
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


                                      <div class="fv-row mb-7">
                                          <!--begin::Label-->
                                          <label class="fw-semibold fs-6 mb-2">Mô tả</label>
                                          <!--end::Label-->
                                          <!--begin::Input-->
                                          <textarea class="form-control" aria-label="With textarea" name="description" rows="2"></textarea>
                                          <!--end::Input-->
                                      </div>
                                  </div>
                              </div>


                              <!--begin::Actions-->
                              <div class="text-center pt-10">
                                  <button type="reset" class="btn btn-light me-3 btn-cancle"
                                      data-kt-users-modal-action="cancel">Hủy</button>
                                  <button type="submit" class="btn btn-primary btn-create" data-kt-users-modal-action="submit">
                                      <span class="indicator-label">Tạo mới</span>
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
  <!--end::Modal - Create App-->
