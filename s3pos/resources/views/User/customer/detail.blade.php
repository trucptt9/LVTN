@extends('User.layout.main')
@section('style')
@endsection
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl flex-row-fluid">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Chi tiết khách hàng</h1>
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
                            <a href="{{ route('customer.index') }}" class="text-white text-hover-primary">
                                Quản lý khách hàng
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <a class="btn  btn-primary h-40px" href="{{ route('customer.index') }}">
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
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-400px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <div class="separator"></div>
                            @include('user.customer.detail_info')
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
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6" data-bs-toggle="tab" href="#log">Lịch sử
                                tích - đổi điểm</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="log" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="page d-flex flex-row flex-column-fluid">
                                    <!--begin::Wrapper-->
                                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                                        <!--begin::Container-->
                                        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start">
                                            <!--begin::Post-->
                                            <div class="content flex-row-fluid" id="kt_content">
                                                <!--begin::Card-->
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
                                                                        <option value="" selected> Chọn hành động
                                                                        </option>
                                                                        @foreach ($data['type'] as $key => $item)
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
                                                            <thead class="bg-primary">
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                    <th class="min-w-100px">Mã hóa đơn</th>
                                                                    <th class="min-w-75px text-center ">Số điểm</th>
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
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const routeList = "{{ route('customer.table_history', $customer->id) }}"
            // filterTable();

            function filterTable() {
                loadTable(routeList);
            };

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
@endsection
