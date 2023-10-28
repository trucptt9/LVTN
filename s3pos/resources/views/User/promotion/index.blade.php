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
                        <a href=".#" class="text-white text-hover-primary">Chương trình khuyến mãi</a>
                    </h4>

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




                            <div class="tab-pane fade show active" id="customer_list" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Card Staff-->
                                    <div class="card customer_list">
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
                                                        <button type="button" class="btn btn-primary customer_add">
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
                                            <div class=" py-4">
                                                <table
                                                    class="table promotion_list_content align-middle table-row-dashed fs-6 gy-5"
                                                    id="kt_table_promotion">

                                                </table>
                                            </div>
                                            <!--end::Card body-->

                                            {{-- add modal --}}
                                            @include('user.promotion.modal_add')
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#promotion_day_start").flatpickr({
                dateFormat: 'd/m/Y'
            });
            $("#promotion_day_end").flatpickr({
                dateFormat: 'd/m/Y'
            });

            //start load table staff
            loadCustomerTable();

            function loadCustomerTable() {
                $.get("{{ route('promotion.table') }}", function(res) {
                    $('.promotion_list_content').html(res);
                    $('#kt_table_promotion').DataTable();

                })
            }

            $('.customer_add').on('click', function(e) {
                e.preventDefault();

                $('#modal_add_customer').trigger('reset')
                $('#modal_add_customer').modal('show')
            })


            //end loadtable staff




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
