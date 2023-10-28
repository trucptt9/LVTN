@extends('user.layout')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <h6 class="breadcrumb-item text-white opacity-75">
                        <a href=".#" class="text-white text-hover-primary">Bán hàng</a>
                    </h6>
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <h6 class="breadcrumb-item text-white opacity-75">Quản lý đơn hàng</h6>
                    <h6 class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </h6>
                    <h6 class="breadcrumb-item text-white opacity-75">Chi tiết đơn hàng</h6>
                </ul>
            </div>
        </div>

    </div>

    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
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
                                    <h3 class="fw-bolf mb-3">Thông tin đơn hàng</h3>

                                    <div class="fw-bold mt-5">Trạng thái đơn hàng</div>
                                    <div class="badge badge-light-success fs-5">Đã thanh toán</div>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Mã đơn hàng</div>
                                    <div class="text-gray-600">
                                        <h6 class="text-gray-600 text-hover-primary">DH724633</h6>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5"> Ngày tạo</div>
                                    <h6 class="text-gray-600 text-hover-primary">12/03/2023 - 15:05</h6>
                                    <!--begin::Details item-->


                                    <h4 class="fw-bolf mb-3 mt-5" style="margin-top:30px">Thông tin khách hàng</h4>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Tên khách hàng</div>
                                    <div class="text-gray-600">
                                        <h6 class="text-gray-600 text-hover-primary">Huỳnh Văn Phụng</h6>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5"> Mã khách hàng</div>
                                    <h6 class="text-gray-600 text-hover-primary">HT123</h6>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Số điện thoại</div>
                                    <h6 class="text-gray-600 text-hover-primary">0877 767 765</h6>
                                    <!--begin::Details item-->

                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
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
                                        <h4>Chi tiết đơn hàng</h4>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">

                                    <div>
                                        <div class="row">
                                            <div class="col-4">
                                                <h6> Nhân viên phụ trách : </h6>

                                            </div>
                                            <div class="col">
                                                Nguyễn Văn A
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <h6> Khu vực : </h6>
                                            </div>
                                            <div class="col">
                                                Khu vực 1
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <h6> Bàn : </h6>
                                            </div>
                                            <div class="col">
                                                Bàn 1
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <h6> Phương thức thanh toán : </h6>
                                            </div>
                                            <div class="col">
                                                Tiền mặt
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-title mt-4">
                                        <h4>Chi tiết sản phẩm</h4>
                                    </div>
                                    <div class="table-responsive mt-5">
                                        <table class="table order_detail">

                                        </table>
                                    </div>
                                    <hr>
                                    <div style="display:flex; justify-content:flex-end">
                                        <div class="w-50 mt-4">
                                            <div class="total row ">
                                                <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">Tổng
                                                    cộng</p>
                                                <p class="fs-6 col-6 text-end">40.000 đ</p>
                                            </div>
                                            <div class="total row">
                                                <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">giảm giá
                                                </p>
                                                <p class="fs-6 col-6 text-end">0 đ</p>
                                            </div>
                                            <div class="total row ">
                                                <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">phụ phí
                                                </p>
                                                <p class="fs-6 col-6 text-end">0 đ</p>
                                            </div>
                                            <div class="total row ">
                                                <p class="fw-semibold fs-6 col-6" style="text-transform: uppercase">VAT</p>
                                                <p class="fs-6 col-6 text-end">0 đ</p>
                                            </div>
                                            <div class="total row ">
                                                <h6 class="fw-semibold col-6" style="text-transform: uppercase">Thành tiền
                                                </h6>
                                                <p class="fs-6 col-6 text-end fw-bold">40.000 đ</p>
                                            </div>
                                            <hr style="width:100%">
                                            <div class="total row ">
                                                <h6 class="fw-semibold col-6" style="text-transform: uppercase">Tiền khách
                                                    đưa</h6>
                                                <p class="fs-6 col-6 text-end">40.000 đ</p>
                                            </div>
                                            <div class="total row ">
                                                <h6 class="fw-semibold col-6" style="text-transform: uppercase">tiền trả
                                                    lại khách</h6>
                                                <p class="fs-6 col-6 text-end">0 đ</p>
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                        </div>
                        <!--end:::Tab pane-->


                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->

        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //load bảng danh sách sp có trong order
            loadData();

            function loadData() {
                $.get("{{ route('order.table_detail') }}", function(res) {
                    $('.order_detail').html(res);
                    $('.order_detail').DataTable();
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
