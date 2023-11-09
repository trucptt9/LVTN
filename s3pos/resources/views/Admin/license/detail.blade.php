@extends('Admin.layout.default')
@section('title', 'Chi tiết license')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>License: #{{ $license->id }}</h3>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.license.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
            @if ($license->status != 'blocked')
                <button data-bs-toggle="modal" data-bs-target="#editModal"
                    class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-danger">
                    <i class="fas fa-lock"></i> Khóa
                </button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 mb-3">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Key kích hoạt:
                    <span>
                        <span class="key-show" style="">***************</span>
                        <span class="key-hide" style="display: none;">{{ $license->key }}</span>
                        <button onclick="toogle_key(this);" class="btn">
                            <i class="fas fa-eye"></i>
                        </button>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Cửa hàng:
                    <span>
                        @if ($license->store)
                            <a href="{{ route('admin.store.detail', ['id' => $license->store_id]) }}">
                                {{ $license->store->name }}
                            </a>
                        @else
                            -
                        @endif
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Gói dịch vụ:
                    <span>
                        @if ($license->package)
                            <a href="{{ route('admin.package.detail', ['id' => $license->package_id]) }}">
                                {{ $license->package->name }}
                            </a>
                        @else
                            -
                        @endif
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Thời gian sử dụng:
                    <span>{{ $license->total_month }} tháng</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Bắt đầu:
                    <span
                        class="text-success">{{ $license->date_start ? date('d/m/Y', strtotime($license->date_start)) : '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Kết thúc:
                    <span
                        class="text-danger">{{ $license->date_end ? date('d/m/Y', strtotime($license->date_end)) : '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Trạng thái:
                    <span class="badge bg-{{ $status[1] }}">
                        {{ $status[0] }}
                    </span>
                </li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-12 mb-2 ps-4">
            <div class="row">
                @foreach ($modules as $item)
                    <div class="form-check form-switch col-sm-6">
                        <input class="form-check-input" type="checkbox" role="switch" disabled
                            {{ in_array($item->code, json_decode($license->package->modules)) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $item->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if ($license->status == 'blocked')
        <div class="alert alert-danger mt-3" role="alert">
            <i class="fas fa-exclamation-triangle"></i> Nguyên nhân bị khóa: {{ $license->note }}
        </div>
    @endif
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.license.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $license->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Khóa license</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-1 content-update">
                        <div class="mb-1 form-group">
                            <label class="col-form-label">Nguyên nhân *</label>
                            <textarea name="note" rows="3" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-long-arrow-alt-left"></i> Thoát
                        </button>
                        <button type="submit" class="btn bg-gradient-cyan-blue btn-create text-white">
                            <i class="fas fa-save"></i> Tiếp tục
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
