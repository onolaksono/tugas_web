<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets-admin/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @stack('styles')
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.navbar')

            <div class="main-content container-fluid">
                @yield('content')
            </div>

            @include('partials.footer')
        </div>
    </div>

    <script src="{{ asset('assets-admin/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/app.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>

</html>
