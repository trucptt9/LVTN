 <!--begin::Table-->



 <thead>
     <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
         <th class="w-10px pe-2">
             <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                 <input class="form-check-input" type="checkbox" data-kt-check="true"
                     data-kt-check-target="#kt_table_users .form-check-input" value="1" />
             </div>
         </th>
         <th class="min-w-100px">Mã đơn hàng</th>
         <th class="min-w-70px">Ngày tạo đơn</th>
         <th class="min-w-100px">Khách hàng</th>
         <th class="min-w-125px">Tổng tiền</th>   
         <th class="min-w-100px">Nhân viên</th>
        
         <th class="min-w-100px text-center">Trạng thái</th>
         <th class="min-w-70px text-center">#</th>
         <th class="text-center min-w-90px">#</th>
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
             DH12443
         </td>
         <td>Bàn 1</td>
         <td> Lê Thị B</td>
         <td>23.0000</td>
         <td>
             18/10/2023
         </td>
       
         <td class="text-center">

             <div class="badge badge-light-success">Đã thanh toán</div>
         </td>
         <td class="text-center">
             <a href="{{ route('store.detail') }}">
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
     <tr>
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
            </div>
        </td>
        <td class="d-flex align-items-center">
            DH1244
        </td>
        <td>Bàn 2</td>
        <td> Lê Thị B</td>
        <td>23.0000</td>
        <td>
            19/10/2023
        </td>
      
        <td class="text-center">

            <div class="badge badge-light-success">Đã thanh toán</div>
        </td>
        <td class="text-center">
            <a href="{{ route('order.detail') }}">
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

 <!--end::Table-->
