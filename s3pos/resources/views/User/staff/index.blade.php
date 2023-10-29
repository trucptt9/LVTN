@extends('User.layout.main')
@section('style')
    <link href="user/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Quản lý nhân viên</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            <a href="{{ route('index') }}" class="text-white text-hover-primary">
                                Trang chủ
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            Cửa hàng
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <button class="btn btn-primary h-40px">
                    Tạo mới
                </button>
            </div>
            @include('User.staff.report')
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-ecommerce-order-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Search Order" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <!--begin::Flatpickr-->
                        <div class="w-250px">
                            <input class="form-control form-control-solid rounded" placeholder="Pick date range"
                                id="kt_ecommerce_sales_flatpickr" />
                        </div>
                        <!--end::Flatpickr-->
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Completed">Completed</option>
                                <option value="Denied">Denied</option>
                                <option value="Expired">Expired</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_sales_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-100px">Order ID</th>
                                <th class="min-w-175px">Customer</th>
                                <th class="text-end min-w-70px">Status</th>
                                <th class="text-end min-w-100px">Total</th>
                                <th class="text-end min-w-100px">Date Added</th>
                                <th class="text-end min-w-100px">Date Modified</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13359</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-5.jpg" alt="Sean Bean"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$455.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-13">
                                    <span class="fw-bold">13/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-18">
                                    <span class="fw-bold">18/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13360</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$179.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-10">
                                    <span class="fw-bold">10/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-17">
                                    <span class="fw-bold">17/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13361</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-25.jpg" alt="Brian Cox"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Brian Cox</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$117.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-12">
                                    <span class="fw-bold">12/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-16">
                                    <span class="fw-bold">16/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13362</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-25.jpg" alt="Brian Cox"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Brian Cox</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$490.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-13">
                                    <span class="fw-bold">13/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-15">
                                    <span class="fw-bold">15/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13363</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-5.jpg" alt="Sean Bean"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$301.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-13">
                                    <span class="fw-bold">13/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-14">
                                    <span class="fw-bold">14/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13364</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label fs-3 bg-light-warning text-warning">C</div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Mikaela Collins</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$66.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-07">
                                    <span class="fw-bold">07/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-13">
                                    <span class="fw-bold">13/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13365</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-5.jpg" alt="Sean Bean"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$197.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-09">
                                    <span class="fw-bold">09/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-12">
                                    <span class="fw-bold">12/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13366</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-12.jpg" alt="Ana Crown"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Processing">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-primary">Processing</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$35.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-07">
                                    <span class="fw-bold">07/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-11">
                                    <span class="fw-bold">11/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13367</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-21.jpg" alt="Ethan Wilder"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$408.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-06">
                                    <span class="fw-bold">06/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-10">
                                    <span class="fw-bold">10/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13368</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-9.jpg" alt="Francis Mitcham"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$173.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-03">
                                    <span class="fw-bold">03/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-09">
                                    <span class="fw-bold">09/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13369</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="user/assets/media/avatars/300-12.jpg" alt="Ana Crown"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Refunded">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-info">Refunded</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$392.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-03">
                                    <span class="fw-bold">03/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-08">
                                    <span class="fw-bold">08/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td data-kt-ecommerce-order-filter="order_id">
                                    <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                        class="text-gray-800 text-hover-primary fw-bold">13370</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo2/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label fs-3 bg-light-danger text-danger">E</div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="../../demo2/dist/apps/user-management/users/view.html"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end pe-0" data-order="Completed">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Completed</div>
                                    <!--end::Badges-->
                                </td>
                                <td class="text-end pe-0">
                                    <span class="fw-bold">$35.00</span>
                                </td>
                                <td class="text-end" data-order="2023-07-02">
                                    <span class="fw-bold">02/07/2023</span>
                                </td>
                                <td class="text-end" data-order="2023-07-07">
                                    <span class="fw-bold">07/07/2023</span>
                                </td>
                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/details.html"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo2/dist/apps/ecommerce/sales/edit-order.html"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <script src="user/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="user/assets/js/custom/apps/ecommerce/sales/listing.js"></script>
    <script src="user/assets/js/widgets.bundle.js"></script>
    <script src="user/assets/js/custom/widgets.js"></script>
@endsection
