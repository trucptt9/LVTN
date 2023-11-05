<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"{{ !empty($htmlAttribute) ? $htmlAttribute : '' }}>

<head>
    @include('Admin.layout.partial.head')
</head>

<body class="{{ !empty($bodyClass) ? $bodyClass : '' }}">
    @yield('content')

    @include('Admin.layout.partial.scroll-top-btn')
    @include('Admin.layout.partial.scripts')
</body>

</html>
