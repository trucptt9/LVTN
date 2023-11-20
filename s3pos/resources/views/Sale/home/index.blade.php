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
                        <!-- END logo -->
                        <!-- BEGIN nav-container -->
                        <div class="nav-container">
                            <div class="h-100" data-scrollbar="true" data-skip-mobile="true">
                                <ul class="nav nav-tabs category_product">

                                </ul>
                            </div>
                        </div>
                        <!-- END nav-container -->
                    </div>
                    <div class="pos-content">
                        <div class="pos-content-container h-100">
                            <div class="row gx-4 product">


                            </div>
                        </div>
                    </div>

                    <div class="pos-sidebar" id="pos-sidebar">
                        <div class="h-100 d-flex flex-column p-0">

                            <!-- BEGIN pos-sidebar-header -->
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
                                    <input type="hidden" name="table" value="{{ $table->id }}" id=""
                                        class="table">


                                </a>
                                <div class="order small me-5"><i class="fas fa-clock"></i> <span id="clock"
                                        class="fw-semibold"></span>
                                </div>
                                <span class="info-table">
                                    <button class="btn btn-warning btn-sm btn-booking">Đặt trước</button>
                                </span>
                            </div>

                            <div class="pos-sidebar-nav small">
                                <ul class="nav nav-tabs nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#" data-bs-toggle="tab"
                                            data-bs-target="#newOrderTab">Giỏ hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab"
                                            data-bs-target="#customer">Khách hàng</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="pos-sidebar-body tab-content" data-scrollbar="true" data-height="100%">
                                <div class="tab-pane fade h-100 show active cart-product " id="newOrderTab">
                                   
                                </div>
                                <div class="tab-pane fade h-100 py-1" id="customer">

                                    <div class="d-flex align-items-center my-3 px-3">
                                        <input type="text" class="form-control phone"
                                            placeholder="Nhập số điện thoại" name="phone">
                                        <button class="btn btn-primary btn-search-customer">Tìm</button>
                                    </div>
                                    <p class="customer-info px-3 fw-bold" data-value=""></p>
                                    <input type="hidden" name="" class="customer_name" value="">

                                </div>
                            </div>
                            <div class="pos-sidebar-footer payment">
                                @include('Sale.home.payment')
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            {{-- modal add product in cart --}}
            <div class="modal modal-pos fade" id="modalPosItem">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('sale.cart_insert',$table->id) }}" type="POST" id="form-add-product">
                        @csrf
                        <div class="modal-content border-0 ">
                            <a href="#" data-bs-dismiss="modal"
                                class="btn-close close-product position-absolute top-0 end-0 m-4"></a>
                            <div class="modal-pos-product modal-order">

                            </div>
                            <hr class="opacity-1">
                            <div class="row mx-2 pb-3">
                                <div class="col-2">
                                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block"
                                        data-bs-dismiss="modal">Thoát</a>
                                </div>
                                <div class="col-8">
                                    <button type="submit" class="btn btn-add-product btn-theme fw-semibold  m-0">
                                        Thêm vào giỏ hàng
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
                    @csrf
                    <div class="modal-content border-0 ">
                        <a href="#" data-bs-dismiss="modal"
                            class="btn-close close-product position-absolute top-0 end-0 m-4"></a>
                        <div class="modal-pos-promotion modal-promotion">
                            <div class="modal-header title text-uppercase fw-bold">Khuyến mãi</div>
                            <div class="modal-pos-product-info px-5 mb-3"
                                style="width:100% ; flex:0 0 100%;max-width:100%">
                                <div class="d-flex align-items-center my-3">
                                    <input type="text" class="form-control search" placeholder="Nhập mã"
                                        name="search">
                                    <input type="hidden" name="total"
                                        value="{{ Cart::total() + $total_topping }}" id="">
                                </div>
                                <p class="promotion-none small text-center"></p>
                            </div>
                        </div>
                        <hr class="opacity-1">
                        <div class="row mx-2 pb-3">
                            <div class="col-2">
                                <a href="#" class="btn btn-default fw-semibold mb-0 d-block"
                                    data-bs-dismiss="modal">Thoát</a>
                            </div>
                            <div class="col-8">
                                <button type="submit" class="btn btn-add-promtotion btn-theme fw-semibold  m-0">
                                    Xác nhận
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- modal add payment-->
            <div class="modal modal-pos fade" id="modal_payment">
                <div class="modal-dialog modal-md">
                    @csrf
                    <div class="modal-content border-0" style="background:#7abb8e">
                        {{-- <a href="#" data-bs-dismiss="modal"
                            class="btn-close close-product position-absolute top-0 end-0 m-4"></a> --}}
                        <div class="modal-pos-promotion modal-promotion">
                            {{-- <div class="modal-header title text-uppercase fw-bold">Thanh toán</div> --}}
                            <div class="modal-pos-product-info px-5 py-3 mb-3"
                                style="width:100% ; flex:0 0 100%;max-width:100%">

                                @csrf
                                <div class="d-flex align-items-center justify-content-between my-3">
                                    <span class="fw-bold fs-5 text-light">Tổng thanh toán</span>
                                    <span class="payment_total fs-5 text-light"></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-3">
                                    <span class="fw-bold fs-5 text-light">Khách đưa</span>
                                    <input type="text" name="" id=""
                                        class="customer-payment form-control w-50" onkeyup="handleCalculate()">
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-3">
                                    <span class="fw-bold fs-5 text-light">Tiền thừa</span>
                                    <span class="payment_change fs-5 text-light" data-value=""></span>

                                </div>
                                <div class="d-flex align-items-center justify-content-between my-3">
                                    <span class="fw-bold fs-5 text-light">Thanh toán bằng</span>
                                    <div class="d-flex align-items-center justify-content-between">
                                        @if ($payment_method->count() > 0)
                                            @foreach ($payment_method as $item)
                                                <div class="p-2 me-2 ">
                                                    <input type="radio" name="payment_method"
                                                        {{ $item->default === true ? 'checked' : '' }}
                                                        value="{{ $item->id }}" class="form-check-input">
                                                    <label for=""
                                                        class="text-dark fw-bold">{{ $item->name }}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="opacity-1">
                        <div class="d-flex justify-content-center mx-2 pb-3">
                            <div class="me-3">
                                <a href="#" class="btn text-light fw-semibold mb-0 d-block"
                                    data-bs-dismiss="modal" style="background: #464b55">Thoát</a>
                            </div>
                            <div class="">
                                <button type=""
                                    class="btn btn-payment btn-warning text-light fw-semibold  m-0">
                                    Xác nhận
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <a href="#" class="pos-mobile-sidebar-toggler" data-toggle-class="pos-mobile-sidebar-toggled"
                data-toggle-target="#pos">
                <i class="fa fa-shopping-bag"></i>
                <span class="badge">5</span>
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
