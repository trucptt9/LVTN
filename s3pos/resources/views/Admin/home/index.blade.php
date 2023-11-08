@extends('Admin.layout.default')
@section('title', 'Trang chủ')
@push('js')
    <script src="{{ asset('admin/assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/dashboard.demo.js') }}"></script>
@endpush
@section('content')
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-3">
            <!-- BEGIN card -->
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-yellow-red text-white rounded-2 ms-n1">
                        <i class="fas fa-user-shield fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-danger">
                            12
                        </div>
                        <div class="small text-body text-opacity-50">
                            Tổng quản trị viên
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->

            <!-- BEGIN card -->
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-custom-indigo text-white rounded-2 ms-n1">
                        <i class="fas fa-key fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-danger">
                            12
                        </div>
                        <div class="small text-body text-opacity-50">
                            Tổng license
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->

            <!-- BEGIN card -->
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-custom-blue text-white rounded-2 ms-n1">
                        <i class="fas fa-store fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-danger">
                            12
                        </div>
                        <div class="small text-body text-opacity-50">
                            Tổng cửa hàng
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->

            <!-- BEGIN card -->
            <div class="card mb-2">
                <div class="card-body d-flex align-items-center">
                    <div
                        class="w-40px h-40px d-flex align-items-center justify-content-center bg-gradient-yellow-green text-white rounded-2 ms-n1">
                        <i class="fas fa-box fa-lg"></i>
                    </div>
                    <div class="flex-fill px-3 py-1">
                        <div class="fw-semibold text-danger">
                            12
                        </div>
                        <div class="small text-body text-opacity-50">
                            Tổng gói dịch vụ
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
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
                        <a href="javascript:;" class="text-secondary"><i class="fa fa-redo"></i></a>
                    </div>
                    <div id="chart"></div>
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
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Top sản phẩm</h5>
                            <div class="fs-13px">Bán chạy trong tháng này</div>
                        </div>
                        <a href="#" class="text-decoration-none">Xem thêm</a>
                    </div>

                    <!-- product-1 -->
                    <div class="d-flex align-items-center mb-3">
                        <div
                            class="d-flex align-items-center justify-content-center me-3 w-50px h-50px bg-white p-3px rounded">
                            <img src="{{ asset('admin/assets/img/product/product-1.jpg') }}" alt=""
                                class="ms-100 mh-100">
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-primary fs-10px fw-600">TOP SALES</div>
                                <div class="text-body fw-600">iPhone 11 Pro Max (256GB)</div>
                                <div class="fs-13px">$1,099</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-body fw-600">382</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <!-- product-2 -->
                    <div class="d-flex align-items-center mb-3">
                        <div
                            class="d-flex align-items-center justify-content-center me-3 w-50px h-50px bg-white p-3px rounded">
                            <img src="{{ asset('admin/assets/img/product/product-2.jpg') }}" alt=""
                                class="ms-100 mh-100">
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-body fw-600">Macbook Pro 13 inch (2021)</div>
                                <div class="fs-13px">$1,120</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-body fw-600">102</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <!-- product-3 -->
                    <div class="d-flex align-items-center mb-3">
                        <div
                            class="d-flex align-items-center justify-content-center me-3 w-50px h-50px bg-white p-3px rounded">
                            <img src="{{ asset('admin/assets/img/product/product-3.jpg') }}" alt=""
                                class="ms-100 mh-100">
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-body fw-600">Apple Watch Series 4(2021)</div>
                                <div class="fs-13px">$349</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-body fw-600">75</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <!-- product-4 -->
                    <div class="d-flex align-items-center mb-3">
                        <div
                            class="d-flex align-items-center justify-content-center me-3 w-50px h-50px bg-white p-3px rounded">
                            <img src="{{ asset('admin/assets/img/product/product-4.jpg') }}" alt=""
                                class="ms-100 mh-100">
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-body fw-600">12.9-inch iPad Pro (256GB)</div>
                                <div class="fs-13px">$1,099</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-body fw-600">62</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <!-- product-5 -->
                    <div class="d-flex align-items-center">
                        <div
                            class="d-flex align-items-center justify-content-center me-3 w-50px h-50px bg-white p-3px rounded">
                            <img src="{{ asset('admin/assets/img/product/product-5.jpg') }}" alt=""
                                class="ms-100 mh-100">
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-body fw-600">iPhone 11 (128gb)</div>
                                <div class="fs-13px">$799</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-body fw-600">59</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>
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
                            <h5 class="mb-1">Top cửa hàng</h5>
                            <div class="fs-13px">Có doanh thu cao trong tháng này</div>
                        </div>
                        <a href="#" class="text-decoration-none">Xem thêm</a>
                    </div>

                    <!-- BEGIN table-responsive -->
                    <div class="table-responsive mb-n2">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr class="text-body">
                                    <th class="ps-0">No</th>
                                    <th>Order Details</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-end pe-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-0">1.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-40px h-40px">
                                                <img src="{{ asset('admin/assets/img/icon/paypal2.svg') }}" alt=""
                                                    class="ms-100 mh-100">
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <div class="fw-600 text-body">Macbook Pro 15 inch</div>
                                                <div class="fs-13px">5 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success bg-opacity-20 text-success"
                                            style="min-width: 60px;">Success</span></td>
                                    <td class="text-end pe-0">$1,699.00</td>
                                </tr>
                                <tr>
                                    <td class="ps-0">2.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-40px h-40px rounded">
                                                <img src="{{ asset('admin/assets/img/icon/mastercard.svg') }}"
                                                    alt="" class="ms-100 mh-100">
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <div class="fw-600 text-body">Apple Watch 5 Series</div>
                                                <div class="fs-13px">5 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success bg-opacity-20 text-success"
                                            style="min-width: 60px;">Success</span></td>
                                    <td class="text-end pe-0">$699.00</td>
                                </tr>
                                <tr>
                                    <td class="ps-0">3.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-40px h-40px rounded">
                                                <img src="{{ asset('admin/assets/img/icon/visa.svg') }}" alt=""
                                                    class="ms-100 mh-100">
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <div class="fw-600 text-body">iPhone 11 Pro Max</div>
                                                <div class="fs-13px">12 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-warning bg-opacity-20 text-warning"
                                            style="min-width: 60px;">Pending</span></td>
                                    <td class="text-end pe-0">$1,299.00</td>
                                </tr>
                                <tr>
                                    <td class="ps-0">4.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-40px h-40px rounded">
                                                <img src="{{ asset('admin/assets/img/icon/paypal2.svg') }}"
                                                    alt="" class="ms-100 mh-100">
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <div class="fw-600 text-body">Apple Magic Keyboard</div>
                                                <div class="fs-13px">15 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span
                                            class="badge text-body text-opacity-50 bg-dark bg-opacity-10"
                                            style="min-width: 60px;">Cancelled</span></td>
                                    <td class="text-end pe-0">$199.00</td>
                                </tr>
                                <tr>
                                    <td class="ps-0">5.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-40px h-40px rounded">
                                                <img src="{{ asset('admin/assets/img/icon/mastercard.svg') }}"
                                                    alt="" class="ms-100 mh-100">
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <div class="fw-600 text-body">iPad Pro 15 inch</div>
                                                <div class="fs-13px">15 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success bg-opacity-20 text-success"
                                            style="min-width: 60px;">Cancelled</span></td>
                                    <td class="text-end pe-0">$1,099.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END table-responsive -->
                </div>
                <!-- END card-body -->
            </div>
            <!-- END card -->
        </div>
        <!-- END col-6 -->
    </div>
    <!-- END row -->
@endsection
