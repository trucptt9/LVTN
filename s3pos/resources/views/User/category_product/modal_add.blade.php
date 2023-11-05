  <!--begin::Modal - Create App-->
  <div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-600px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                  <!--begin::Modal title-->
                  <h2>Thêm danh mục sản phẩm</h2>
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
                      <div class="flex-row-fluid py-lg-5 ">
                          <!--begin::Form-->
                          <form class="form" action="{{ route('product_category.insert') }}" id="form-create"
                              method="POST" enctype="multipart/form-data">
                              <!--begin::Scroll-->
                              <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                  data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                  data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                  data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                  <!--begin::Input group-->
                                  <div class="fv-row mb-7">
                                      <!--begin::Label-->
                                      <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
                                      <!--end::Label-->
                                      <!--begin::Input-->
                                      <input type="text" name="name"
                                          class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder="Tên danh mục" />
                                      <!--end::Input-->
                                  </div>
                                  <!--end::Input group-->
                                  <!--begin::Input group-->
                                  <div class="fv-row mb-7">
                                      <!--begin::Label-->
                                      <label class="fw-semibold fs-6 mb-2">Mã</label>
                                      <!--end::Label-->
                                      <!--begin::Input-->
                                      <input type="text" name="code"
                                          class="form-control form-control-solid mb-3 mb-lg-0"
                                          placeholder="Để trống tự sinh" />
                                      <!--end::Input-->
                                  </div>
                                  <!--end::Input group-->

                                  <div class="fv-row mb-7">
                                      <div class="card-title">
                                          <span class=" fw-semibold fs-6 mb-2">Hình ảnh</span>
                                      </div>
                                      <!--begin::Label-->
                                      <input type="file" name="image" accept=".png, .jpg, .jpeg" />


                                  </div>
                                  <div class="fv-row mb-7">
                                      <!--begin::Label-->
                                      <label class="fw-semibold fs-6 mb-2">Mô tả</label>
                                      <!--end::Label-->
                                      <!--begin::Input-->
                                      <textarea class="form-control" aria-label="With textarea" rows="2"></textarea>
                                      <!--end::Input-->
                                  </div>

                                  <!--end::Input group-->
                                  <div class="fv-row mb-7">
                                      <!--begin::Label-->
                                      <label class=" fw-semibold fs-6 mb-2">Trạng
                                          thái</label>
                                          <select class="form-select" aria-label="Select example" name="status">
                                            <option selected value="">Trạng thái </option>
                                            @foreach ($data['status'] as $key => $item)
                                                <option value="{{ $key }}">{{ $item[0] }}</option>
                                            @endforeach


                                        </select>
                                  </div>
                              </div>
                              <!--end::Scroll-->
                              <!--begin::Actions-->
                              <div class="text-center pt-10">
                                  <button type="reset" class="btn btn-light me-3 btn-cancle"
                                      data-kt-users-modal-action="cancel">Hủy</button>
                                  <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                      <span class="indicator-label">Lưu</span>
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
