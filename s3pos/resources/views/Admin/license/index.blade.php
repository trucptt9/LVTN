@php
    use App\Models\License;
@endphp
@extends('Admin.layout.default')
@section('title', 'Bản quyền')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Bản quyền <span class="total-item">(0)</span></h4>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ previousUrl() }}" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Quay lại
            </a>
        </div>
    </div>
    <div class="row">
        @foreach ($data['report'] as $item)
            @php
                $status = License::get_status($item->status);
            @endphp
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="d-flex align-items-center py-2 px-3">
                        <div
                            class="w-40px h-40px d-flex align-items-center justify-content-center bg-{{ $status[1] }} text-white rounded-2 ms-n1">
                            <i class="fas fa-key fa-lg"></i>
                        </div>
                        <div class="flex-fill px-3 py-1">
                            <div class="fw-semibold">
                                {{ $item->total }}
                            </div>
                            <div class="small text-body text-opacity-50">
                                {{ $status[0] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card card-header-actions">
        <form action="" id="form-filter">
            <!--begin::Card header-->
            <div class="card-header">
                <input name="search" type="text" class="form-control w-250px ps-13"
                    placeholder="Nhấn enter để tìm ..." />
                <div class="d-flex justify-content-end">
                    <div class="me-2 w-150px">
                        <select name="status" class="form-select filter-status form-filter select-picker">
                            <option value="">-- Chọn --</option>
                            @foreach ($data['status'] as $key => $item)
                                <option value="{{ $key }}">{{ $item[0] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" data-bs-toggle="tooltip" title="Tải lại dữ liệu"
                            class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary btn-reload">
                            <i class="fas fa-sync"></i>
                        </button>
                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary"
                            data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fas fa-plus"></i> Tạo
                        </button>

                    </div>
                </div>
            </div>
            <!--end::Card header-->
        </form>
        <!--begin::Card body-->
        <div class="card-body py-4 table-responsive table-loading">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0 bg-light-primary">
                        <th class="text-center w-250px">Key</th>
                        <th class="text-center">Cửa hàng</th>
                        <th class="text-center w-200px">Gói dịch vụ</th>
                        <th class="text-center w-125px">Thời gian SD</th>
                        <th class="text-center w-150px">Trạng thái</th>
                    </tr>
                </thead>
                <tbody id="load-table" class="text-gray-600 fw-semibold">
                    <tr>
                        <td colspan="6" class="text-center no-data">
                            Không tìm thấy dữ liệu!
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
    @include('Admin.license.create')
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.license.list') }}";
        filterTable(page = 1);

        function filterTable(page) {
            loadTable(page, routeList);
        };
    </script>
@endpush
