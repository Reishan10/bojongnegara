@extends('layouts.frontend_main')
@section('title', 'Layanan')
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
        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4">

                    <div
                        class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content px-xl-5 text-center">
                            <h3>Layanan desa <strong>Bojongnegara</strong></h3>
                        </div>

                        @forelse ($layanan as $row)
                            <div class="accordion accordion-flush px-xl-5" id="faqlist-{{ $row->id }}">
                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-content-{{ $row->id }}">
                                            <i class="bi bi-question-circle question-icon"></i>
                                            {{ $row->name }}
                                        </button>
                                    </h3>
                                    <div id="faq-content-{{ $row->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqlist-{{ $row->id }}">
                                        <div class="accordion-body">
                                            {!! $row->deskripsi !!}
                                        </div>
                                    </div>
                                </div><!-- # Faq item-->
                            </div>
                        @empty
                            <h3 class="text-center mt-4">Data tidak tersedia</h3>
                        @endforelse
                    </div>
                </div>
        </section><!-- End F.A.Q Section -->
    </main><!-- End #main -->
@endsection
