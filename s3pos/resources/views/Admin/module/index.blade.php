@extends('Admin.layout.default')
@section('title', 'Module')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Module <span class="total-item">(0)</span></h4>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ previousUrl() }}" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
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

                        <th class="text-center w-200px">Mã</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center w-150px">Trạng thái</th>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.module.update') }}" id="form-update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Cập nhật module</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-1 content-update">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-long-arrow-alt-left"></i> Thoát
                        </button>
                        <button type="submit" class="btn bg-gradient-cyan-blue btn-create text-white">
                            <i class="fas fa-save"></i> Cập nhật
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const routeList = "{{ route('admin.module.list') }}";
        const routeUpdate = "{{ route('admin.module.update') }}";
        filterTable(page = 1);

        function filterTable(page) {
            loadTable(page, routeList);
        };
        $(document).ready(function() {
            $(document).on("click", ".data-item", function(e) {
                showSpiner(".table-loading");
                e.preventDefault();
                const url = $(this).attr('href');
                $.get(url, function(data) {
                    hideSniper(".table-loading");
                    $('.content-update').html(data);
                    $('#editModal').modal('show');
                })
            })
        })
    </script>
@endpush
