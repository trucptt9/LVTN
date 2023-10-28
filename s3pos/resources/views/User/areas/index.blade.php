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
                    <h4 class="breadcrumb-item text-white opacity-75">
                        <a href=".#" class="text-white text-hover-primary">Cửa hàng</a>
                    </h4>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <h4 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h4>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <h4 class="breadcrumb-item text-white opacity-75">Quản lý khu vực bàn</h4>
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
                        @include('user.areas.content')
                    </div>
                </div>
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
            loadReport();

            function loadData() {
                $.get("{{ route('area.table') }}", function(res) {
                    $('.area_table').html(res);
                    $("#kt_table_area").DataTable();
                })
            }
            
            function loadReport() {
                $.get("{{ route('area.report') }}", function(res) {
                    $('.report').html(res);
                })
            }
            $('.btn-add').click(function(e) {
                e.preventDefault();
                $('#modal_add_area').trigger('reset');
                $('#modal_add_area').modal('show');
            })
            $('.btn-close').click(function(e) {
                e.preventDefault();
                $('#modal_add_area').trigger('reset');
                $('#modal_add_area').modal('hide');
            })
            $('.btn-cancle').click(function(e) {
                e.preventDefault();
                $('#modal_add_area').trigger('reset');
                $('#modal_add_area').modal('hide');
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
    {{-- <script src="user/assets/js/custom/apps/chat/chat.js"></script> --}}
    <script src="user/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="user/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="user/assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
@endsection
