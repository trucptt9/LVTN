@extends('Admin.layout.default')
@section('title', 'Phân quyền quản trị viên')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Phân quyền cho quản trị viên: #{{ $admin->name }}</h4>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.admin.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
        </div>
    </div>
    <div class="alert alert-danger mt-3" role="alert">
        Chức năng này đang được cập nhật
    </div>
@endsection
