 <!--begin::Table-->
 <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
     <thead>
         <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
             <th class="w-10px pe-2">
                 <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                     <input class="form-check-input" type="checkbox" data-kt-check="true"
                         data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                 </div>
             </th>
             <th class="min-w-55px">Avatar</th>
             <th class="min-w-120px">Mã nhân viên</th>
             <th class="min-w-125px">Họ & tên</th>
             <th class="min-w-125px">Email</th>
             <th class="min-w-120px">Chức vụ</th>

             <th class="min-w-50px text-center">Tài khoản</th>
             <th class="min-w-30px text-center">#</th>
             <th class="min-w-40px text-center">#</th>
         </tr>
     </thead>
     <tbody class="text-gray-600 fw-semibold">
         <tr>
             <td>
                 <div class="form-check form-check-sm form-check-custom form-check-solid">
                     <input class="form-check-input" type="checkbox" value="1" />
                 </div>
             </td>
             <td class="d-flex align-items-center">
                 Cửa hàng 1
             </td>
             <td>Administrator</td>
             <td>
                 <div class="badge badge-light fw-bold">Yesterday</div>
             </td>
             <td></td>
             <td></td>
             <td class="text-center">

                 Đã cấp
             </td>
             <td class="text-center">
                 <a href="{{ route('staffs.detail') }}">
                     <i class="ki-duotone ki-eye fs-2qx text-dark">
                         <span class="path1"></span>
                         <span class="path2"></span>
                         <span class="path3"></span>
                     </i>
                 </a>

             </td>

             <td class="text-center">
                 <i class="ki-duotone ki-trash fs-2qx text-danger">
                     <span class="path1"></span>
                     <span class="path2"></span>
                     <span class="path3"></span>
                     <span class="path4"></span>
                     <span class="path5"></span>
                 </i>

                 <i class="ki-duotone ki-message-edit fs-2qx text-success">
                     <span class="path1"></span>
                     <span class="path2"></span>
                 </i>
             </td>
         </tr>

     </tbody>
 </table>
 <!--end::Table-->

 <div class="row">
     <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
     <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
         <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
             <ul class="pagination">
                 <li class="paginate_button page-item previous disabled" id="kt_table_users_previous"><a href="#"
                         aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link"><i
                             class="previous"></i></a></li>
                 <li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_users"
                         data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                 <li class="paginate_button page-item next disabled" id="kt_table_users_next"><a href="#"
                         aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link"><i
                             class="next"></i></a></li>
             </ul>
         </div>
     </div>
 </div>
