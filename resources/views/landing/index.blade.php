<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Prodelphus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('landing/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('landing/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('landing/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    @stack('styles')
</head>

<body id="top">

    @yield('landing')

    <script src="{{ asset('landing/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script src="{{ asset('landing/js/modernizr.js') }}"></script>
    <script src="{{ asset('landing/js/pace.min.js') }}"></script>
    @stack('scripts')

</body>

</html>
