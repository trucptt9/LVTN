@extends('user.layout.main')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl flex-row-fluid">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Chi tiết phiếu mua hàng</h1>
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
                            <a href="{{ route('coupon.index') }}" class="text-white text-hover-primary">
                                Phiêu mua hàng
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <a class="btn  btn-primary h-40px" href="{{ route('coupon.index') }}">
                    Quay lại
                </a>
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


                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <h3>Thông tin phiếu mua hàng</h3>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Tên phiếu</div>
                                    <div class="text-gray-600">
                                        {{ $coupon->name }}
                                    </div>
                                    <div class="fw-bold mt-5">Trạng thái</div>
                                    <div class="">
                                        <div class="{{ 'badge badge-light-' . $status[1] }} status-change "
                                            value="{{ 'badge badge-light-' . $status[1] }}">
                                            {{ $status[0] }}
                                        </div>
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
                            <a class="nav-link text-active-primary pb-4 fs-6 log_coupon" data-bs-toggle="tab"
                                href="#log_coupon">Lịch sử sử
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
                                            @include('user.coupon.detail_info_promo')
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
                        <div class="tab-pane fade" id="log_coupon" role="tabpanel">
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
                                                <div class="card">
                                                    <form action="" id="form-filter">
                                                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                                                            <div class="card-title">
                                                                <!--begin::Search-->
                                                                <div
                                                                    class="d-flex align-items-center position-relative my-1">
                                                                    <i
                                                                        class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <input type="text" name="search"
                                                                        class="form-control w-250px ps-12"
                                                                        placeholder="Nhập nội dung ..." />
                                                                </div>
                                                                <!--end::Search-->
                                                            </div>

                                                            <div
                                                                class="card-toolbar flex-row-fluid justify-content-end gap-5">

                                                                <div class="w-200px ">
                                                                    <!--begin::Select2-->
                                                                    <select class="form-select" data-control="select2"
                                                                        data-hide-search="true" name="type">
                                                                        <option value="" selected> Trạng thái
                                                                        </option>
                                                                        @foreach ($data['status'] as $key => $item)
                                                                            <option value="{{ $key }}">
                                                                                {{ $item[0] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!--end::Select2-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="card-body py-4 table-loading">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-bordered fs-6 gy-5">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                    <th class="min-w-100px">Mã khách hàng</th>
                                                                    <th class="min-w-100px">Mã hóa đơn</th>
                                                                    <th class="min-w-125px text-center">Thời gian</th>
                                                                    <th class="min-w-150px">Ghi chú</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600 fw-semibold" id="load-table">

                                                                <tr>
                                                                    <td colspan="4" class="text-center">
                                                                        Không tìm thấy dữ liệu
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
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
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#coupon_day_start1").flatpickr({
                dateFormat: 'd/m/Y'
            });
            $("#coupon_day_end2").flatpickr({
                dateFormat: 'd/m/Y'
            });

            //load log
            $('.log_coupon').click(function(e) {
                $.get("{{ route('coupon.log') }}", function(res) {
                    $('.coupon_log').html(res)
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

    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>


    <!--end::Custom Javascript-->
@endsection
