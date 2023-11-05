<!--begin::Card-->
<div class="card">
    <div class="report">

    </div>
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <button type="button" class="btn btn-light-primary btn-add" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_app">
                    <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
            </div>

            @include('user.shift.modal_add')
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body py-4 table-loading">
        <!--begin::Table-->
        <table class="table align-middle table-bordered fs-6 gy-5" id="kt_table_area">

            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-140px">Mã</th>
                    <th class="">Tên ca</th>
                    <th class="w-100px text-center">Bắt đầu</th>
                    <th class="w-100px text-center">Kết thúc</th>
                    <th class="w-120px text-center">Tiền lương</th>
                    <th class=" text-center w-250px">Mô tả</th>
                    <th class="w-125px text-center">Trạng thái</th>
                    <th class="text-end w-90px text-center">#</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold" id="load-table">
                <tr>
                    <td colspan="8  " class="text-center no-data">
                        Không tìm thấy dữ liệu!
                    </td>
                </tr>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
