@php
    use App\Models\Order;
@endphp
@extends('user.layout.main')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Chi tiết đơn hàng</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            <a href="{{ route('index') }}" class="text-white text-hover-primary">
                                Trang chủ
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            Báo cáo
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <a class="btn  btn-primary h-40px" href="{{ route('order.index') }}">
                    Quay lại
                </a>
            </div>
            <div class="content flex-row-fluid" id="kt_content">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">


                                <div class="separator"></div>
                                <!--begin::Details content-->
                                <div id="kt_user_view_details" clas s="collapse show">
                                    <div class="pb-5 fs-6">
                                        <h3 class="fw-bold mb-3">Thông tin đơn hàng</h3>
                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="">Trạng thái đơn hàng</div>
                                            @php
                                                $status = Order::get_status($order->status);
                                            @endphp
                                            <span class="badge bg-{{ $status[1] }} fs-6">
                                                {{ $status[0] }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="">Mã đơn hàng</div>
                                            <div class="text-gray-600">
                                                {{ $order->code }}
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class=""> Ngày tạo</div>
                                            <div class="text-gray-600 text-hover-primary">{{ $order->created_at }}</div>
                                        </div>
                                        <h3 class="fw-bold mb-3 mt-5" style="margin-top:30px">Thông tin khách hàng</h3>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="s">Tên khách hàng</div>
                                            <div class="text-gray-600">
                                                {{ $order->customer_name ?? 'Khách vãng lai' }}
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class=""> Mã khách hàng</div>
                                            <div class="text-gray-600 text-hover-primary">{{ $order->customer ? $order->customer->code : '' }}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">

                                            <div class="">Số điện thoại</div>
                                            <h6 class="text-gray-600 text-hover-primary">{{ $order->customer ? $order->customer->phone : '' }}</h6>
                                        </div>

                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <div class="flex-lg-row-fluid ms-lg-15">

                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="info_account" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h3>Chi tiết đơn hàng</h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <div class="card-body pt-0 pb-5">
                                        <div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <h6> Nhân viên phụ trách : </h6>
                                                </div>
                                                <div class="col">
                                                    {{ $order->staff->name }}
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-4">
                                                    <h6> Khu vực : </h6>
                                                </div>
                                                <div class="col">
                                                    {{ $order->table->area->name }}
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-4">
                                                    <h6> Bàn : </h6>
                                                </div>
                                                <div class="col">
                                                    {{ $order->table->name }}
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-4">
                                                    <h6> Phương thức thanh toán : </h6>
                                                </div>
                                                <div class="col mt-2">
                                                    {{ $order->methodPayment->name ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title mt-4">
                                            <h3>Chi tiết sản phẩm</h3>
                                        </div>
                                        <div class="text-center table-loading">

                                        </div>
                                        <table class="table align-middle table-bordered fs-6 gy-5">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-250px">Sản phẩm</th>
                                                    <th class="">Topping</th>
                                                    <th class="text-end w-150px">Tổng tiền</th>

                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600" id="load-table">
                                                <tr>
                                                    <td colspan="3" class="text-center no-data">
                                                        Không tìm thấy dữ liệu!
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div style="display:flex; justify-content:flex-end">
                                            <div class="w-50 mt-4">
                                                <div class="total row ">
                                                    <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">Tổng
                                                        cộng</p>
                                                    <p class="fs-6 fw-bold col-6 text-end">
                                                        {{ number_format($order->sub_total) }} đ
                                                    </p>
                                                </div>
                                                <div class="total row">
                                                    <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">Giảm
                                                        giá
                                                    </p>
                                                    <p class="fs-6 fw-bold col-6 text-end">{{ $order->discount_total }} đ
                                                    </p>
                                                </div>
                                                <div class="total row ">
                                                    <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">Phụ
                                                        phí
                                                    </p>
                                                    <p class="fs-6 col-6 fw-bold text-end">0 đ</p>
                                                </div>
                                                <div class="total row ">
                                                    <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">VAT
                                                    </p>
                                                    <p class="fs-6 col-6 fw-bold text-end">0 đ</p>
                                                </div>
                                                <div class="total row ">
                                                    <div class="fw-semibold fs-4 col-6" style="text-transform: uppercase">
                                                        Thành tiền
                                                    </div>
                                                    <p class="fs-4 col-6 text-end fw-bold">
                                                        {{ number_format($order->total) }}
                                                        đ</p>
                                                </div>
                                                <hr style="width:100%">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //load bảng danh sách sp có trong order
            loadData();

            function loadData() {
                showSpinner('.table-loading');
                $.get("{{ route('order.table_detail', $order->id) }}", function(res) {
                    $('#load-table').html(res);
                    $(".sniper-content").remove();
                })
            }

        })
    </script>

    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/view.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-details.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-schedule.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-task.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-email.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-password.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-role.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-auth-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-one-time-password.js') }}"></script>
    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>


    <!--end::Custom Javascript-->
@endsection
