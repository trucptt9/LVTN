<!-- BEGIN #header -->
<div id="header" class="app-header">
    <!-- BEGIN mobile-toggler -->
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler"
            @if (!empty($appTopNav) && !empty($appSidebarHide)) data-toggle="top-nav-mobile" @else data-toggle="sidebar-mobile" @endif>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <!-- END mobile-toggler -->

    <!-- BEGIN brand -->
    <div class="brand">
        <div class="desktop-toggler">
            <button type="button" class="menu-toggler"
                @if (empty($appSidebarHide)) data-toggle="sidebar-minify" @endif>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>

        <a href="{{ route('admin.index') }}" class="brand-logo">
            <img src="{{ show_s3_file(get_option_admin('app-logo')) }}" class="invert-dark" alt=""
                style="border-radius: 6px;" />
        </a>
    </div>
    <!-- END brand -->

    <!-- BEGIN menu -->
    <div class="menu">
        <form class="menu-search" method="POST" name="header_search_form">
            <div class="menu-search-icon"><i class="fa fa-search"></i></div>
            <div class="menu-search-input">
                <input type="text" class="form-control" placeholder="Search menu..." />
            </div>
        </form>
        <div class="menu-item dropdown">
            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="menu-img online">
                    <img src="{{ $admin_staff->avatar ?? asset('images/user.jpg') }}" alt=""
                        class="ms-100 mh-100 rounded-circle" />
                </div>
                <div class="menu-text">
                    Quản trị viên
                    <div class="text-wrap text-body-secondary fs-6 st-italic">
                        {{ $admin_staff->name }}
                    </div>
                </div>
                <div class="menu-img online">
                    <img src="{{ $admin_staff->avatar ?? show_s3_file(get_option_admin('app-favicon')) }}"
                        alt="" class="ms-100 mh-100 rounded-circle" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-lg-3">
                <a class="dropdown-item d-flex align-items-center"
                    href="{{ route('admin.admin.detail', ['id' => $admin_staff->id]) }}">
                    Cá nhân
                    <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i>
                </a>
                <button class="dropdown-item d-flex align-items-center" onclick="confirmLogout()">
                    Đăng xuất
                    <i class="fas fa-sign-out-alt fa-fw ms-auto text-body text-opacity-50"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- END menu -->
</div>
<!-- END #header -->
