@php
    $modules = json_decode($package->modules);
@endphp
@extends('Admin.layout.default')
@section('title', 'Chi tiết gói dịch vụ')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Gói dịch vụ: #{{ $package->name }}</h4>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.package.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
            <button class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary" data-bs-toggle="modal"
                data-bs-target="#editModal">
                <i class="fas fa-edit"></i> Cập nhật
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 mb-2">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Mã:
                    <span>{{ $package->code }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tên:
                    <span>{{ $package->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tổng licenses:
                    <span>{{ $package->licenses_count }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tổng modules:
                    <span>{{ count($modules) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Trạng thái:
                    <span>
                        @if ($package->status == 'active')
                            <i class="fa fa-circle fs-8px fa-fw text-success me-1"></i> Đang kích hoạt
                        @else
                            <i class="fa fa-circle fs-8px fa-fw text-secondary me-1"></i> Ngưng kích hoạt
                        @endif
                    </span>
                </li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-12 mb-2 ps-4">
            <div class="row">
                @foreach ($data['modules'] as $item)
                    <div class="form-check form-switch col-sm-6">
                        <input class="form-check-input" name="modules[]" value="{{ $item->code }}" type="checkbox"
                            role="switch" id="switch_module_{{ $item->id }}" disabled
                            {{ in_array($item->code, $modules) ? 'checked' : '' }}>
                        <label class="form-check-label" for="switch_module_{{ $item->id }}">
                            {{ $item->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.package.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Cập nhật gói dịch vụ</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-1 content-update">
                        @include('Admin.package.show')
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
