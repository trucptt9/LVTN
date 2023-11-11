@extends('User.layout.main')
@section('style')
@endsection
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
@endsection
@section('script')
    <script>
        const routeList = "{{ route('order.table') }}";
        filterTable();

        function filterTable() {
            loadTable(routeList);
        };

        function confirmDelete(id) {
            deleteData(id, "{{ route('order.delete') }}");
        }
    </script>
@endsection
