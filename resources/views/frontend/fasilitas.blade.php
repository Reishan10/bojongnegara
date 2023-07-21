@extends('layouts.frontend_main')
@section('title', 'Fasilitas')
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
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Fasilitas</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere tenetur corporis accusantium
                        expedita eos aliquam inventore, magni deserunt soluta commodi possimus delectus aspernatur quod
                        porro deleniti doloremque. Voluptatum, quas vero?</p>
                </div>

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="assets/img/services-1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-activity"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Kantor Desa</h3>
                                </a>
                                <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores
                                    iure perferendis.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item">
                            <div class="img">
                                <img src="assets/img/services-2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-broadcast"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Balai Desa</h3>
                                </a>
                                <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum
                                    hic non ut nesciunt dolorem.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item">
                            <div class="img">
                                <img src="assets/img/services-3.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-easel"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Puskesdes</h3>
                                </a>
                                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                    voluptas adipisci eos earum corrupti.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item">
                            <div class="img">
                                <img src="assets/img/services-4.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-bounding-box-circles"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Sekolah Dasar</h3>
                                </a>
                                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga
                                    sit provident adipisci neque.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                        <div class="service-item">
                            <div class="img">
                                <img src="assets/img/services-5.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-calendar4-week"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Tempat Ibadah</h3>
                                </a>
                                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed
                                    animi at autem alias eius labore.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="700">
                        <div class="service-item">
                            <div class="img">
                                <img src="assets/img/services-6.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Lapangan Olahraga</h3>
                                </a>
                                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                                    Corrupti recusandae ducimus enim.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- End Services Section -->
    </main><!-- End #main -->
@endsection
