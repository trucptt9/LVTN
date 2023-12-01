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
                <button type="button" class="btn btn-light-primary btn-add">
                    <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
            </div>

            @include('User.customer_group.modal_add')

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
                    <th class="">Tên nhóm </th>
                    <th class=" text-center w-450px">Mô tả</th>
                    <th class="w-125px text-center">Trạng thái</th>
                    <th class="w-100px text-center">#</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold" id="load-table">
                <tr>
                    <td colspan="5  " class="text-center no-data">
                        Không tìm thấy dữ liệu!
                    </td>
                </tr>
            </tbody>
        </table>


        <!--end::Table-->
    </div>


    <!--end::Card body-->
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <form action="{{ route('customer_group.update') }}" id="form-update" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered mw-600px">

            <!--begin::Modal content-->
            <div class="modal-content">

                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Thêm nhóm khách hàng</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary close-btn" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                        id="kt_modal_create_app_stepper">

                        <div class="flex-row-fluid py-lg-5 ">

                            <div class="d-flex flex-column scroll-y px-5 px-lg-10 content-update"
                                id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true"
                                data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">



                            </div>
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3 close-btn2">Hủy</button>
                                <button type="submit" class="btn btn-primary btn-create">
                                    <span class="indicator-label">Cập nhật </span>

                                </button>
                            </div>


                        </div>
                    </div>
                    <!--end::Content-->
                </div>

            </div>
            <!--end::Modal body-->
        </div>

    </form>
    <!--end::Modal content-->
</div>
