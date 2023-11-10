@extends('Admin.layout.default')
@section('title', 'Trang chủ')
@section('content')
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-3">
            <!-- BEGIN card -->
            <a href="{{ route('admin.admin.index') }}" class="text-decoration-none">
                <div class="card mb-2">
                    <div class="card-body d-flex align-items-center">
                        <div
                            class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-yellow-red text-white rounded-2 ms-n1">
                            <i class="fas fa-user-shield fa-lg"></i>
                        </div>
                        <div class="flex-fill px-3 py-1">
                            <div class="fw-semibold text-danger">
                                {{ number_format($data['admins']) }}
                            </div>
                            <div class="small text-body text-opacity-50">
                                Tổng quản trị viên
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->

            <!-- BEGIN card -->
            <a href="{{ route('admin.license.index') }}" class="text-decoration-none">
                <div class="card mb-2">
                    <div class="card-body d-flex align-items-center">
                        <div
                            class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-custom-indigo text-white rounded-2 ms-n1">
                            <i class="fas fa-key fa-lg"></i>
                        </div>
                        <div class="flex-fill px-3 py-1">
                            <div class="fw-semibold text-danger">
                                {{ number_format($data['licenses']) }}
                            </div>
                            <div class="small text-body text-opacity-50">
                                Tổng license
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->

            <!-- BEGIN card -->
            <a href="{{ route('admin.store.index') }}" class="text-decoration-none">
                <div class="card mb-2">
                    <div class="card-body d-flex align-items-center">
                        <div
                            class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-custom-blue text-white rounded-2 ms-n1">
                            <i class="fas fa-store fa-lg"></i>
                        </div>
                        <div class="flex-fill px-3 py-1">
                            <div class="fw-semibold text-danger">
                                {{ number_format($data['stores']) }}
                            </div>
                            <div class="small text-body text-opacity-50">
                                Tổng cửa hàng
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->

            <!-- BEGIN card -->
            <a href="{{ route('admin.package.index') }}" class="text-decoration-none">
                <div class="card mb-2">
                    <div class="card-body d-flex align-items-center">
                        <div
                            class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-yellow-green text-white rounded-2 ms-n1">
                            <i class="fas fa-box fa-lg"></i>
                        </div>
                        <div class="flex-fill px-3 py-1">
                            <div class="fw-semibold text-danger">
                                {{ number_format($data['packages']) }}
                            </div>
                            <div class="small text-body text-opacity-50">
                                Tổng gói dịch vụ
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->

            <a href="{{ route('admin.module.index') }}" class="text-decoration-none">
                <div class="card mb-2">
                    <div class="card-body d-flex align-items-center">
                        <div
                            class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-red-pink text-white rounded-2 ms-n1">
                            <i class="fas fa-window-restore fa-lg"></i>
                        </div>
                        <div class="flex-fill px-3 py-1">
                            <div class="fw-semibold text-danger">
                                {{ number_format($data['modules']) }}
                            </div>
                            <div class="small text-body text-opacity-50">
                                Tổng modules
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- END col-6 -->

        <!-- BEGIN col-6 -->
        <div class="col-xl-9 mb-3">
            <!-- BEGIN card -->
            <div class="card h-100">
                <!-- BEGIN card-body -->
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Doanh thu bán hàng</h5>
                            <div class="fs-13px">Thống kê trong năm hiện tại</div>
                        </div>
                        <button class="btn btn-sm btn-secondary" onclick="load_revenue_by_month()">
                            <i class="fa fa-redo"></i>
                        </button>
                    </div>
                    <canvas id="chartMonth" width="800" height="400"></canvas>
                </div>
                <!-- END card-body -->
            </div>
            <!-- END card -->
        </div>
        <!-- END col-6 -->
    </div>
    <!-- END row -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-6 mb-3">
            <!-- BEGIN card -->
            <div class="card h-100">
                <!-- BEGIN card-body -->
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Top 10 sản phẩm</h5>
                            <div class="fs-13px">Bán chạy trong tháng này</div>
                        </div>
                        <button class="btn btn-sm btn-secondary" onclick="load_top_product()">
                            <i class="fa fa-redo"></i>
                        </button>
                    </div>
                    <div class="top-product-content"></div>
                </div>
                <!-- END card-body -->
            </div>
            <!-- END card -->
        </div>
        <!-- END col-6 -->

        <!-- BEGIN col-6 -->
        <div class="col-xl-6 mb-3">
            <!-- BEGIN card -->
            <div class="card h-100">
                <!-- BEGIN card-body -->
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Top 10 cửa hàng</h5>
                            <div class="fs-13px">Có doanh thu cao trong tháng này</div>
                        </div>
                        <button class="btn btn-sm btn-secondary" onclick="load_top_store()">
                            <i class="fa fa-redo"></i>
                        </button>
                    </div>
                    <div class="top-store-content"></div>
                </div>
                <!-- END card-body -->
            </div>
            <!-- END card -->
        </div>
        <!-- END col-6 -->
    </div>
    <!-- END row -->
@endsection
@push('js')
    <script src="{{ asset('admin/assets/js/chart.js') }}"></script>
    <script>
        var chartMonth;

        load_top_product();
        load_top_store();
        load_revenue_by_month();

        function load_top_product() {
            $('.top-product-content').html('');
            $.ajax({
                url: "{{ route('admin.home.top_product') }}",
                async: true,
                type: 'POST',
                success: function(data) {
                    $('.top-product-content').html(data);
                }
            });
        }

        function load_top_store() {
            $('.top-store-content').html('');
            $.ajax({
                url: "{{ route('admin.home.top_store') }}",
                async: true,
                type: 'POST',
                success: function(data) {
                    $('.top-store-content').html(data);
                }
            });
        }

        function load_revenue_by_month() {
            $.ajax({
                url: "{{ route('admin.home.revenue_by_month') }}",
                async: true,
                type: 'POST',
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
                }
            });
        }
    </script>
@endpush
