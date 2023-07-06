<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Bojongnegara - @yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="assets/img/logo/LOGO-KABUPATEN-CIREBON.png" alt="Logo"
                    width="80">
                <div class="loginbox">
                    <div class="login-right">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets') }}/js/feather.min.js"></script>

    <script src="{{ asset('assets') }}/js/script.js"></script>
</body>

</html>
