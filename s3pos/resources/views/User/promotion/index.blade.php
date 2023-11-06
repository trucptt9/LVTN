@extends('User.layout.main')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">

            <div class="page-title d-flex flex-column me-3">

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <h5 class="breadcrumb-item text-white opacity-75">
                        <a href=".#" class="text-white text-hover-primary">Sản phẩm</a>
                    </h5>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <h5 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h5>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <h5 class="breadcrumb-item text-white opacity-75">Quản lý sản phẩm</h5>
                    <!--end::Item-->


                </ul>
                <!--end::Breadcrumb-->
            </div>
            <div class="d-flex align-items-center py-3 py-md-1">
                <!--begin::Wrapper-->
                <form action="" id="form-filter">


                    <div class="me-4 row">
                        <!--begin::Search-->
                        <div class="col">
                            <input type="text" data-kt-user-table-filter="search" name="search"
                                class="form-control col form-control-solid w-250px ps-13 mx-3"
                                placeholder="Nhập nội dung cần tìm ... " />
                        </div>

                        <!--end::Search-->
                        <div class="col me-2 w-170px">
                            <select name="status" class="form-select filter-status form-filter select-picker">
                                <option value="" selected>-- Trạng thái --</option>
                                @foreach ($data['status'] as $key => $item)
                                    <option value="{{ $key }}">{{ $item[0] }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>



    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        @include('User.promotion.content')
                    </div>
                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
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


        })
        const routeList = "{{ route('promotion.list') }}";
        filterTable();

        function filterTable() {
            loadTable(routeList);
        };
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
            deleteData(id, "{{ route('promotion.delete') }}");
        }

        function changeStatus(id) {
            $.post("{{ route('promotion.update') }}", {
                id
            }, function(rs) {
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message
                });
            });
        }
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
