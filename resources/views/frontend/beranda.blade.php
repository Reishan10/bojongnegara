@extends('layouts.frontend_main')
@section('title', 'Beranda')
@section('content')
    <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
            <h2>Selamat datang di <span>Bojongnegara</span></h2>
            <p>Menghubungkan, Membangun, Mensejahterakan</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Tentang</a>
            </div>
        </div>
    </section>

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Tentang</h2>
                    <!-- <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas
                asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p> -->
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{ asset('assets') }}/img/about.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5">Tentang website Bojongnegara</h3>

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">

                                <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde rem
                                    pariatur quia, in itaque consectetur beatae autem eaque asperiores cupiditate qui
                                    quisquam velit adipisci enim numquam earum assumenda dolor! Recusandae?</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Website Desa Bojongnegara sebagai sarana komunikasi antara pemerintah desa dan
                                        masyarakat </h4>
                                </div>
                                <p>Warga desa dapat mengajukan pertanyaan, memberikan masukan, atau melaporkan
                                    permasalahan melalui fitur kontak yang tersedia.
                                    Dengan demikian, partisipasi aktif masyarakat dalam pengambilan keputusan dan
                                    pengawasan pemerintahan desa dapat terwujud.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Website Desa Bojongnegara menjadi wadah untuk mempromosikan potensi desa kepada
                                        masyarakat di luar wilayah</h4>
                                </div>
                                <p>Informasi mengenai pariwisata, produk lokal, kegiatan budaya, dan potensi investasi
                                    dapat diunggah dan dibagikan kepada
                                    masyarakat luas melalui platform ini. Hal ini membuka peluang baru bagi desa untuk
                                    meningkatkan pertumbuhan ekonomi dan kerja
                                    sama dengan pihak luar.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Website Desa Bojongnegara menyajikan agenda kegiatan desa</h4>
                                </div>
                                <p>seperti pertemuan masyarakat, sosialisasi program, atau acara khusus lainnya. Selain
                                    itu, informasi tentang layanan publik,
                                    seperti layanan kependudukan, kesehatan, pendidikan, dan infrastruktur juga tersedia
                                    secara lengkap. Hal ini memudahkan warga
                                    desa untuk mendapatkan informasi yang mereka butuhkan tanpa harus datang langsung ke
                                    kantor desa.</p>

                            </div><!-- End Tab 1 Content -->

                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">
                    <div class="col-lg-6 video-play position-relative">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <h3>Sejarah Desa Bojongnegara</h3>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore
                                magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex harum earum
                                laborum minus, cumque, dolore eius voluptates non libero doloribus officiis! Voluptatum
                                accusamus officiis excepturi voluptate, alias fugiat quis numquam?
                                <br><br><a href="#" class="read-more align-self-start"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End On Focus Section -->


        <!-- ======= Call To Action Section ======= -->
        <section id="cta" class="cta mt-5">
            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div
                        class="col-lg-12 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3>Visi & <em>Misi</em></h3>
                        <hr>
                        <h4><strong>Visi</strong></h4>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus harum deserunt,
                            reprehenderit quos qui blanditiis consequuntur facere dolore consequatur saepe assumenda
                            explicabo autem
                            quidem placeat culpa, accusantium quaerat, aliquam voluptatum.</p>
                        <h4><strong>Misi</strong></h4>
                        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ad distinctio eveniet
                            eaque
                            dolore! Vitae ipsam qui quam eligendi dicta dolorum quidem distinctio, delectus aliquam quo
                            consequuntur
                            eius maiores in.</p>
                    </div>
                </div>

            </div>
        </section><!-- End Call To Action Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4">

                    <div
                        class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

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
        </section><!-- End F.A.Q Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Berita</h2>
                    <p>Berita terkini yang ada di Bojongnegara & sekitarnya</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets') }}/img/blog/blog-1.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="meta">
                                <span class="post-date">Tue, December 12</span>
                                <span class="post-author"> / Julia Parker</span>
                            </div>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur
                                sit</h3>
                            <p>Illum voluptas ab enim placeat. Adipisci enim velit nulla. Vel omnis laudantium.
                                Asperiores eum ipsa
                                est officiis. Modi cupiditate exercitationem qui magni est...</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets') }}/img/blog/blog-2.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="meta">
                                <span class="post-date">Fri, September 05</span>
                                <span class="post-author"> / Mario Douglas</span>
                            </div>
                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                            <p>Voluptatem nesciunt omnis libero autem tempora enim ut ipsam id. Odit quia ab eum
                                assumenda. Quisquam
                                omnis aliquid necessitatibus tempora consectetur doloribus...</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets') }}/img/blog/blog-3.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="meta">
                                <span class="post-date">Tue, July 27</span>
                                <span class="post-author"> / Lisa Hunter</span>
                            </div>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <p>Quia nam eaque omnis explicabo similique eum quaerat similique laboriosam. Quis omnis
                                repellat sed quae
                                consectetur magnam veritatis dicta nihil...</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    <h2>Kontak Kami</h2>
                </div>

            </div>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.950518114347!2d108.75327416941712!3d-6.896522152218475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0889b0269421%3A0x1e6587a7c04d0de!2sKantor%20Kuwu%20Desa%20Bojongnegara!5e0!3m2!1sid!2sid!4v1689255071874!5m2!1sid!2sid"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            <h3>Kontak Kami</h3>
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Lokasi:</h4>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>info@example.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>No Telepon:</h4>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
