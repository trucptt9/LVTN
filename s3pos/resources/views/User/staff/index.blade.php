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
                                    <a class="nav-link text-active-primary pb-4 active work_schedule" data-bs-toggle="tab"
                                        href="#work_schedule">Thời khóa biểu nhân viên</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 staffs_list" data-bs-toggle="tab"
                                        href="#staff_list">Danh sách nhân viên</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 schedule_list" data-bs-toggle="tab"
                                        href="#schedule_list">Danh sách ca làm việc</a>
                                </li>
                                <!--end:::Tab item-->
                            </ul>

                            <div class="tab-content">


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

                                <div class="tab-pane fade" id="staff_list" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Card-->
                                        <div class="card staff_list">

                                        </div>
                                        <!--end::Card-->
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="schedule_list" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Card-->
                                        <div class="card">

                                            <!--begin::Card body-->
                                            <div class="schedule_list_content py-4">

                                            </div>
                                            <!--end::Card body-->
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


            function loadStaffList() {
                $.get("{{ route('staffs.list') }}", function(res) {
                    $('.staff_list').html(res);
                })
            }

            function loadScheduleList() {
                $.get("{{ route('staffs.schedule') }}", function(res) {
                    $('.schedule_list_content').html(res);
                })
            }

            $('.staffs_list').click(function(e) {
                e.preventDefault();
                loadStaffList();
            })
            $('.schedule_list').click(function(e) {
                e.preventDefault();
                loadScheduleList();
            })
            //checked cấp tài khoản
            $(document).on('click', '#account_staff', function() {

                if ($('#account_staff').is(':checked')) {
                    $('.account_staff').removeAttr('hidden')
                } else {
                    $('.account_staff').attr('hidden', true)
                }


            })

        })
    </script>

    <script src="{{asset('user/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('user/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('user/assets/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script>
    <script src="{{asset('user/assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/utilities/modals/users-search.js')}}"></script>


    <!--end::Custom Javascript-->
@endsection
