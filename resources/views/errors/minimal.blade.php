<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title') - Bojongnegara</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body class="error-page">
    @yield('content')
    <script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets') }}/js/feather.min.js"></script>

    <script src="{{ asset('assets') }}/js/script.js"></script>
</body>

</html>
