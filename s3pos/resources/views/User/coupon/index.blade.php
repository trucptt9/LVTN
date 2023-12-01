@extends('User.layout.main')
@section('style')
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Phiếu mua hàng</h1>
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
                        <!--end::Item-->
                    </ul>
                </div>
                @can('coupon-create')
                    <a class="btn btn-add btn-primary h-40px">
                        Tạo mới
                    </a>
                    @include('User.coupon.modal_add')
                @endcan

            </div>
         
            <!--begin::promotions-->
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
                            <!--end::Search-->
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
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
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body pt-0 table-loading">
                    <!--begin::Table-->
                    <table class="table align-middle table-bordered fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-100px">Mã</th>
                                <th class="">Tên</th>
                                <th class="w-200px text-center">Thời gian áp dụng</th>
                                <th class="w-140px text-center">Giá trị</th>
                                <th class="w-140px text-center">Số lượng còn lại</th>
                                <th class="w-125px text-center">Trạng thái</th>
                                <th class=" w-90px text-center">#</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600" id="load-table">
                            <tr>
                                <td colspan="7" class="text-center no-data">
                                    Không tìm thấy dữ liệu!
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::promotions-->
        </div>
        <!--end::Post-->
    </div>
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <form action="{{ route('coupon.update') }}" id="form-update" method="POST" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered mw-900px">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Cập nhật phiếu mua hàng</h2>
                        <div class="btn btn-sm btn-icon btn-active-color-primary close-btn" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body">
                        <div class="flex-row-fluid py-lg-5 ">
                            <div class="row content-update" id="kt_modal_create_app_stepper">
                            </div>
                            <div class="text-center pt-10">
                                <button type="reset" class="btn btn-light me-3 close-btn2">Hủy</button>
                                <button type="submit" class="btn btn-primary btn-create">
                                    <span class="indicator-label">Cập nhật </span>

                                </button>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
                <!--end::Modal body-->
            </div>
        </form>
        <!--end::Modal content-->
    </div>
@endsection

@section('script')
    <script>
        const routeList = "{{ route('coupon.list') }}";

        filterTable();

        function filterTable() {
            loadTable(routeList);
        };
        $('.btn-add').click(function(e) {
            e.preventDefault();
            $('#modal-add').trigger('reset');
            $('#modal-add').modal('show');
        })
        $('.btn-close').click(function(e) {
            e.preventDefault();
            $('#modal-add').trigger('reset');
            $('#modal-add').modal('hide');
        })
        $('.btn-cancle').click(function(e) {
            e.preventDefault();
            $('#modal-add').trigger('reset');
            $('#modal-add').modal('hide');
        })

        $('.close-btn2').click(function(e) {
            e.preventDefault();
            // $('#modal-edit').trigger('reset');
            $('#modal-edit').modal('hide');
        })

        $(document).ready(function() {
            $("#coupon_day_start").flatpickr({
                dateFormat: 'd-m-Y'
            });
            $("#coupon_day_end").flatpickr({
                dateFormat: 'd-m-Y'
            });
            $("#coupon_day_start1").flatpickr({
                dateFormat: 'd-m-Y'
            });
            $("#coupon_day_end2").flatpickr({
                dateFormat: 'd-m-Y'
            });

        })
        $('#start-datepicker').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
        $('#end-datepicker').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
        const form_create = $('form#form-create');
        if (form_create) {
            const action = form_create.attr('action');
            form_create.submit(function(e) {
                e.preventDefault();
                $('.btn-create').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                         <span role="status">Loading...</span>`);
                const data = new FormData($(this)[0]);
                $.ajax({
                    url: action,
                    data: data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(rs) {
                        $('.btn-create').html(`<i class="fas fa-plus"></i> Tạo mới`);
                        $('button[type=submit]').removeAttr('disabled');
                        if (rs.status == 200) {
                            form_create[0].reset();
                            loadTable();
                            if (rs?.uri) {
                                location.href = rs?.uri;
                            }
                            $('.btn-close').click();
                        }
                        Toast.fire({
                            icon: rs?.type,
                            title: rs.message
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $('.btn-create').html(`<i class="fas fa-plus"></i> Tạo mới`);
                        $('button[type=submit]').removeAttr('disabled');
                        Toast.fire({
                            icon: 'error',
                            title: 'Tạo mới lỗi'
                        });
                    }
                });
            });
        }

        function confirmDelete(id) {
            deleteData(id, "{{ route('coupon.delete') }}");
        }

        function changeStatus(id) {
            $.post("{{ route('coupon.update') }}", {
                id
            }, function(rs) {
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message
                });
            });
        }
        $(document).ready(function() {
            $(document).on("click", ".btn-edit", function(e) {
                showSpinner(".table-loading");
                e.preventDefault();
                const url = $(this).attr('href');
                console.log(url)
                $.get(url, function(data) {
                    hideSniper(".table-loading");
                    console.log(data);
                    $('.content-update').html(data);
                    $('#modal-edit').modal('show');
                })
            })
        })
    </script>
@endsection
