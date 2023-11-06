
@extends('Admin.layout.default')
@section('title', 'Chi tiết module')
@section('content')
    <div class="d-flex justify-content-between mb-3">

        <h4>Module: #{{ $module->name }}</h4>

        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.module.index') }}" class="btn btn-secondary">

                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Mã:

                    <span>{{ $module->code }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tên:
                    <span>{{ $module->name }}</span>

                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Trạng thái:
                    <span>

                        @if ($module->status == 'active')

                            <i class="fa fa-circle fs-8px fa-fw text-success me-1"></i> Đang kích hoạt
                        @else
                            <i class="fa fa-circle fs-8px fa-fw text-secondary me-1"></i> Ngưng kích hoạt
                        @endif
                    </span>
                </li>
            </ul>
        </div>
    </div>
@endsection
