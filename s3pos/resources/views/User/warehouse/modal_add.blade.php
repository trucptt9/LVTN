   <!--begin::Modal - Add task-->
   <div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
       <!--begin::Modal dialog-->
       <div class="modal-dialog modal-dialog-centered mw-650px">
           <!--begin::Modal content-->
           <div class="modal-content">
               <!--begin::Modal header-->
               <div class="modal-header" id="kt_modal_add_user_header">
                   <!--begin::Modal title-->
                   <h2 class="fw-bold">Thêm kho hàng</h2>
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
                   <form class="form" action="{{ route('warehouse.insert') }}" id="form-create" method="POST"
                       enctype="multipart/form-data">
                       <!--begin::Scroll-->
                       <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll">
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="required fw-semibold fs-6 mb-2">Tên</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="text" name="name" class="form-control mb-3 mb-lg-0"
                                   placeholder="Tên kho hàng" />
                               <!--end::Input-->
                           </div>
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="fw-semibold fs-6 mb-2">Địa chỉ</label>
                               <textarea name="address" rows="3" class="form-control"></textarea>
                           </div>
                           <!--end::Input group-->
                       </div>
                       <!--end::Scroll-->
                       <!--begin::Actions-->
                       <div class="text-center pt-5">
                           <button type="reset" class="btn btn-light me-3 btn-cancle"
                               data-kt-users-modal-action="cancel">Hủy</button>
                           <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                               <span class="indicator-label">Thêm</span>
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
