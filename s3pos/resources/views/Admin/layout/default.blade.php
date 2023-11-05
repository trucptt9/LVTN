<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"{{ !empty($htmlAttribute) ? $htmlAttribute : '' }}>

<head>
    @include('Admin.layout.partial.head')
</head>

<body class="{{ !empty($bodyClass) ? $bodyClass : '' }}">
    <!-- BEGIN #app -->
    <div id="app" class="app {{ !empty($appClass) ? $appClass : '' }}">
        @includeWhen(empty($appHeaderHide), 'Admin.layout.partial.header')
        @includeWhen(empty($appSidebarHide), 'Admin.layout.partial.sidebar')

        @if (empty($appContentHide))
            <!-- BEGIN #content -->
            <div id="content" class="app-content  {{ !empty($appContentClass) ? $appContentClass : '' }}">
                @yield('content')
            </div>
            <!-- END #content -->
        @else
            @yield('content')
        @endif

        @includeWhen(!empty($appFooter), 'Admin.layout.partial.footer')
    </div>
    <!-- END #app -->

    @include('Admin.layout.partial.scroll-top-btn')
    @include('Admin.layout.partial.scripts')
</body>

</html>
