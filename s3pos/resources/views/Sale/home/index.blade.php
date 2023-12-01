<!DOCTYPE html>
<html lang="vi">
<!--begin::Head-->

<head>
    <base href="{{ route('sale.index') }}" />
    <title>{{ get_option_admin('short-name') }}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon"href="{{ show_s3_file(get_option_admin('app-favicon')) }}" />
    <link href="{{ asset('admin/assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet">
    @yield('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .logo-sale {
            width: 60px;
            border-radius: 40px;
        }

        .option-label {
            cursor: pointer;
        }

        .option-label:hover,
        .option-label.active {
            background: rgb(159, 159, 225);
        }

        .category_product .nav-item {
            padding: 0px !important;
            margin-bottom: 7px;
        }

        .pos .pos-sidebar .pos-sidebar-header {
            padding: 8px 12px !important;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled"
    style="background-image:none; background-color:#dedfdf63 ">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div id="app" class="app app-content-full-height app-without-sidebar app-without-header">
        <!-- BEGIN #content -->
        <div id="content" class="app-content p-0">
            <!-- BEGIN pos -->
            <div class="pos pos-with-menu pos-with-sidebar" id="pos">
                <div class="pos-container">
                    <!-- BEGIN pos-menu -->
                    <div class="pos-menu">
                        <!-- BEGIN logo -->
                        <div class="logo">
                            <a href="{{ route('sale.index') }}">
                                <img class="logo-sale" src="{{ asset(show_s3_file(get_option_admin('app-favicon'))) }}"
                                    alt="">
                                <div class="logo-text">{{ get_option_admin('short-name') }}</div>
                            </a>
                        </div>
                        <div class="nav-container">
                            <div class="h-100" data-scrollbar="true" data-skip-mobile="true">
                                <ul class="nav nav-tabs category_product">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pos-content">
                        <div class="pos-content-container h-100">
                            <div class="row gx-4 product">
                            </div>
                        </div>
                    </div>
                    <div class="pos-sidebar" id="pos-sidebar">
                        <div class="h-100 d-flex flex-column p-0">
                            <div class="pos-sidebar-header">
                                <div class="back-btn">
                                    <button type="button" data-toggle-class="pos-mobile-sidebar-toggled"
                                        data-toggle-target="#pos" class="btn">
                                        <i class="fa fa-chevron-left"></i>
                                    </button>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                <a class="title text-decoration-none" href="{{ route('sale.index') }}">
                                    <span>
                                        Bàn: {{ $table->name }}
                                    </span>
                                    <input type="hidden" class="table" value="{{ $table->id }}">
                                </a>
                                <div class="order small me-5"><i class="fas fa-clock"></i> <span id="clock"
                                        class="fw-semibold"></span>
                                </div>
                                @if ($table->booking_id)
                                    <span class="info-table">
                                        <button onclick="destroyBooking()"
                                            class="btn btn-danger btn-cancle-booking btn-sm">Hủy đặt bàn</button>
                                    </span>
                                @else
                                    <span class="info-table">
                                        <button onclick="addBooking()" class="btn btn-warning text-light btn-sm">Đặt
                                            bàn</button>
                                    </span>
                                @endif
                            </div>
                            <div class="pos-sidebar-nav small">
                                <ul class="nav nav-tabs nav-fill" style="padding: 0px !important">
                                    <li class="nav-item">
                                        <a class="nav-link active tab-cart" href="#" data-bs-toggle="tab"
                                            data-bs-target="#newOrderTab">Giỏ hàng</a>

                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link " href="#" data-bs-toggle="tab"
                                            data-bs-target="#customer">Khách hàng</a>
                                        <span data-bs-toggle="tooltip" title="Đang có khách được chọn"
                                            class="position-absolute translate-middle badge rounded-pill bg-danger customer-chosed"
                                            style="top: 8px; right:0px" hidden>
                                            1
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link coupons" href="#" data-bs-toggle="tab"
                                            data-bs-target="#coupon">Phiếu mua hàng</a>
                                        <span data-bs-toggle="tooltip" title="Đang có phiếu mua hàng được chọn"
                                            class="position-absolute translate-middle badge rounded-pill bg-danger coupon-chosed"
                                            style="top: 8px; right:0px" hidden>
                                            1
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="pos-sidebar-body tab-content" data-scrollbar="true" data-height="100%">
                                <div class="tab-pane fade h-100 show active cart-product " id="newOrderTab">
                                </div>
                                <div class="tab-pane fade h-100 p-2" id="customer">
                                    <div class="d-flex align-items-center">
                                        <input type="text" class="form-control phone"
                                            placeholder="Nhập số điện thoại" name="phone">
                                        <button class="btn ms-2 btn-primary btn-search-customer">Tìm</button>
                                    </div>
                                    <div class="customer-list mt-2">

                                    </div>
                                </div>
                                <div class="tab-pane fade h-100 p-2" id="coupon">

                                </div>
                            </div>
                            <div class="pos-sidebar-footer payment">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal add product in cart --}}
            <div class="modal modal-pos fade" id="modalPosItem">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('sale.cart_insert', $table->id) }}" type="POST" id="form-add-product">
                        @csrf
                        <div class="modal-content border-0 ">
                            <a href="#" data-bs-dismiss="modal"
                                class="btn-close close-product position-absolute top-0 end-0 m-4"></a>
                            <div class="modal-pos-product modal-order">
                            </div>
                            <hr class="opacity-1">
                            <div class=" d-flex justify-content-center mx-2 pb-3">
                                <div class="me-3">
                                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block"
                                        data-bs-dismiss="modal">Thoát</a>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-add-product btn-theme fw-semibold  m-0">
                                        <i class="fas fa-plus"></i> Thêm vào giỏ hàng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- modal add promotion --}}
            <?php
            $cart = Cart::Content();
            $total_topping = 0;
            if ($cart) {
                foreach ($cart as $item) {
                    if ($item->options->topping) {
                        foreach ($item->options->topping as $topping) {
                            $total_topping += json_decode($topping, true)['price'];
                        }
                    }
                }
            }
            ?>
            <div class="modal modal-pos fade" id="modal-add-promotion">
                <div class="modal-dialog modal-md">
                    <div class="modal-content border-0 ">
                        <div class="modal-header">
                            <h5 class="modal-title">Tìm chương trình khuyến mãi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-pos-promotion modal-promotion">
                            <div class="modal-pos-product-info">
                                <div class="modal-body">
                                    <input type="text" class="form-control search" placeholder="Nhập mã"
                                        name="search">
                                    <input type="hidden" name="total"
                                        value="{{ Cart::total() + $total_topping }}" id="">
                                    <p class="promotion-none small text-center mt-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-2 pb-3">
                            <div class="col-2">
                                <a href="#" class="btn btn-default fw-semibold mb-0 d-block"
                                    data-bs-dismiss="modal">Thoát</a>
                            </div>
                            <div class="col-8">
                                <button type="submit" class="btn btn-add-promtotion btn-theme fw-semibold  m-0">
                                    Tìm
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- modal add payment-->
            <div class="modal modal-pos fade" id="modal_payment">
                <div class="modal-dialog modal-md">
                    <form action="{{ route('sale.paymentOrderTmp') }}" type="POST" id="form-payment">
                        @csrf
                        <div class="modal-content border-0">
                            <div class="modal-header">
                                <h5 class="modal-title">Xác nhận thanh toán</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-pos-promotion modal-promotion">
                                <div class="modal-body">
                                    <input type="hidden" name="order_id" class="order-id-payment" value="">
                                    <div class="modal-pos-product-info">
                                        <div class="d-flex align-items-center justify-content-between my-1">
                                            <span class="col-form-label">Tổng thanh toán</span>
                                            <span class="payment_total "></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-1">
                                            <span class="col-form-label">Khách đưa</span>
                                            <input type="text" style="text-align:end"
                                                class="customer-payment form-control w-120px fs-5"
                                                onkeyup="handleCalculate()">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-1">
                                            <span class="col-form-label">Tiền thừa</span>
                                            <span class="payment_change " data-value=""></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-1">
                                            <span class="col-form-label">Thanh toán bằng</span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                @if ($payment_method->count() > 0)
                                                    @foreach ($payment_method as $item)
                                                        <div class="p-2 me-2 ">
                                                            <input type="radio"
                                                                id="payment_method-{{ $item->id }}"
                                                                name="payment_method"
                                                                {{ $item->default == 'true' ? 'checked' : '' }}
                                                                value="{{ $item->id }}" class="form-check-input">
                                                            <label for="payment_method-{{ $item->id }}"
                                                                class="text-dark fw-bold">{{ $item->name }}</label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="me-3">
                                    <a href="#" class="btn btn-secondary text-light fw-semibold mb-0 d-block"
                                        data-bs-dismiss="modal">Thoát</a>
                                </div>
                                <div class="">
                                    <button type="submit"
                                        class="btn btn-payment btn-warning text-light fw-semibold  m-0">
                                        <i class="fas fa-dollar-sign"></i> Xác nhận
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- modal booking-->
            <div class="modal modal-pos fade" id="modal-add-booking">
                <div class="modal-dialog modal-md">
                    <form action="{{ route('sale.booking') }}" id="form-add-booking">
                        @csrf
                        <div class="modal-content border-0 ">
                            <div class="modal-header">
                                <h5 class="modal-title">Đặt bàn</h5>
                                <button type="button" class="btn-close close-product" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-pos-promotion modal-promotion">
                                <div class="modal-pos-product-info modal-body">
                                    <div class="form-group mb-2">
                                        <label for="" class="fw-semibold mb-2">Tên người đặt</label>
                                        <span class="text-danger"> *</span>
                                        <input type="text" class="form-control name-booking" name="name"
                                            required placeholder="Tên người đặt bàn">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label for="" class="fw-semibold mb-2">Số điện thoại</label>
                                                <span class="text-danger"> *</span>
                                                <input type="text" class="form-control phone-booking"
                                                    name="phone" required placeholder="0987 877 776">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label for="" class="fw-semibold mb-2">Số người</label>
                                                <span class="text-danger"> *</span>
                                                <input type="number" class="form-control quantity-booking"
                                                    name="quantity" required placeholder="Số người đến"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="fw-semibold mb-2">Ghi chú</label>
                                        <textarea name="note" class="form-control note-booking"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="me-3">
                                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block"
                                        data-bs-dismiss="modal">Thoát</a>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-booking btn-theme fw-semibold m-0">
                                        <i class="fas fa-calendar-alt"></i> Xác nhận
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <a href="#" class="pos-mobile-sidebar-toggler" data-toggle-class="pos-mobile-sidebar-toggled"
                data-toggle-target="#pos">
                <i class="fa fa-shopping-bag"></i>
                {{-- <span class="badge">{{ Cart::count()}}</span> --}}
            </a>
        </div>
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i
                    class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <ul class="theme-list clearfix">
                    <li><a href="javascript:;" class="bg-red" data-theme="theme-red" data-click="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Red" data-original-title="" title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-pink" data-theme="theme-pink" data-click="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Pink" data-original-title="" title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="theme-orange"
                            data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Orange" data-original-title=""
                            title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-yellow" data-theme="theme-yellow"
                            data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Yellow" data-original-title=""
                            title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-lime" data-theme="theme-lime" data-click="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Lime" data-original-title="" title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="theme-green" data-click="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Green" data-original-title="" title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-teal" data-theme="theme-teal" data-click="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Teal" data-original-title="" title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-cyan" data-theme="theme-cyan" data-click="theme-selector"
                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                            data-bs-title="Aqua" data-original-title="" title="">&nbsp;</a></li>
                    <li class="active"><a href="javascript:;" class="bg-blue" data-theme=""
                            data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Default" data-original-title=""
                            title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="theme-purple"
                            data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Purple" data-original-title=""
                            title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-indigo" data-theme="theme-indigo"
                            data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Indigo" data-original-title=""
                            title="">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-gray-600" data-theme="theme-gray-600"
                            data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-container="body" data-bs-title="Gray" data-original-title=""
                            title="">&nbsp;</a></li>
                </ul>
                <hr class="mb-0">
                <div class="row mt-10px pt-3px">
                    <div class="col-9 control-label text-body-emphasis fw-bold">
                        <div>Dark Mode <span
                                class="badge bg-theme text-theme-color ms-1 position-relative py-4px px-6px"
                                style="top: -1px">NEW</span></div>
                        <div class="lh-sm fs-13px fw-semibold">
                            <small class="text-body-emphasis opacity-50">
                                Adjust the appearance to reduce glare and give your eyes a break.
                            </small>
                        </div>
                    </div>
                    <div class="col-3 d-flex">
                        <div class="form-check form-switch ms-auto mb-0 mt-2px">
                            <input type="checkbox" class="form-check-input" name="app-theme-dark-mode"
                                id="appThemeDarkMode" value="1">
                            <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
    @include('Sale.home.script')
    @yield('script')
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('user/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{ asset('user/assets/js/custom/pages/general/pos.js') }}"></script> --}}
    <!-- ================== BEGIN core-js ================== -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- ================== END core-js ================== -->
    <!-- ================== BEGIN page-js ================== -->
    <script src="{{ asset('admin/assets/js/demo/pos-customer-order.demo.js') }}"></script>
    <!-- ================== END page-js ================== -->
</body>
<!--end::Body-->

</html>
