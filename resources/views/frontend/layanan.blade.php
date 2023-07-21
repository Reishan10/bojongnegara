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
                    <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                        <div class="content px-xl-5 text-center">
                            <h3>Layanan desa <strong>Bojongnegara</strong></h3>
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Layanan Administrasi Desa
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, impedit debitis
                                        consequatur dolorem, ab doloremque consequuntur aliquid harum quibusdam libero
                                        voluptas pariatur dignissimos? Modi perspiciatis facere, iusto iste odit
                                        eligendi?
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-2">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Layanan Informasi Umum Desa
                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat soluta
                                        temporibus tempora sint dolore qui quasi corporis minima quos rerum veritatis,
                                        aperiam ab, similique repellendus cumque sed unde dolorem? Nihil?
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-3">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Layanan Kependudukan Desa
                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, molestiae
                                        rem. Quo voluptatibus illo est. Sapiente aliquam voluptates architecto
                                        accusantium, cum repellendus pariatur, ullam laboriosam dolores, ratione iure.
                                        Omnis, quae!
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End F.A.Q Section -->
    </main><!-- End #main -->
@endsection
