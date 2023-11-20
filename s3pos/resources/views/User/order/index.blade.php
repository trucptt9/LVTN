@extends('User.layout.main')
<<<<<<< HEAD
@section('style')
@endsection
=======
>>>>>>> be89e0c5e296b39750352c4d6e3962191a2e67a7
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Quản lý đơn hàng</h1>
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
                            Thống kê
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
            </div>
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <form action="" id="form-filter">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-order-filter="search"
                                    class="form-control w-250px ps-12" placeholder="Nhập nội dung ..." />
                            </div>
<<<<<<< HEAD
                            <!--end::Search-->
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Flatpickr-->
                            <!--end::Flatpickr-->
                            <div class="w-200px ">
                                <!--begin::Select2-->
                                <select class="form-select" data-control="select2" data-hide-search="true" name="status">
                                    <option value="" selected>-- Chọn trạng thái --</option>
                                    @foreach ($data['status'] as $key => $item)
                                        <option value="{{ $key }}"> {{ $item[0] }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>
                            <div class="btn-group" role="group">
                                <button onclick="filterTable()" type="button" data-bs-toggle="tooltip"
                                    title="Tải lại dữ liệu"
                                    class="btn btn-sm btn-outline btn-outline-dashed btn-outline-primary btn-active-primary btn-reload">
                                    <span class="indicator-label">
                                        <i class="ki-outline ki-arrows-circle fs-2"></i>
                                    </span>
                                    <span class="indicator-progress">Đang tải ...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
=======
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
                                            class="form-control w-250px ps-13" placeholder="Tìm kiếm " />
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
                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Separator-->
                                            <!--begin::Content-->
                                            <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <label class="form-label fs-6 fw-semibold">Nhân viên:</label>
                                                    <select class="form-select fw-bold" data-kt-select2="true"
                                                        data-placeholder="Chọn nhân viên" data-allow-clear="true"
                                                        data-kt-user-table-filter="role" data-hide-search="true">
                                                        <option></option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Analyst">Analyst</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Support">Support</option>
                                                        <option value="Trial">Trial</option>
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <label class="form-label fs-6 fw-semibold">Ngày:</label>
                                                    <select class="form-select fw-bold" data-kt-select2="true"
                                                        data-placeholder="Select option" data-allow-clear="true"
                                                        data-kt-user-table-filter="two-step" data-hide-search="true">
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
                                                    <button type="submit" class="btn btn-primary fw-semibold px-6"
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
                                        <button type="button" class="btn btn-primary btn-add" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_user">
                                            <i class="ki-duotone ki-plus fs-2"></i>Thêm</button>
                                        <!--end::Add user-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::Group actions-->
                                    <div class="d-flex justify-content-end align-items-center d-none"
                                        data-kt-user-table-toolbar="selected">
                                        <div class="fw-bold me-5">
                                            <span class="me-2" data-kt-user-table-select="selected_count"></span> Đã chọn
                                        </div>
                                        <button type="button" class="btn btn-danger"
                                            data-kt-user-table-select="delete_selected">Xóa</button>
                                    </div>
                                    <!--end::Group actions-->
                                    <!--begin::Modal - Adjust Balance-->
                                    <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">

                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                    <!--begin::Form-->
                                                    <form id="kt_modal_export_users_form" class="form" action="#">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mb-2">Select
                                                                Roles:</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="role" data-control="select2"
                                                                data-placeholder="Select a role" data-hide-search="true"
                                                                class="form-select fw-bold">
                                                                <option></option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Analyst">Analyst</option>
                                                                <option value="Developer">Developer</option>
                                                                <option value="Support">Support</option>
                                                                <option value="Trial">Trial</option>
                                                            </select>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-10">
                                                            <!--begin::Label-->
                                                            <label class="required fs-6 fw-semibold form-label mb-2">Select
                                                                Export Format:</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <select name="format" data-control="select2"
                                                                data-placeholder="Select a format" data-hide-search="true"
                                                                class="form-select fw-bold">
                                                                <option></option>
                                                                <option value="excel">Excel</option>
                                                                <option value="pdf">PDF</option>
                                                                <option value="cvs">CVS</option>
                                                                <option value="zip">ZIP</option>
                                                            </select>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Actions-->
                                                        <div class="text-center">
                                                            <button type="reset" class="btn btn-light me-3"
                                                                data-kt-users-modal-action="cancel">Discard</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                data-kt-users-modal-action="submit">
                                                                <span class="indicator-label">Submit</span>
                                                                <span class="indicator-progress">Please wait...
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
                                    @include('user.order.modal_add')
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                <table class="table order_table align-middle table-row-dashed fs-6 gy-5"
                                    id="kt_table_order">

                                </table>
>>>>>>> be89e0c5e296b39750352c4d6e3962191a2e67a7
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 table-loading">
                    <!--begin::Table-->
                    <table class="table align-middle table-bordered fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-150px">Mã</th>
                                <th class="">Nhân viên</th>
                                <th class="text-center w-250px">Giảm giá</th>
                                <th class="text-center w-250px">Tổng tiền</th>
                                <th class="text-center w-150px">Trạng thái</th>
                                <th class="text-center w-100px">#</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600" id="load-table">
                            <tr>
                                <td colspan="6" class="text-center no-data">
                                    Không tìm thấy dữ liệu!
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
<<<<<<< HEAD
=======
    <!--end::Root-->
>>>>>>> be89e0c5e296b39750352c4d6e3962191a2e67a7
@endsection
@section('script')
    <script>
        const routeList = "{{ route('order.table') }}";
        filterTable();

<<<<<<< HEAD
        function filterTable() {
            loadTable(routeList);
        };

        function confirmDelete(id) {
            deleteData(id, "{{ route('order.delete') }}");
        }
=======


            loadData();
            loadReport();

            function loadData() {
                $.get("{{ route('order.table') }}", function(res) {
                    // alert(1)
                    $('.order_table').html(res);
                    $("#kt_table_order").DataTable();
                })
            }

            function loadReport() {
                $.get("{{ route('order.report') }}", function(res) {
                    $('.report').html(res);
                })
            }
            $('.btn-add').click(function(e) {
                e.preventDefault();
                $('#modal_add_order').trigger('reset');
                $('#modal_add_order').modal('show');
            })
            $('.btn-close').click(function(e) {
                e.preventDefault();
                $('#modal_add_order').trigger('reset');
                $('#modal_add_order').modal('hide');
            })
            $('.btn-cancle').click(function(e) {
                e.preventDefault();
                $('#modal_add_order').trigger('reset');
                $('#modal_add_order').modal('hide');
            })
        })
>>>>>>> be89e0c5e296b39750352c4d6e3962191a2e67a7
    </script>
@endsection
