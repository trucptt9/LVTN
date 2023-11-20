@extends('Admin.layout.default')
@section('title', 'Chi tiết quản trị viên')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Quản trị viên: #{{ $admin->name }}</h4>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.admin.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
            <a href="{{ route('admin.admin.permission', ['id' => $admin->id]) }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-user-tag"></i> Phân quyền
            </a>
<<<<<<< HEAD
            <button class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary" data-bs-toggle="modal"
                data-bs-target="#editModal">
                <i class="fas fa-edit"></i> Cập nhật
            </button>
=======
>>>>>>> be89e0c5e296b39750352c4d6e3962191a2e67a7
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
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.admin.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Cập nhật quản trị viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-1 content-update">
                        @include('Admin.admin.show')
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
