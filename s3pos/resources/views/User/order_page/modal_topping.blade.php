  <!--begin::Modal - Create App-->
  <div class="modal fade" id="modal_add_topping" tabindex="-1" aria-hidden="true">
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
                      <div class="flex-row-fluid py-lg-5">
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <div class="d-flex align-items-center position-relative my-1 mb-5">
                                <select class="form-select mb-2 w-100"
                                data-placeholder="Select an option">
                                <option>Chọn danh mục topping</option>
                                <option value="1">Hiển thị
                                </option>
                                <option value="0">Ẩn</option>

                            </select>
                                
                            </div>
                            <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                <div class="d-flex align-items-center position-relative my-1 mb-5">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-user-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Tìm kiếm " />
                                </div>
                            </div>
                            
                        </div>
                      
                          <!--begin::Form-->
                          <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">
                              <!--begin::Step 4-->
                              <!--begin::Tap pane-->
                              <div class="tab-pane fade show active" id="kt_pos_food_content_1">
                                  <!--begin::Wrapper-->
                                  <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
                                      <!--begin::Card-->
                                      <div class="card card-flush flex-row-fluid pb-5 w-160px h-200px">
                                          <!--begin::Body-->
                                          <div class="card-body"
                                              style="padding:10px 10px 0px 10px; border:1px solid #cccccc ; border-radius:12px">
                                              <!--begin::Food img-->
                                              <div style="margin-left:20px">
                                                  <img src="https://i.pinimg.com/236x/e4/6c/50/e46c505ffc558bbdef893122a1db7416.jpg"
                                                      class="rounded-3 mb-4 w-100px h-100px w-xxl-200px h-xx  l-200px"
                                                      alt="" />
                                              </div>



                                              <!--end::Food img-->
                                              <!--begin::Info-->
                                              <div class="mb-2 ">
                                                  <!--begin::Title-->
                                                  <div class="text-start fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6"
                                                      style="overflow: hidden;text-overflow: ellipsis">Trân châu - <span
                                                          class="text-success text-end fw-bold fs-5">24.000 đ</span>

                                                  </div>
                                                  <div class="" style="display: flex; align-items:center">
                                                      <a href="#" class="">
                                                          <i
                                                              class="ki-duotone ki-message-minus fs-2hx text-success">
                                                              <span class="path1"></span>
                                                              <span class="path2"></span>
                                                          </i>
                                                      </a>
                                                      <span style="padding-left: 5px; padding-right:5px" class="fw-bold fs-5"> 0 </span>
                                                      <a href="#" class="">
                                                        <i class="ki-duotone ki-plus-square fs-2hx text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                      </a>
                                                  </div>
                                                  <!--end::Title-->
                                              </div>
                                              <!--end::Info-->


                                          </div>
                                          <!--end::Body-->
                                      </div>
                                      <!--end::Card-->
                                     
                                    <!--begin::Card-->
                                    <div class="card card-flush flex-row-fluid pb-5 w-160px h-200px">
                                        <!--begin::Body-->
                                        <div class="card-body"
                                            style="padding:10px 10px 0px 10px; border:1px solid #cccccc ; border-radius:12px">
                                            <!--begin::Food img-->
                                            <div style="margin-left:20px">
                                                <img src="https://i.pinimg.com/236x/e4/6c/50/e46c505ffc558bbdef893122a1db7416.jpg"
                                                    class="rounded-3 mb-4 w-100px h-100px w-xxl-200px h-xx  l-200px"
                                                    alt="" />
                                            </div>



                                            <!--end::Food img-->
                                            <!--begin::Info-->
                                            <div class="mb-2 ">
                                                <!--begin::Title-->
                                                <div class="text-start fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6"
                                                    style="overflow: hidden;text-overflow: ellipsis">Trân châu - <span
                                                        class="text-success text-end fw-bold fs-5">24.000 đ</span>

                                                </div>
                                                <div class="" style="display: flex; align-items:center">
                                                    <a href="#" class="">
                                                        <i
                                                            class="ki-duotone ki-message-minus fs-2hx text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a>
                                                    <span style="padding-left: 5px; padding-right:5px" class="fw-bold fs-5"> 0 </span>
                                                    <a href="#" class="">
                                                      <i class="ki-duotone ki-plus-square fs-2hx text-success">
                                                          <span class="path1"></span>
                                                          <span class="path2"></span>
                                                          <span class="path3"></span>
                                                      </i>
                                                    </a>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Info-->


                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                      <!--begin::Card-->
                                      <div class="card card-flush flex-row-fluid pb-5 w-160px h-200px">
                                        <!--begin::Body-->
                                        <div class="card-body"
                                            style="padding:10px 10px 0px 10px; border:1px solid #cccccc ; border-radius:12px">
                                            <!--begin::Food img-->
                                            <div style="margin-left:20px">
                                                <img src="https://i.pinimg.com/236x/e4/6c/50/e46c505ffc558bbdef893122a1db7416.jpg"
                                                    class="rounded-3 mb-4 w-100px h-100px w-xxl-200px h-xx  l-200px"
                                                    alt="" />
                                            </div>



                                            <!--end::Food img-->
                                            <!--begin::Info-->
                                            <div class="mb-2 ">
                                                <!--begin::Title-->
                                                <div class="text-start fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6"
                                                    style="overflow: hidden;text-overflow: ellipsis">Trân châu - <span
                                                        class="text-success text-end fw-bold fs-5">24.000 đ</span>

                                                </div>
                                                <div class="" style="display: flex; align-items:center">
                                                    <a href="#" class="">
                                                        <i
                                                            class="ki-duotone ki-message-minus fs-2hx text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a>
                                                    <span style="padding-left: 5px; padding-right:5px" class="fw-bold fs-5"> 0 </span>
                                                    <a href="#" class="">
                                                      <i class="ki-duotone ki-plus-square fs-2hx text-success">
                                                          <span class="path1"></span>
                                                          <span class="path2"></span>
                                                          <span class="path3"></span>
                                                      </i>
                                                    </a>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Info-->


                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                      <!--begin::Card-->
                                      <div class="card card-flush flex-row-fluid pb-5 w-160px h-200px">
                                        <!--begin::Body-->
                                        <div class="card-body"
                                            style="padding:10px 10px 0px 10px; border:1px solid #cccccc ; border-radius:12px">
                                            <!--begin::Food img-->
                                            <div style="margin-left:20px">
                                                <img src="https://i.pinimg.com/236x/e4/6c/50/e46c505ffc558bbdef893122a1db7416.jpg"
                                                    class="rounded-3 mb-4 w-100px h-100px w-xxl-200px h-xx  l-200px"
                                                    alt="" />
                                            </div>



                                            <!--end::Food img-->
                                            <!--begin::Info-->
                                            <div class="mb-2 ">
                                                <!--begin::Title-->
                                                <div class="text-start fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6"
                                                    style="overflow: hidden;text-overflow: ellipsis">Trân châu - <span
                                                        class="text-success text-end fw-bold fs-5">24.000 đ</span>

                                                </div>
                                                <div class="" style="display: flex; align-items:center">
                                                    <a href="#" class="">
                                                        <i
                                                            class="ki-duotone ki-message-minus fs-2hx text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a>
                                                    <span style="padding-left: 5px; padding-right:5px" class="fw-bold fs-5"> 0 </span>
                                                    <a href="#" class="">
                                                      <i class="ki-duotone ki-plus-square fs-2hx text-success">
                                                          <span class="path1"></span>
                                                          <span class="path2"></span>
                                                          <span class="path3"></span>
                                                      </i>
                                                    </a>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Info-->


                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                     

                                  </div>
                                  <!--end::Wrapper-->
                              </div>
                              <!--end::Tap pane-->



                              <!--begin::Actions-->
                              <div class="text-center pt-10">
                                  <button type="reset" class="btn btn-light me-3 btn-cancle"
                                      data-kt-users-modal-action="cancel">Hủy</button>
                                  <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                      <span class="indicator-label">Xác nhận</span>
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
