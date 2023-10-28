 @section('style')
     <style>
         .active-table:selecte {
             background: aqua;
         }
     </style>
 @endsection

 <!--begin::Modal - Create App-->
 <div class="modal fade" id="modal_choose_table" tabindex="-1" aria-hidden="true">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-dialog-centered mw-900px">
         <!--begin::Modal content-->
         <div class="modal-content">
             <!--begin::Modal header-->
             <div class="modal-header">
                 <!--begin::Modal title-->
                 <h2>Chọn bàn</h2>
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
             <div class="modal-body px-lg-10" style="height:500px">
                 <!--begin::Stepper-->
                 <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                     id="kt_modal_create_app_stepper">
                     <!--begin::Aside-->

                     <!--begin::Aside-->
                     <!--begin::Content-->
                     <div class="flex-row-fluid py-lg-5 row">
                         <div class="col-3" style=" border-right: 1px solid #cccccc;height:450px">
                             <ul
                                 class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-200px">
                                 <li class="nav-item w-100 me-0 mb-md-2">
                                     <a class="nav-link w-100 active btn btn-flex btn-active-light-success"
                                         data-bs-toggle="tab" href="#kt_vtab_pane_1">
                                         <span class="svg-icon fs-2"><svg>...</svg></span>
                                         <span class="d-flex flex-column align-items-start">
                                             <span class="fs-4 fw-bold">Tầng trệt</span>

                                         </span>
                                     </a>
                                 </li>
                                 <li class="nav-item w-100 me-0 mb-md-2">
                                     <a class="nav-link w-100 btn btn-flex btn-active-light-success"
                                         data-bs-toggle="tab" href="#kt_vtab_pane_2">
                                         <span class="svg-icon fs-2"><svg>...</svg></span>
                                         <span class="d-flex flex-column align-items-start">
                                             <span class="fs-4 fw-bold">Tầng 1</span>

                                         </span>
                                     </a>
                                 </li>
                                 <li class="nav-item w-100 me-0 mb-md-2">
                                     <a class="nav-link w-100 btn btn-flex btn-active-light-success"
                                         data-bs-toggle="tab" href="#kt_vtab_pane_3">
                                         <span class="svg-icon fs-2"><svg>...</svg></span>
                                         <span class="d-flex flex-column align-items-start">
                                             <span class="fs-4 fw-bold">Tầng 2</span>

                                         </span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                        
                         <div class="col-9">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                    <h4 class="title fw-bold mb-3" style="text-transform:uppercase;">tầng trệt</h4>
                                    <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
       
                                        <!--begin::Col-->
                                        <div class="col-md-3 col-lg-3 col-xxl-3">
                                            <label
                                                class="btn btn-outline active btn-outline-dashed justify-content-center
                                                btn-active-light-primary d-flex text-start p-6"
                                                data-kt-button="true">
       
                                                <span class="">
                                                    <span class="fs-4 fw-bold mb-1 d-block">Bàn 1</span>
       
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xxl-3">
                                            <label
                                                class="btn btn-outline btn-outline-dashed justify-content-center
                                                btn-active-light-primary d-flex text-start p-6"
                                                data-kt-button="true">
       
                                                <span class="">
                                                    <span class="fs-4 fw-bold mb-1 d-block">Bàn 2</span>
       
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xxl-3">
                                           <label
                                               class="btn btn-outline btn-outline-dashed justify-content-center
                                               btn-active-light-primary d-flex text-start p-6"
                                               data-kt-button="true">
       
                                               <span class="">
                                                   <span class="fs-4 fw-bold mb-1 d-block">Bàn 3</span>
       
                                               </span>
                                           </label>
                                       </div>
                                       <div class="col-md-3 col-lg-3 col-xxl-3">
                                           <label
                                               class="btn btn-outline btn-outline-dashed justify-content-center
                                               btn-active-light-primary d-flex text-start p-6"
                                               data-kt-button="true">
       
                                               <span class="">
                                                   <span class="fs-4 fw-bold mb-1 d-block">Bàn 4</span>
       
                                               </span>
                                           </label>
                                       </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">
                                    <h4 class="title fw-bold mb-3" style="text-transform:uppercase;">tầng 1</h4>
                                    <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
       
                                        <!--begin::Col-->
                                        <div class="col-md-3 col-lg-3 col-xxl-3">
                                            <label
                                                class="btn btn-outline btn-outline-dashed justify-content-center
                                                btn-active-light-primary d-flex text-start p-6"
                                                data-kt-button="true">
       
                                                <span class="">
                                                    <span class="fs-4 fw-bold mb-1 d-block">Bàn 1</span>
       
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xxl-3">
                                            <label
                                                class="btn btn-outline btn-outline-dashed justify-content-center
                                                btn-active-light-primary d-flex text-start p-6"
                                                data-kt-button="true">
       
                                                <span class="">
                                                    <span class="fs-4 fw-bold mb-1 d-block">Bàn 2</span>
       
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xxl-3">
                                           <label
                                               class="btn btn-outline btn-outline-dashed justify-content-center
                                               btn-active-light-primary d-flex text-start p-6"
                                               data-kt-button="true">
       
                                               <span class="">
                                                   <span class="fs-4 fw-bold mb-1 d-block">Bàn 3</span>
       
                                               </span>
                                           </label>
                                       </div>
                                       <div class="col-md-3 col-lg-3 col-xxl-3">
                                           <label
                                               class="btn btn-outline btn-outline-dashed justify-content-center
                                               btn-active-light-primary d-flex text-start p-6"
                                               data-kt-button="true">
       
                                               <span class="">
                                                   <span class="fs-4 fw-bold mb-1 d-block">Bàn 4</span>
       
                                               </span>
                                           </label>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            
                         </div>

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

 @section('script')
     <script>
         $(document).ready(function() {


         })
     </script>
 @endsection
