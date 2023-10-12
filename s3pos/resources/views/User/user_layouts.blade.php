<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TTPOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">
    <link rel="stylesheet" href="{{ asset('css/newcustom.css') }}">
    <!-- App css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>`
    
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">



                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="fa-solid fa-bell"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1
                                        min ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                <p class="notify-details">New user registered.<small class="text-muted">5 hours
                                        ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3
                                        days ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4
                                        days ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);"
                            class="dropdown-item text-primary text-center notify-item notify-all ">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa-regular fa-circle-user fa-xl"></i>
                        <span class="pro-user-name ml-1">
                            Maxine K <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Chào mừng tên user !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span><i class="fa-regular fa-user"></i> Tài khoản</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất </span>
                        </a>

                        <!-- item-->
                       

                        {{-- <div class="dropdown-divider"></div> --}}

                        <!-- item-->
                       

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li>


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets\images\logo-dark.png" alt="" height="26">
                        <!-- <span class="logo-lg-text-dark">Simple</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">S</span> -->
                        <img src="assets\images\logo-sm.png" alt="" height="22">
                    </span>
                </a>

                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets\images\logo-light.png" alt="" height="26">
                        <!-- <span class="logo-lg-text-light">Simple</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-light">S</span> -->
                        <img src="assets\images\logo-sm.png" alt="" height="22">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                {{-- <li>
                    <button class="button-menu-mobile">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li> --}}

                <li class="d-none d-sm-block" style="float: right">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">




            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">



                    <li>
                        <a href="index.html">
                            <i class="fa-solid fa-gauge-high" style="color: #323940;"></i>
                            <span> Trang chủ </span>
                        </a>
                    </li>



                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-solid fa-house" style="color: #323940;"></i>
                            <span> Quản lý cửa hàng </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('brand.stores') }}">Danh sách cửa hàng</a></li>
                            <li><a href="#">Danh sách khu vực</a></li>
                            <li><a href="#">Danh sách kênh bán hàng</a></li>
                            <li><a href="{{ route('brand.detail') }}">Thông tin nhãn hàng</a></li>
                        </ul>
                    </li>



                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-regular fa-user" style="color: #323940;"></i>
                            <span> Quản lý nhân viên </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="forms-general.html">Danh sách nhân viên</a></li>
                            <li><a href="forms-advanced.html">Phòng ban</a></li>
                            <li><a href="forms-general.html">Ca làm việc</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-solid fa-user-tag" style="color: #323940;"></i>
                            <span> Quản lý khách hàng </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="#">Danh sách khách hàng</a></li>
                            <li><a href="#">Loại thẻ thành viên</a></li>
                            <li><a href="#">Chương trình khuyến mãi</a></li>
                            <li><a href="#">Danh sách vouchers</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-solid fa-layer-group" style="color: #323940;"> </i>
                            <span> Quản lý thực đơn </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="#">Danh mục món</a></li>
                            <li><a href="#">Danh sách món</a></li>
                            <li><a href="#">Danh mục topping</a></li>
                            <li><a href="#">Danh sách topping</a></li>
                            <li><a href="#">Thiết lập menu</a></li>
                            <li><a href="#">Danh sách đơn vị</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-solid fa-sack-dollar" style="color: #323940;"></i>
                            <span> Quản lý chi phí </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="#">Phương thức thanh toán</a></li>
                            <li><a href="#">Danh sách chi phí</a></li>
                            <li><a href="#">Lịch sử than toán</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-solid fa-warehouse" style="color: #323940;"></i>
                            <span> Quản lý kho </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="#">Quản lý nhập kho</a></li>
                            <li><a href="#">Quản lý xuất kho</a></li>
                            <li><a href="#">Quản lý hàng tồn</a></li>
                            <li><a href="#">Danh sách nhà cung cấp</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa-solid fa-chart-line" style="color: #323940;"></i>
                            <span>Báo cáo</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="#">Báo cáo doanh thu</a>
                            </li>
                            <li>
                                <a href="#">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="#">Báo cáo nhập kho</a>
                            </li>
                            <li>
                                <a href="#">Báo cáo xuất kho</a>
                            </li>
                            <li>
                                <a href="#">Báo cáo hàng tồn</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-gear" style="color: #323940;"></i>
                            <span>Quản lý khác </span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>


        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
           
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Quản lý cửa hàng</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Chuỗi cửa hàng</li>
                    </ol>
                  </nav>
            
            <div class="content">

                <!-- Start container-fluid -->
                <div class="contain-fluid">
                    
                    
                        @yield('content')
                    
                   
                </div>
                <!-- end container-fluid -->



                <!-- Footer Start -->
                <footer class="footer">

                </footer>
                <!-- end Footer -->

            </div>
            <!-- end content -->

        </div>
        <!-- END content-page -->

    </div>
    <!-- END wrapper -->







    
    <script src="{{ asset('js\vendor.min.js') }}"></script>
    <script src="{{ asset('js\app.min.js') }}"></script>
    <script>
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
                            });
    </script>
  

</body>

</html>
