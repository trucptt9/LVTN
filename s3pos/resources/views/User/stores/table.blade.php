 <!--begin::Table-->
 <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div
                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                        data-kt-check-target="#kt_table_users .form-check-input"
                        value="1" />
                </div>
            </th>
            <th class="min-w-125px">Tên cửa hàng</th>
            <th class="min-w-125px">Mã cửa hàng</th>
            <th class="min-w-125px">Số điện thoại</th>
            <th class="min-w-150px">Địa chỉ</th>
            <th class="w-100px text-center">Trạng thái</th>
            <th class="w-70px text-center">#</th>
            <th class="text-center w-90px">#</th>
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
            <td class="text-center">

                <i class="ki-duotone ki-check-square fs-2x text-success">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
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

     

    </tbody>
</table>
<!--end::Table-->