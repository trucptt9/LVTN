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
                        <a href=".#" class="text-white text-hover-primary">Nhân viên</a>
                    </h6>
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <h6 class="breadcrumb-item text-white opacity-75">Quản lý nhân viên</h6>
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <h6 class="breadcrumb-item text-white opacity-75">Chi tiết nhân viên</h6>
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
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->
                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="user/assets/media/avatars/300-6.jpg" alt="image" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">Tên nv</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">Mã nhân viên</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->

                            </div>
                            <!--end::User Info-->
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_user_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_user_view_details">Chi tiết
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-duotone ki-down fs-3"></i>
                                    </span>
                                </div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_update_details">Cập nhật</a>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Số diện thoại</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">info@keenthemes.com</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Địa chỉ</div>
                                    <div class="text-gray-600">101 Collin Street,
                                        <br />Melbourne 3000 VIC
                                        <br />Australia
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Chức vụ</div>
                                    <div class="text-gray-600">Phòng ban</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Last Login</div>
                                    <div class="text-gray-600">19 Aug 2023, 6:43 am</div>
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
                            <a class="nav-link text-active-primary pb-4 active fs-6" data-bs-toggle="tab"
                                href="#info_account">Thông tin tài khoản</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 permision" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#permission">Phân quyền</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6" data-bs-toggle="tab" href="#shift">Ca làm
                                việc</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6" data-bs-toggle="tab" href="#log">Log</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="info_account" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Thông tin đăng nhập</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <div class="d-flex">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="required">Tên đăng
                                                nhập</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                            name="username" placeholder="Username" value="user1_ttp" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="d-flex mt-3">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                            <span class="required">Mật khẩu</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                            name="pasword" placeholder="Username" value="123ttp" />
                                        <!--end::Input-->
                                    </div>

                                    <button class="btn btn-success mt-3">Cập nhật</button>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="permission" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-sm btn-flex btn-primary">
                                            Cập nhật</button>
                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-bordered gy-5 permition_table"
                                            id="kt_table_permison">
                                           
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="shift" role="tabpanel">
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
                                                                    <!--begin::Header-->
                                                                    <div class="px-7 py-5">
                                                                        <div class="fs-5 text-dark fw-bold">Filter Options
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Header-->
                                                                    <!--begin::Separator-->
                                                                    <div class="separator border-gray-200"></div>
                                                                    <!--end::Separator-->
                                                                    <!--begin::Content-->
                                                                    <div class="px-7 py-5"
                                                                        data-kt-user-table-filter="form">
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <label
                                                                                class="form-label fs-6 fw-semibold">Role:</label>
                                                                            <select
                                                                                class="form-select form-select-solid fw-bold"
                                                                                data-kt-select2="true"
                                                                                data-placeholder="Select option"
                                                                                data-allow-clear="true"
                                                                                data-kt-user-table-filter="role"
                                                                                data-hide-search="true">
                                                                                <option></option>
                                                                                <option value="Administrator">Administrator
                                                                                </option>
                                                                                <option value="Analyst">Analyst</option>
                                                                                <option value="Developer">Developer
                                                                                </option>
                                                                                <option value="Support">Support</option>
                                                                                <option value="Trial">Trial</option>
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <label class="form-label fs-6 fw-semibold">Two
                                                                                Step
                                                                                Verification:</label>
                                                                            <select
                                                                                class="form-select form-select-solid fw-bold"
                                                                                data-kt-select2="true"
                                                                                data-placeholder="Select option"
                                                                                data-allow-clear="true"
                                                                                data-kt-user-table-filter="two-step"
                                                                                data-hide-search="true">
                                                                                <option></option>
                                                                                <option value="Enabled">Enabled</option>
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Actions-->
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="reset"
                                                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                                                data-kt-menu-dismiss="true"
                                                                                data-kt-user-table-filter="reset">Reset</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary fw-semibold px-6"
                                                                                data-kt-menu-dismiss="true"
                                                                                data-kt-user-table-filter="filter">Apply</button>
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                    </div>
                                                                    <!--end::Content-->
                                                                </div>
                                                                <!--end::Menu 1-->
                                                                <!--end::Filter-->

                                                                <!--begin::Add user-->
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_create_app">
                                                                    <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
                                                                <!--end::Add user-->
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

                                                                    <th class="min-w-105px">Tên ca</th>
                                                                    <th class="min-w-105px text-center">Thời gian làm việc
                                                                    </th>
                                                                    <th class="min-w-105px">Ngày</th>

                                                                    <th class="min-w-150px text-center">Ghi chú</th>
                                                                    <th class="min-w-50px text-center">Trạng thái</th>
                                                                    <th class="text-end min-w-70px text-center">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <tr>

                                                                    <td class="d-flex align-items-center">
                                                                        Ca 1
                                                                    </td>
                                                                    <td class="text-center">7:00 - 12:00</td>
                                                                    <td>
                                                                        2/10/2023
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="text-center">


                                                                    </td>
                                                                    <td class="text-center">
                                                                        <i class="ki-duotone ki-trash fs-2qx text-danger">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                            <span class="path4"></span>
                                                                            <span class="path5"></span>
                                                                        </i>

                                                                        <i
                                                                            class="ki-duotone ki-message-edit fs-2qx text-success">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
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
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="log" role="tabpanel">
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
            <!--begin::Modals-->

            <!--begin::Modal - Update user details-->
            <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form" action="#" id="kt_modal_update_user_form">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_update_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Cập nhật thông tin</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_update_user_header"
                                    data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                    <!--begin::User toggle-->
                                    <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                                        href="#kt_modal_update_user_user_info" role="button" aria-expanded="false"
                                        aria-controls="kt_modal_update_user_user_info">Thông tin nhân viên
                                        <span class="ms-2 rotate-180">
                                            <i class="ki-duotone ki-down fs-3"></i>
                                        </span>
                                    </div>
                                    <!--end::User toggle-->
                                    <!--begin::User form-->
                                    <div id="kt_modal_update_user_user_info" class="collapse show">
                                        <!--begin::Input group-->
                                        <div class="mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span> Ảnh đại diện</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Allowed file types: png, jpg, jpeg.">
                                                    <i class="ki-duotone ki-information fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Image input wrapper-->
                                            <div class="mt-1">
                                                <!--begin::Image placeholder-->
                                                <style>
                                                    .image-input-placeholder {
                                                        background-image: url('user/assets/media/svg/avatars/blank.svg');
                                                    }

                                                    [data-bs-theme="dark"] .image-input-placeholder {
                                                        background-image: url('user/assets/media/svg/avatars/blank-dark.svg');
                                                    }
                                                </style>
                                                <!--end::Image placeholder-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline image-input-placeholder"
                                                    data-kt-image-input="true">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(user/assets/media/avatars/300-6.jpg">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Edit-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="ki-duotone ki-pencil fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="ki-duotone ki-cross fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="ki-duotone ki-cross fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                            </div>
                                            <!--end::Image input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2 required">Họ & tên</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="name" value="Nguyễn Thị Lan" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Mã NV</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Email address must be active">
                                                    <i class="ki-duotone ki-information fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="code" value="NV3424" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <label class="fs-6 fw-semibold mb-2 required">Số điện thoại</label>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Số điện thoại">
                                                    <i class="ki-duotone ki-information fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="phone" value="0878676657" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Địa chỉ</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="address" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2 required">Chức vụ</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="position" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2 required">Phòng ban</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="department_id" id=""
                                                class="form-select form-select-solid" data-control="select2"
                                                data-hide-search="true">
                                                <option value="1">Chọn phòng
                                                    ban
                                                </option>
                                                <option value="">Ẩn</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::User form-->


                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" class="btn btn-light me-3"
                                    data-kt-users-modal-action="cancel">Hủy</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Cập nhật</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - Update user details-->


            <!--end::Modals-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
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

            $("#kt_datepicker_1").flatpickr();
            
            $('.permision').click(function(e){
                $.get("{{ route('staff.table_permision') }}", function(res){
                    $('.permition_table').html(res)
                })
                $('#kt_table_permison').DataTable();
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

    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('user/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/view.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/update-details.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/add-schedule.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/add-task.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/update-email.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/update-password.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/update-role.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/add-auth-app.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/user-management/users/view/add-one-time-password.js')}}"></script>
    <script src="{{asset('user/assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('user/assets/js/custom/utilities/modals/users-search.js')}}"></script>


    <!--end::Custom Javascript-->
@endsection
