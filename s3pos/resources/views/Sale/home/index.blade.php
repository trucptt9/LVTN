<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title>TTPOS</title>
    <meta charset="utf-8" />


    <link href="{{ asset('admin/assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet">
    @yield('style')
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>


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
    <!-- BEGIN #app -->
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
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('images/TTPos.png') }}" alt="" height="50" width="50">
                                <div class="logo-text">Pine & Dine</div>
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
                    <!-- END pos-menu -->

                    <!-- BEGIN pos-content -->
                    <div class="pos-content">
                        <div class="pos-content-container h-100">
                            <div class="row gx-4 product">


                            </div>
                        </div>
                    </div>
                    <!-- END pos-content -->

                    <!-- BEGIN pos-sidebar -->
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
                                <div class="icon"><i class="fa fa-plate-wheat"></i></div>
                                <a class=" title table" href="{{ route('sale.table') }}">Bàn ...</a>
                                <div class="order small">Mã đơn hàng: <span class="fw-semibold">#0056</span></div>
                            </div>
                            <!-- END pos-sidebar-header -->

                            <!-- BEGIN pos-sidebar-nav -->
                            <div class="pos-sidebar-nav small">
                                <ul class="nav nav-tabs nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#" data-bs-toggle="tab"
                                            data-bs-target="#newOrderTab">Đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="tab"
                                            data-bs-target="#orderHistoryTab">Lịch sử đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END pos-sidebar-nav -->

                            <!-- BEGIN pos-sidebar-body -->
                            <div class="pos-sidebar-body tab-content" data-scrollbar="true" data-height="100%">
                                <!-- BEGIN #newOrderTab -->
                                <div class="tab-pane fade h-100 show active cart-product " id="newOrderTab">

                                </div>
                                <!-- END #orderHistoryTab -->

                                <!-- BEGIN #orderHistoryTab -->
                                <div class="tab-pane fade h-100" id="orderHistoryTab">
                                    <div
                                        class="h-100 d-flex align-items-center justify-content-center text-center p-20">
                                        <div>
                                            <div class="mb-3 mt-n5">
                                                <svg width="6em" height="6em" viewBox="0 0 16 16"
                                                    class="text-gray-300" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
                                                    <path
                                                        d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
                                                </svg>
                                            </div>
                                            <h5>No order history found</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- END #orderHistoryTab -->
                            </div>
                            <!-- END pos-sidebar-body -->

                            <!-- BEGIN pos-sidebar-footer -->
                            <div class="pos-sidebar-footer payment">
                                
                            </div>
                            <!-- END pos-sidebar-footer -->
                        </div>
                    </div>
                    <!-- END pos-sidebar -->
                </div>
            </div>
            <!-- END pos -->
            <div class="modal modal-pos fade" id="modalPosItem">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('sale.cart_insert') }}" type="POST" id="form-add-product">
                        @csrf
                        <div class="modal-content border-0 ">
                            <a href="#" data-bs-dismiss="modal"
                                class="btn-close close-product position-absolute top-0 end-0 m-4"></a>
                            <div class="modal-pos-product modal-order">

                            </div>
                            <hr class="opacity-1">
                            <div class="row my-3">
                                <div class="col-2">
                                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block"
                                        data-bs-dismiss="modal">Hủy</a>
                                </div>
                                <div class="col-8">
                                    <button type="submit" class="btn btn-add-product btn-theme fw-semibold  m-0">Thêm
                                        vào
                                        giỏ hàng</button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
            <!-- modal add table in order -->
            <div class="modal modal-pos fade" id="modalTable">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content border-0 modal-table">

                    </div>
                </div>
            </div>
            <!-- BEGIN pos-mobile-sidebar-toggler -->
            <a href="#" class="pos-mobile-sidebar-toggler" data-toggle-class="pos-mobile-sidebar-toggled"
                data-toggle-target="#pos">
                <i class="fa fa-shopping-bag"></i>
                <span class="badge">5</span>
            </a>
            <!-- END pos-mobile-sidebar-toggler -->
        </div>
        <!-- END #content -->

        <!-- BEGIN theme-panel -->
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
        <!-- END theme-panel -->
        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>

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
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/js/custom/pages/general/pos.js') }}"></script>
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
