@extends('user.layout')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <h4 class="breadcrumb-item text-white opacity-75">
                        <a href=".#" class="text-white text-hover-primary">Nhân viên</a>
                    </h4>
                    <h4 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h4>
                    <h4 class="breadcrumb-item text-white opacity-75">Quản lý nhân viên</h4>
                </ul>
            </div>
        </div>

    </div>



    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">

                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fw-semibold mb-n2">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 staffs_list active" data-bs-toggle="tab"
                                        href="#staff_list">Danh sách nhân viên</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 work_schedule" data-bs-toggle="tab"
                                        href="#work_schedule">Thời khóa biểu nhân viên</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 shift_list" data-bs-toggle="tab"
                                        href="#shift_list">Danh sách ca làm việc</a>
                                </li>
                                <!--end:::Tab item-->
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="staff_list" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Card Staff-->
                                        <div class="card staff_list">
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
                                                                class="form-control form-control-solid w-250px ps-13"
                                                                placeholder="Tìm kiếm " />
                                                        </div>
                                                        <!--end::Search-->
                                                    </div>
                                                    <!--begin::Card title-->
                                                    <!--begin::Card toolbar-->
                                                    <div class="card-toolbar">
                                                        <!--begin::Toolbar-->
                                                        <div class="d-flex justify-content-end"
                                                            data-kt-user-table-toolbar="base">
                                                            <!--begin::Filter-->
                                                            <button type="button" class="btn btn-light-primary me-3"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                <i class="ki-duotone ki-filter fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Lọc</button>

                                                            <!--end::Filter-->

                                                            <!--begin::Add user-->
                                                            <button type="button" class="btn btn-primary add_staff">
                                                                <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
                                                            <!--end::Add user-->
                                                        </div>
                                                        <!--end::Toolbar-->
                                                        <!--begin::Group actions-->
                                                        <div class="d-flex justify-content-end align-items-center d-none"
                                                            data-kt-user-table-toolbar="selected">
                                                            <div class="fw-bold me-5">
                                                                <span class="me-2"
                                                                    data-kt-user-table-select="selected_count"></span> Đã
                                                                chọn
                                                            </div>
                                                            <button type="button" class="btn btn-danger"
                                                                data-kt-user-table-select="delete_selected">Xóa</button>
                                                        </div>
                                                        <!--end::Group actions-->


                                                    </div>
                                                    <!--end::Card toolbar-->
                                                </div>
                                                <!--end::Card header-->

                                                <!--begin::Card body-->
                                                <div class="py-4 px-6">
                                                    <table
                                                        class="table staff_list_content align-middle table-row-dashed fs-6 gy-5"
                                                        id="kt_table_staff">

                                                    </table>
                                                </div>
                                                <!--end::Card body-->

                                                {{-- add modal --}}
                                                @include('user.staff.staff_modal')
                                            </div>

                                        </div>
                                        <!--end::Card-->
                                    </div>
                                </div>

                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="work_schedule" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Card-->
                                        <div class="card">
                                            <!--begin::Card header-->
                                            @include('user.card_header')
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="work_schedule_content py-4">

                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="shift_list" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Card-->
                                        <div class="card staff_list">
                                            <div class="card">

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
                                                                class="form-control form-control-solid w-250px ps-13"
                                                                placeholder="Tìm kiếm " />
                                                        </div>
                                                        <!--end::Search-->
                                                    </div>
                                                    <!--begin::Card title-->
                                                    <!--begin::Card toolbar-->
                                                    <div class="card-toolbar">
                                                        <!--begin::Toolbar-->
                                                        <div class="d-flex justify-content-end"
                                                            data-kt-user-table-toolbar="base">
                                                            <!--begin::Filter-->
                                                            <button type="button" class="btn btn-light-primary me-3"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                <i class="ki-duotone ki-filter fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>Lọc</button>

                                                            <!--end::Filter-->

                                                            <!--begin::Add user-->
                                                            <button type="button" class="btn btn-primary add_shift">
                                                                <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
                                                            <!--end::Add user-->
                                                        </div>
                                                    </div>
                                                    <!--end::Card toolbar-->
                                                </div>
                                                <!--end::Card header-->

                                                <!--begin::Card body-->
                                                <div class="py-4 px-6">
                                                    <table
                                                        class="table shift_list_content align-middle table-row-dashed fs-6 gy-5"
                                                        id="kt_table_shift">

                                                    </table>
                                                </div>
                                                <!--end::Card body-->

                                                {{-- add modal --}}
                                                @include('user.staff.shift.modal_add')
                                            </div>

                                        </div>
                                        <!--end::Card-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //start load table staff
            loadStaffTable();
            $('#kt_table_staff').DataTable();

            function loadStaffTable() {
                $.get("{{ route('staff.table') }}", function(res) {
                    $('.staff_list_content').html(res);

                    loadStaffReport();
                })
            }

            function loadStaffReport() {
                $.get("{{ route('staff.report') }}", function(res) {
                    $('.report').html(res);
                })
            }

            function loadShift() {
                $.get("{{ route('staff.shift_table') }}", function(res) {
                    $('.shift_list_content').html(res);
                })
            }
            $('.add_staff').on('click', function(e) {
                e.preventDefault();
                $('#modal_add_staff').trigger('reset')
                $('#modal_add_staff').modal('show')
            })

            $('.shift_list').click(function(e) {
                e.preventDefault();
                alert(1)
                loadShift();
            })

            //end loadtable staff

            //checked cấp tài khoản
            $(document).on('click', '#account_staff', function() {

                if ($('#account_staff').is(':checked')) {
                    $('.account_staff').removeAttr('hidden')
                } else {
                    $('.account_staff').attr('hidden', true)
                }


            })

            $("#start_modal_add_schedule_datepicker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
            $("#end_modal_add_schedule_datepicker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
            $('.add_shift').on('click', function(e) {
                e.preventDefault();
                $('#modal_add_shift').trigger('reset')
                $('#modal_add_shift').modal('show')
            })

        })
    </script>

    <script src="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>


    <!--end::Custom Javascript-->
@endsection
