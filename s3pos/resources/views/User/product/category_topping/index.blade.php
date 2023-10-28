@extends('user.layout')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="user/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
@endsection
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <h6 class="breadcrumb-item text-white opacity-75">
                        Thực đơn
                    </h6>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <h6 class="breadcrumb-item text-white opacity-75">Danh mục topping </h6>
                    <!--end::Item-->


                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">


                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Card-->
                        <div class="card">
                            <div class="report">

                            </div>
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="text" data-kt-user-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-13" placeholder="Tìm kiếm " />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-light-primary me-3"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-filter fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Lọc</button>

                                        <!--end::Filter-->

                                        <!--begin::Add user-->
                                        <button type="button" class="btn btn-primary add_category">
                                            <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
                                        <!--end::Add user-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::Group actions-->
                                    <div class="d-flex justify-content-end align-items-center d-none"
                                        data-kt-user-table-toolbar="selected">
                                        <div class="fw-bold me-5">
                                            <span class="me-2" data-kt-user-table-select="selected_count"></span> Đã
                                            chọn
                                        </div>
                                        <button type="button" class="btn btn-danger"
                                            data-kt-user-table-select="delete_selected">Xóa</button>
                                    </div>
                                    <!--end::Group actions-->

                                    @include('user.product.category_topping.modal_add')
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class=" card-body py-4 px-8">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                         
                                            <th class="min-w-325px">Tên topping</th>
                                            <th class="min-w-125px">Mã topping</th>
                                            <th class="min-w-150px">Mô tả</th>
                                            <th class="w-100px text-center">Trạng thái</th>
                                            <th class="text-center min-w-90px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold category_topping_table"  >

                                    </tbody>
                                </table>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Container-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->





    <!--end::Modals-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            loadData();


            function loadData() {
                $.get("{{ route('category_topping.table') }}", function(res) {
                    $('.category_topping_table').html(res);
                })
            }


            $('.add_category').click(function(e) {
                e.preventDefault();
                $('#modal_add_category_topping').trigger('reset');
                $('#modal_add_category_topping').modal('show');
            })
            $('.btn-close').click(function(e) {
                e.preventDefault();
                $('#modal_add_category_topping').trigger('reset');
                $('#modal_add_category_topping').modal('hide');
            })
            $('.btn-cancle').click(function(e) {
                e.preventDefault();
                $('#modal_add_category_topping').trigger('reset');
                $('#modal_add_category_topping').modal('hide');
            })
        })
    </script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src=""></script>
    <script src="user/assets/js/custom/apps/user-management/users/list/table.js"></script>
    <script src="user/assets/js/custom/apps/user-management/users/list/export-users.js"></script>
    <script src="user/assets/js/custom/apps/user-management/users/list/add.js"></script>
    <script src="user/assets/js/widgets.bundle.js"></script>
    <script src="user/assets/js/custom/widgets.js"></script>
    <script src="user/assets/js/custom/apps/chat/chat.js"></script>
    <script src="user/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="user/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="user/assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
@endsection
