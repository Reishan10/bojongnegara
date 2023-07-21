@extends('layouts.frontend_main')
@section('title', 'Struktur Organisasi')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@yield('title')</h2>
                    <ol>
                        <li><a href="{{ route('frontend.beranda.index') }}">Beranda</a></li>
                        <li>@yield('title')</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section class="inner-page">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Struktru Organisasi</h2>
                    <p>Example inner page template</p>
                </div>

                <p>
                   <img src="{{ asset('assets/img/bagan-2023.png') }}" alt="Struktur Organisasi 2023" style="width: 100%;">
                </p>

            </div>
        </section><!-- End Inner Page -->

    </main><!-- End #main -->
@endsection
