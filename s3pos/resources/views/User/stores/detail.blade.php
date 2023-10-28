@extends('user.layout')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <h6 class="breadcrumb-item text-white opacity-75">
                        <a href=".#" class="text-white text-hover-primary">Cửa hàng</a>
                    </h6>
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <h6 class="breadcrumb-item text-white opacity-75">Quản lý cửa hàng</h6>
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <h6 class="breadcrumb-item text-white opacity-75">Chi tiết cửa hàng</h6>
                </ul>
            </div>
        </div>

    </div>

    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->

                            <!--end::Summary-->
                            <h3 class="fw-bold mt-5">Thông tin cửa hàng</h3>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Tên cửa hàng</div>
                                    <div class="text-gray-600">
                                        <span class="text-gray-600 text-hover-primary">Cửa hàng 1</span>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Mã cửa hàng</div>
                                    <div class="text-gray-600">CH1
                                    </div>
                                    <!--begin::Details item-->

                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active fs-6 " data-bs-toggle="tab"
                                href="#info_store">Cập nhật cửa hàng</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 areas" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#area">Khu vực bàn</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 tabletry" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#table">Bàn</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 staffs" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#staff">Nhân viên</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 orders" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#order">Đơn hàng</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->

                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active " id="info_store" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="">
                                    {{-- <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Thông tin đăng nhập</h2>
                                    </div>
                                    <!--end::Card title--> --}}
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5 mt-2">
                                    <div class="d-flex">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="required">Tên cửa hàng</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                            name="name" value="Cửa hàng 1" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="d-flex mt-3">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="">Mã cửa hàng</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                            name="code" placeholder="Username" value="CH-1" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="d-flex mt-3">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="required">Số điện thoại</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                            name="phone" value="01397344 " />
                                        <!--end::Input-->
                                    </div>
                                    <div class="d-flex mt-3">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="required">Địa chỉ</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-lg form-control-solid w-50" rows="3" name="code" value="QL-A"> Hồ chí minh</textarea>
                                        <!--end::Input-->
                                    </div>
                                    <div class="d-flex mt-3">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="">Mô tả</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-lg form-control-solid w-50" rows="3" name="code"
                                            placeholder="Username" value="QL-A"> Mô tả chi tiết</textarea>
                                        <!--end::Input-->
                                    </div>


                                    <button type="button" class="btn btn-sm btn-flex btn-primary">
                                        Cập nhật</button>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="area" role="tabpanel">
                            <!--begin::Card-->
                            @include('user.areas.content')
                            <!--end::Card-->


                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="table" role="tabpanel">
                            <!--begin::Card-->
                            @include('user.tables.content')
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="staff" role="tabpanel">
                            <!--begin::Card-->
                         @include('user.staff.content')
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="order" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="page d-flex flex-row flex-column-fluid">
                                    <!--begin::Wrapper-->
                                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">


                                        <!--begin::Container-->
                                        <div id="kt_content_container"
                                            class="d-flex flex-column-fluid align-items-start container-xxl">
                                            <!--begin::Post-->
                                            <div class="content flex-row-fluid" id="kt_content">
                                                <!--begin::Card-->
                                                <div class="card">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0 pt-6">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1">
                                                                <i
                                                                    class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
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
                                                                <!--begin::Menu 1-->
                                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                                    data-kt-menu="true">

                                                                    <!--begin::Separator-->
                                                                    <div class="separator border-gray-200"></div>
                                                                    <!--end::Separator-->
                                                                    <!--begin::Content-->
                                                                    <div class="px-7 py-5"
                                                                        data-kt-user-table-filter="form">
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <label class="form-label fs-6 fw-semibold">Theo
                                                                                ngày:</label>
                                                                            <input class="form-control"
                                                                                placeholder="Chọn ngày"
                                                                                id="kt_datepicker_1" />
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Actions-->
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="reset"
                                                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                                                data-kt-menu-dismiss="true"
                                                                                data-kt-user-table-filter="reset">Hủy</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary fw-semibold px-6"
                                                                                data-kt-menu-dismiss="true"
                                                                                data-kt-user-table-filter="filter">Áp
                                                                                dụng</button>
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                    </div>
                                                                    <!--end::Content-->
                                                                </div>
                                                                <!--end::Menu 1-->
                                                                <!--end::Filter-->


                                                            </div>
                                                            <!--end::Toolbar-->

                                                            <!--begin::Modal - Adjust Balance-->
                                                            <div class="modal fade" id="kt_modal_export_users"
                                                                tabindex="-1" aria-hidden="true">
                                                                <!--begin::Modal dialog-->
                                                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                                                    <!--begin::Modal content-->
                                                                    <div class="modal-content">

                                                                        <!--begin::Modal body-->
                                                                        <div
                                                                            class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                                            <!--begin::Form-->
                                                                            <form id="kt_modal_export_users_form"
                                                                                class="form" action="#">
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-10">
                                                                                    <!--begin::Label-->
                                                                                    <label
                                                                                        class="fs-6 fw-semibold form-label mb-2">Select
                                                                                        Roles:</label>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input-->
                                                                                    <select name="role"
                                                                                        data-control="select2"
                                                                                        data-placeholder="Select a role"
                                                                                        data-hide-search="true"
                                                                                        class="form-select form-select-solid fw-bold">
                                                                                        <option></option>
                                                                                        <option value="Administrator">
                                                                                            Administrator</option>
                                                                                        <option value="Analyst">Analyst
                                                                                        </option>
                                                                                        <option value="Developer">Developer
                                                                                        </option>
                                                                                        <option value="Support">Support
                                                                                        </option>
                                                                                        <option value="Trial">Trial
                                                                                        </option>
                                                                                    </select>
                                                                                    <!--end::Input-->
                                                                                </div>
                                                                                <!--end::Input group-->
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-10">
                                                                                    <!--begin::Label-->
                                                                                    <label
                                                                                        class="required fs-6 fw-semibold form-label mb-2">Select
                                                                                        Export Format:</label>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input-->
                                                                                    <select name="format"
                                                                                        data-control="select2"
                                                                                        data-placeholder="Select a format"
                                                                                        data-hide-search="true"
                                                                                        class="form-select form-select-solid fw-bold">
                                                                                        <option></option>
                                                                                        <option value="excel">Excel
                                                                                        </option>
                                                                                        <option value="pdf">PDF</option>
                                                                                        <option value="cvs">CVS</option>
                                                                                        <option value="zip">ZIP</option>
                                                                                    </select>
                                                                                    <!--end::Input-->
                                                                                </div>
                                                                                <!--end::Input group-->
                                                                                <!--begin::Actions-->
                                                                                <div class="text-center">
                                                                                    <button type="reset"
                                                                                        class="btn btn-light me-3"
                                                                                        data-kt-users-modal-action="cancel">Discard</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary"
                                                                                        data-kt-users-modal-action="submit">
                                                                                        <span
                                                                                            class="indicator-label">Submit</span>
                                                                                        <span
                                                                                            class="indicator-progress">Please
                                                                                            wait...
                                                                                            <span
                                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                                    </button>
                                                                                </div>
                                                                                <!--end::Actions-->
                                                                            </form>
                                                                            <!--end::Form-->
                                                                        </div>
                                                                        <!--end::Modal body-->
                                                                    </div>
                                                                    <!--end::Modal content-->
                                                                </div>
                                                                <!--end::Modal dialog-->
                                                            </div>
                                                            <!--end::Modal - New Card-->

                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body py-4">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                            id="kt_table_users">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                                                    <th class="min-w-125px">Hành động</th>
                                                                    <th class="min-w-125px">Thời gian</th>
                                                                    <th class="min-w-125px">Nội dung</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <tr>

                                                                    <td class="d-flex align-items-center">
                                                                        Thêm nhân viên
                                                                    </td>
                                                                    <td>2/10/2023 7:25:45</td>
                                                                    <td>
                                                                        Thêm nhân viên adbc
                                                                    </td>

                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
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
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->

        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            //Tab khu vực
            function getTableOfArea() {
                $.get("{{ route('area.table') }}", function(res) {
                    $('.area_table').html(res);
                    $("#kt_table_area").DataTable();    
                })
            }
            $('.areas').click(function(e) {
                getTableOfArea();
                
            })
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

            //tab bàn
            function getTableOfTable() {
                $.get("{{ route('table.table') }}", function(res) {
                    $('.tables_table').html(res);
                    $("#kt_table_table").DataTable();    
                })
            }
                $('.tabletry').click(function(e) {
                   
                    getTableOfTable();
                })
                $('.btn-add').click(function(e) {
                    e.preventDefault();
                    $('#modal_add_table').trigger('reset');
                    $('#modal_add_table').modal('show');
                })
                $('.btn-close').click(function(e) {
                    e.preventDefault();
                    $('#modal_add_table').trigger('reset');
                    $('#modal_add_table').modal('hide');
                })
                $('.btn-cancle').click(function(e) {
                    e.preventDefault();
                    $('#modal_add_table').trigger('reset');
                    $('#modal_add_table').modal('hide');
                })
            
                //tab nhan vien
                function getTableOfStaff() {
                $.get("{{ route('staff.table') }}", function(res) {
                    $('.staff_table').html(res);
                })
            }
                $('.staffs').click(function(e) {
                   
                    getTableOfStaff();
                })
                $('.btn-add').click(function(e) {
                    e.preventDefault();
                    $('#modal_add_staff').trigger('reset');
                    $('#modal_add_staff').modal('show');
                })
                $('.btn-close').click(function(e) {
                    e.preventDefault();
                    $('#modal_add_staff').trigger('reset');
                    $('#modal_add_staff').modal('hide');
                })
                $('.btn-cancle').click(function(e) {
                    e.preventDefault();
                    $('#modal_add_staff').trigger('reset');
                    $('#modal_add_staff').modal('hide');
                })
        })
    </script>

    <!--end::Vendors Javascript-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/view.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-details.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-schedule.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-task.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-email.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-password.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-role.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-auth-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-one-time-password.js') }}"></script>
    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>


    <!--end::Custom Javascript-->
@endsection
