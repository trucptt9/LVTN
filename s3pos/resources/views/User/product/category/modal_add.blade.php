   <!--begin::Modal - Add task-->
   <div class="modal fade" id="modal_add_category" tabindex="-1" aria-hidden="true">
       <!--begin::Modal dialog-->
       <div class="modal-dialog modal-dialog-centered mw-650px">
           <!--begin::Modal content-->
           <div class="modal-content">
               <!--begin::Modal header-->
               <div class="modal-header" id="kt_modal_add_user_header">
                   <!--begin::Modal title-->
                   <h2 class="fw-bold">Thêm danh mục món</h2>
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
               <div class="modal-body px-5 my-7">
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
                               <label class="required fw-semibold fs-6 mb-2">Tên danh mục</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="Tên danh mục" />
                               <!--end::Input-->
                           </div>
                           <!--end::Input group-->
                           <!--begin::Input group-->
                           <div class="fv-row mb-7">
                               <!--begin::Label-->
                               <label class="fw-semibold fs-6 mb-2">Mã danh mục</label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="Nhập mã hoặc tự sinh" />
                               <!--end::Input-->
                           </div>
                           <!--end::Input group-->

                           <div class="fv-row mb-7">
                            <div class="card-title">
                                <span class=" fw-semibold fs-6 mb-2">Hình ảnh</span>
                            </div>
                            <!--begin::Label-->
                            <div class="pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input placeholder-->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }
    
                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Thay đổi hình">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Xóa hình ảnh">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
    
                            </div>
                           
                          
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
