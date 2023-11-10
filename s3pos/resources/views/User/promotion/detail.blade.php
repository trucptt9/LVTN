@extends('user.layout.main')
@section('style')
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl flex-row-fluid">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Chi tiết khuyến mãi</h1>
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
                            Khuyến mãi
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            <a href="{{ route('promotion.index') }}" class="text-white text-hover-primary">
                                Quản lý khuyến mãi
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <a class="btn  btn-primary h-40px" href="{{ route('promotion.index') }}">
                    Quay lại
                </a>
            </div>
        </div>
    </div>
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start">
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
                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <h3>Thông tin chương trình</h3>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Tên chương trình</div>
                                    <div class="text-gray-600">
                                        {{ $promotion->subject }}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Trạng thái</div>
                                    <div class="{{ 'badge badge-light-' . $status[1] }} status-change">{{ $status[0] }}
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
                            <a class="nav-link active text-active-primary pb-4 fs-6" data-bs-toggle="tab"
                                href="#info_detail">Thông tin chi tiết</a>
                        </li>
                        <!--end:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 log_promotion" data-bs-toggle="tab"
                                href="#log_promotion">Lịch sử sử
                                dụng</a>
                        </li>
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="info_detail" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="page d-flex flex-row flex-column-fluid">
                                    <!--begin::Wrapper-->
                                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                                        <!--begin::Container-->
                                        <div id="kt_content_container"
                                            class="d-flex flex-column-fluid align-items-start container-xxl">
                                            @include('user.promotion.detail_info_promo')
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
                        <div class="tab-pane fade" id="log_promotion" role="tabpanel">
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
                                                                    class="form-control w-250px ps-13"
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
                                                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
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
                                                                                        class="form-select fw-bold">
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
                                                                                        class="form-select fw-bold">
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
                                                        <table
                                                            class="table promotion_log align-middle table-row-dashed fs-6 gy-5"
                                                            id="kt_table_promotion_log">
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
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <!--begin::Modals-->
            <!--end::Modals-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#promotion_day_start1").flatpickr({
                dateFormat: 'd/m/Y'
            });
            $("#promotion_day_end2").flatpickr({
                dateFormat: 'd/m/Y'
            });

            //load log
            $('.log_promotion').click(function(e) {
                $.get("{{ route('promotion.log') }}", function(res) {
                    $('.promotion_log').html(res)
                })
            })

            $('.btn-update').click(function(e) {
                e.preventDefault();
                $('.btn-update').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                const form = $('form#form-update-info');
                const data = new FormData(form[0]);
                const action = form.attr('action');
                $.ajax({
                    url: action,
                    data: data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(rs) {
                        $('.btn-update').html(`<span class="indicator-label">Cập nhật </span>`);
                        $('button[type=submit]').removeAttr('disabled');
                        if (rs.status == 200) {

                            $class = 'badge badge-light-' + rs.status_update[1]
                            $class_cur = 'badge badge-light-' + rs.status_cur[1]
                            $('.status-change').html(rs.status_update[0])
                            $('.status-change').removeClass($class_cur);

                            $('.status-change').addClass($class);
                        }
                        Toast.fire({
                            icon: rs?.type,
                            title: rs.message
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                        $('button[type=submit]').removeAttr('disabled');
                        Toast.fire({
                            icon: 'error',
                            title: 'Cập nhật lỗi'
                        });
                    }
                });

            })


        })
    </script>

    <!--end::Vendors Javascript-->
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
