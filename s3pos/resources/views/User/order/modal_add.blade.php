   <!--begin::Modal - Add task-->
   <div class="modal fade" id="modal_add_order" tabindex="-1" aria-hidden="true">
       <!--begin::Modal dialog-->
       <div class="modal-dialog modal-dialog-centered mw-650px">
           <!--begin::Modal content-->
           <div class="modal-content">
               <!--begin::Modal header-->
               <div class="modal-header" id="kt_modal_add_user_header">
                   <!--begin::Modal title-->
                   <h2 class="fw-bold">Thêm cửa hàng</h2>
                   <!--end::Modal title-->
                   <!--begin::Close-->
                   <div class="btn btn-icon btn-sm btn-active-icon-primary btn-close" data-kt-users-modal-action="close">
                       <i class="ki-duotone ki-cross fs-1">
                           <span class="path1"></span>
                           <span class="path2"></span>
                       </i>
                   </div>
                   <!--end::Close-->
               </div>
               <!--end::Modal header-->
               <!--begin::Modal body-->
               <div class="modal-body my-5">
                   <!--begin::Form-->
                   <form id="kt_modal_add_user_form" class="form" action="#">
                       <!--begin::Scroll-->
                       <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                           data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                           data-kt-scroll-dependencies="#kt_modal_add_user_header"
                           data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="required fw-semibold fs-6 mb-2">Tên cửa
                                   hàng</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="text" name="name" class="form-control mb-3 mb-lg-0"
                                   placeholder="Tên cửa hàng" />
                               <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="required fw-semibold fs-6 mb-2">Mã cửa
                                   hàng</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="text" name="code" class="form-control mb-3 mb-lg-0"
                                   placeholder="Nhập mã hoặc tự sinh" />
                               <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="required fw-semibold fs-6 mb-2">Số điện thoại
                                   liên hệ</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="text" name="phone" class="form-control mb-3 mb-lg-0"
                                   placeholder="Nhập số điện thoại" />
                               <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="required fw-semibold fs-6 mb-2">Địa
                                   chỉ</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <textarea class="form-control" aria-label="With textarea" rows="2"></textarea>
                               <!--end::Input-->
                           </div>
                           <!--end::Input group-->
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
                               <label class="required fw-semibold fs-6 mb-2">Trạng
                                   thái</label>
                               <!--end::Label-->
                               <select class="form-select mb-2 w-50" data-placeholder="Select an option">
                                   <option></option>
                                   <option value="1" selected="selected">Hiển thị
                                   </option>
                                   <option value="0">Ẩn</option>

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
                                   <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                           </button>
                       </div>
                       <!--end::Actions-->
                   </form>
                   <!--end::Form-->
               </div>
               <!--end::Modal body-->
           </div>
           <!--end::Modal content-->
       </div>
       <!--end::Modal dialog-->
   </div>
   <!--end::Modal - Add task-->
