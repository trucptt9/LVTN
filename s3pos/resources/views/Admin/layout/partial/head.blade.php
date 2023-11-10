<meta charset="utf-8" />
<title>{{ get_option_admin('short-name') }} | @yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<<<<<<< HEAD
<link rel="icon" href="{{ show_s3_file(get_option_admin('app-favicon')) }}">
=======
<link rel="icon" href="{{ asset(get_option_admin('app-favicon')) }}">
>>>>>>> 33dc2908c96ac78ce7f9e0f86e699d7dac34b851

<meta name="viewport" content="width=device-width, initial-scale=1" />

@stack('metaTag')

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="{{ asset('admin/assets/css/vendor.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" />
<!-- ================== END BASE CSS STYLE ================== -->
<link href="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet">
@stack('css')
<style>
    #content,
    .app-sidebar-content {
        background: #fff !important;
    }

    .card-header-actions .card-header {
        height: 3.5625rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.5625rem;
        padding-bottom: 0.5625rem;
    }

    .menu-link.active {
        background: var(--bs-app-sidebar-menu-link-hover-bg) !important;
    }

    .table td {
        font-weight: 350 !important;
    }

    .app-content {
        padding: 0.75rem 1rem !important;
    }

    .sniper-content {
        position: absolute;
        top: 50%;
        right: 50%;
    }

    .brand-logo {
        height: 80px !important;
    }
</style>
