@extends('User.layout.main')
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
                        <div class="col me-2 w-150px">
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
    <!--end::Toolbar-->

    <!--begin::Main-->
    <!--begin::Root-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        @include('User.product.content')
                    </div>
                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->





    <!--end::Modals-->
@endsection

@push('js')
    <script>
        const routeList = "{{ route('product.list') }}";
        filterTable();

        function filterTable() {
            loadTable(routeList);
        };


       

        function confirmDelete(id) {
            deleteData(id, "{{ route('product.delete') }}");
        }

        function changeStatus(id) {
            $.post("{{ route('product.update') }}", {
                id
            }, function(rs) {
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message
                });
            });
        }
    </script>
@endpush

@section('script')
    <!--begin::Custom Javascript(used for this page only)-->
    <script src=""></script>
    
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    {{-- <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js')}}"></script> --}}
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
@endsection
