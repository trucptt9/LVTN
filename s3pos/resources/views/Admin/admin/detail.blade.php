@extends('Admin.layout.default')
@section('title', 'Chi tiết quản trị viên')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Quản trị viên: #{{ $admin->name }}</h3>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.admin.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Mã:
                    <span>{{ $admin->code }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tên:
                    <span>{{ $admin->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Email:
                    <span>{{ $admin->email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Phone:
                    <span>{{ $admin->phone }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Ngày tạo:
                    <span>{{ $admin->created_at ? date('H:i:s d/m/Y', strtotime($admin->created_at)) : '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Trạng thái:
                    <span>
                        @if ($admin->status == 'active')
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
