@extends('Admin.layout.default')
@section('title', 'Nhật ký')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Nhật ký <span class="total-item">(0)</span></h4>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ previousUrl() }}" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i> Quay lại
            </a>
        </div>
    </div>
    <div class="card card-header-actions">
        <form action="" id="form-filter">
            <!--begin::Card header-->
            <div class="card-header">
                <input name="search" type="text" class="form-control w-250px ps-13"
                    placeholder="Nhấn enter để tìm ..." />
                <div class="d-flex justify-content-end">
                    <div class="me-2 w-150px">
                        <select name="admin_id" class="form-select filter-admin_id form-filter select-picker">
                            <option value="" selected>-- Admin --</option>
                            @foreach ($data['admins'] as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="me-2 w-150px">
                        <input type="date" name="date" class="form-control form-filter" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" data-bs-toggle="tooltip" title="Tải lại dữ liệu"
                            class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary btn-reload">
                            <i class="fas fa-sync"></i>
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
                        <th class="text-center w-75px">#</th>
                        <th class="text-center w-150px">Admin</th>
                        <th class="text-center w-150px">Thời gian</th>
                        <th class="text-center">Nội dung</th>
                    </tr>
                </thead>
                <tbody id="load-table" class="text-gray-600 fw-semibold">
                    <tr>
                        <td colspan="4" class="text-center no-data">
                            Không tìm thấy dữ liệu!
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.admin_history.list') }}";
        filterTable(page = 1);

        function filterTable(page) {
            loadTable(page, routeList);
        };
    </script>
@endpush
