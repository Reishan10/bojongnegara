<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - Bojongnegara</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}">
    <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('assets') }}/css/variables.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets') }}/css/main.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="{{ route('frontend.beranda.index') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-5">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}" alt="">
                {{-- <h1>Bojongnegara<span>.</span></h1> --}}
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('frontend.beranda.index') }}">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Informasi</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ route('frontend.strukturOrganisasi.index') }}">Struktur Organisasi</a></li>
                            <li><a href="{{ route('frontend.fasilitas.index') }}">Fasilitas</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="{{ route('frontend.layanan.index') }}">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('frontend.berita.index') }}">Berita</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('frontend.kontak.index') }}">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

   @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="footer-info">
                            <h3>Bojongnegara</h3>
                            <p>
                                A108 Adam Street <br>
                                NY 535022, USA<br><br>
                                <strong>No Telepon:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Informasi</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('frontend.strukturOrganisasi.index') }}">Struktur Organisasi</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('frontend.fasilitas.index') }}">Fasilitas</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Umum</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('frontend.layanan.index') }}">Layanan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('frontend.berita.index') }}">Berita</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('frontend.kontak.index') }}">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Bojongnegara</span></strong>. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

</body>

</html>
