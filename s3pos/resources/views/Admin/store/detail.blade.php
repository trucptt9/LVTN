@extends('Admin.layout.default')
@section('title', 'Chi cửa hàng')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Cửa hàng: #{{ $store->name }}</h3>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.store.index') }}"
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
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-custom-teal text-white rounded-2 ms-n1">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-success">
                            {{ number_format($data['staffs']) }}
                        </div>
                        <div class="small text-body text-opacity-50">
                            Số nhân viên
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-indigo-blue text-white rounded-2 ms-n1">
                        <i class="fas fa-file-invoice-dollar fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-info">
                            {{ number_format($data['orders']) }}
                        </div>
                        <div class="small text-body text-opacity-50">
                            Tổng số đơn hàng
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-yellow-red text-white rounded-2 ms-n1">
                        <i class="fas fa-dollar-sign fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-danger">
                            {{ number_format($data['revenue']) }}
                        </div>
                        <div class="small text-body text-opacity-50">
                            Tổng doanh đến thời diểm hiện tại
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-sm-12 mb-2">
            <h5 class="text-uppercase">
                Thông tin chung
            </h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Mã:
                    <span>{{ $store->code }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Tên:
                    <span>{{ $store->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Loại doanh nghiệp:
                    <span>{{ $store->businessType ? $store->businessType->name : '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Điện thoại:
                    <span>{{ $store->phone }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Trạng thái:
                    <span>
                        <i class="fa fa-circle fs-8px fa-fw text-{{ $data['status'][1] }} me-1"></i>
                        {{ $data['status'][0] }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Ngày tạo:
                    <span>{{ $store->created_at ? date('H:i:s d/m/Y', strtotime($store->created_at)) : '-' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    - Địa chỉ:
                    <span class="w-250px text-end">{{ $store->address }}</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-7 col-sm-12 mb-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Top sản phẩm bán chạy nhất theo doanh thu
                    <button onclick="loadDataProduct()" data-bs-toggle="tooltip" title="Tải lại dữ liệu"
                        class="btn btn-sm load-product btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                        <i class="fas fa-sync"></i>
                    </button>
                </div>
                <div class="card-body main-product">
                    <canvas id="chartProduct" width="400" height="250"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-2 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Doanh thu trong năm
                    <button onclick="loadDataMonth()" data-bs-toggle="tooltip" title="Tải lại dữ liệu"
                        class="btn btn-sm load-month btn-outline btn-outline-dashed btn-outline-primary btn-active-primary">
                        <i class="fas fa-sync"></i>
                    </button>
                </div>
                <div class="card-body main-month">
                    <canvas id="chartMonth" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.store.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Cập nhật thông tin cửa hàng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 py-1 content-update">
                        @include('Admin.store.show')
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
    <script src="{{ asset('admin/assets/js/chart.js') }}"></script>
    <script>
        const storeId = "{{ $store->id }}";
        const btnProduct = $('.load-product');
        const btnMonth = $('.load-month');

        // Khởi tạo biến chartMonth
        var chartMonth, chartProduct;

        // Hàm để tải dữ liệu từ máy chủ bằng AJAX
        function loadDataMonth() {
            btnMonth.html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
            $.ajax({
                url: "{{ route('admin.store.report.revenue_by_month') }}",
                async: true,
                type: 'POST',
                data: {
                    store_id: storeId
                },
                success: function(data) {
                    // Kiểm tra nếu biểu đồ đã được tạo, thì hủy nó trước khi vẽ lại
                    if (chartMonth) {
                        chartMonth.destroy();
                    }

                    // Lấy thẻ canvas
                    var ctx = document.getElementById('chartMonth').getContext('2d');

                    chartMonth = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.map(function(row) {
                                return "T" + row.month;
                            }),
                            datasets: [{
                                label: 'Đơn hàng',
                                data: data.map(function(row) {
                                    return row.order_count;
                                }),
                                backgroundColor: 'rgba(255, 206, 86, 0.5)',
                                borderColor: 'rgba(255, 206, 86, 1)',
                            }]
                        },
                    });

                    chartMonth.options.scales.y = {
                        ...chartMonth.options.scales.y,
                        right: {
                            type: 'linear',
                            position: 'right',
                            beginAtZero: true
                        }
                    };

                    // Thêm dãy dữ liệu cho biểu đồ đường (line chart)
                    chartMonth.data.datasets.push({
                        label: 'Doanh thu',
                        data: data.map(function(row) {
                            return row.revenue;
                        }),
                        type: 'line',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        yAxisID: 'right-y-axis'
                    });

                    chartMonth.update();
                    btnMonth.html(`<i class="fas fa-sync"></i>`);
                }
            });
        }

        function loadDataProduct() {
            btnProduct.html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
            $.ajax({
                url: "{{ route('admin.store.report.revenue_by_product') }}",
                async: true,
                type: 'POST',
                data: {
                    store_id: storeId
                },
                success: function(data) {
                    // Kiểm tra nếu biểu đồ đã được tạo, thì hủy nó trước khi vẽ lại
                    if (chartProduct) {
                        chartProduct.destroy();
                    }

                    // Lấy thẻ canvas
                    var ctx = document.getElementById('chartProduct').getContext('2d');

                    chartProduct = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.map(function(row) {
                                return row.product_name;
                            }),
                            datasets: [{
                                label: 'Doanh thu',
                                data: data.map(function(row) {
                                    return row.revenue;
                                }),
                                // backgroundColor: 'rgba(255, 206, 86, 0.5)',
                                // borderColor: 'rgba(255, 206, 86, 1)',
                            }]
                        },
                    });

                    chartProduct.update();
                    btnProduct.html(`<i class="fas fa-sync"></i>`);
                }
            });
        }
        loadDataMonth();
        loadDataProduct();
    </script>
@endpush
