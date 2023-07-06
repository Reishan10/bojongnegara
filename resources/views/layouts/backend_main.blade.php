<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <title>Bojongnegara - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/feather.css">

    <script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables/datatables.min.js"></script>
</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
    <div class="main-wrapper">
        @include('layouts.backend_header')
        @include('layouts.backend_sidebar')

        @yield('content')
    </div>

    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.querySelector("body").classList.add("loaded");
            }, 3)
        });
    </script>
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/feather.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/apexchart/chart-data.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('assets') }}/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
