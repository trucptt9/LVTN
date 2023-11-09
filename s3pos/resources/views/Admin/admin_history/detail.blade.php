@extends('Admin.layout.default')
@section('title', 'Chi tiết nhật ký')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Nhật ký: #{{ $admin_history->id }}</h3>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.admin_history.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Thứ tự:
                    <span>#{{ $admin_history->id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Quản trị viên:
                    <span>
                        @if ($admin_history->admin)
                            <a href="{{ route('admin.admin.detail', ['id' => $admin_history->admin_id]) }}">
                                {{ $admin_history->admin->name }}
                            </a>
                        @else
                            -
                        @endif
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Ngày tạo:
                    <span>{{ $admin_history->created_at ? date('H:i:s d/m/Y', strtotime($admin_history->created_at)) : '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Nội dung:
                    <span class="text-end" style="max-width: 80%">{{ $admin_history->note }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
