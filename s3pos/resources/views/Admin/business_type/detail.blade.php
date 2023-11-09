@extends('Admin.layout.default')
@section('title', 'Chi tiết loại hình doanh nghiệp')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Loại hình doanh nghiệp: #{{ $business_type->name }}</h4>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.business_type.index') }}"
                class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                <i class="fas fa-chevron-left"></i> Danh sách
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Mã:
                    <span>{{ $business_type->code }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tên:
                    <span>{{ $business_type->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tổng cửa hàng:
                    <span>{{ number_format($business_type->stores_count) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Trạng thái:
                    <span>
                        @if ($business_type->status == 'active')
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
