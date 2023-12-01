@extends('User.layout.main')
@php
    $title = 'Lịch sử hoạt động';
@endphp
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-3">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Nhật ký</h1>
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
                            Khác
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container">
                <!--begin::Card-->
                <div class="card">
                    <form action="" id="form-filter">
                        @csrf
                        <input type="hidden" name="date" value="{{ $data['date'] }}">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                    <input name="search" type="text" class="form-control w-250px ps-13"
                                        placeholder="Nhấn emter để tìm ..." />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <div class="me-2 min-w-200px">
                                        <select name="staff_id" data-hide-search="true" data-control="select2"
                                            class="form-select form-filter">
                                            <option value="">-- Tài khoản --</option>
                                            <option value="">Tất cả</option>
                                            <option value="0">Hệ thống</option>
                                            @foreach ($data['staffs'] as $staff)
                                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                        class="btn btn-sm btn-light d-flex align-items-center px-4 me-2 filter-date">
                                        <!--begin::Display range-->
                                        <div class="text-gray-600 fw-bold">Loading date range...</div>
                                        <!--end::Display range-->
                                        <i class="ki-outline ki-calendar-8 fs-1 ms-2 me-0"></i>
                                    </div>
                                    <!--begin::Filter-->
                                    <div class="btn-group" role="group">
                                        <button onclick="filterTable()" type="button" data-bs-toggle="tooltip"
                                            title="Tải lại dữ liệu"
                                            class="btn btn-sm btn-outline btn-outline-dashed btn-outline-primary btn-active-primary btn-reload">
                                            <span class="indicator-label">
                                                <i class="ki-outline ki-arrows-circle fs-2"></i>
                                            </span>
                                            <span class="indicator-progress">Đang tải ...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Filter-->
                                </div>
                                <!--end::Toolbar-->
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                    </form>
                    <!--begin::Card body-->
                    <div class="card-body py-4 table-responsive table-loading min-h-200px">
                        <div class="visually-hidden table-loading-message">
                            Loading...
                        </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_data">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0 bg-light-primary">
                                    {{-- <th class="w-50px text-center">#</th> --}}
                                    <th class="w-200px">Tài khoản</th>
                                    <th class="w-175px text-center">Thời gian</th>
                                    <th class="text-center">Nội dung</th>
                                </tr>
                            </thead>
                            <tbody id="load-table" class="text-gray-600 fw-semibold">
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Không tìm thấy dữ liệu!
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
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
@section('script')
    <script>
        const key = 'page-staff_history';
        filterTable();

        function downFile() {
            var data = $('#form-filter').serialize();
            const url = "{{ route('staff_history.list') }}?" + data + "&export=1";
            window.open(url);
        }

        function filterTable() {
            $('.btn-reload').attr('data-kt-indicator', 'on');
            var data = $('#form-filter').serialize();
            const url = "{{ route('staff_history.list') }}?page=" + page + "&" + data;
            $('.table-loading .visually-hidden').addClass('table-loading-message').removeClass('visually-hidden');
            $.get(url, function(rs) {
                $('.table-loading .table-loading-message').addClass('visually-hidden').removeClass(
                    'table-loading-message');
                $('.btn-reload').removeAttr('data-kt-indicator');
                if (rs.status == 200) {
                    $('#load-table').html(rs.data);
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: rs.message
                    });
                }
            });
        }

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            filterTable();
        });

        $('.form-filter').on('change', function() {
            filterTable();
        });

        $('#form-filter').submit(function(e) {
            e.preventDefault();
            filterTable();
        });

        $('.filter-date').on('apply.daterangepicker', function(ev, picker) {
            day_from = picker.startDate.format('YYYY-MM-DD');
            day_to = picker.endDate.format('YYYY-MM-DD');
            const _date = day_from + ' to ' + day_to;
            $('input[name="date"]').val(_date);
            filterTable();
        });
    </script>
@endsection
