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

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Berita</h2>
                    <p>Berita terkini yang ada di Bojongnegara & sekitarnya</p>
                </div>

                <div class="row">
                    @forelse ($berita as $row)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ asset('storage/thumbnail/' . $row->image) }}"
                                        alt="Thumbnail - {{ $row->title }}" class="img-fluid"></div>
                                <div class="meta">
                                    <span
                                        class="post-date">{{ $formattedDate = \Carbon\Carbon::parse($row->created_at)->locale('id')->isoFormat('D MMMM Y') }}</span>
                                    <span class="post-author"> / {{ $row->user->name }}</span>
                                </div>
                                <h3 class="post-title">{{ $row->title }}</h3>
                                {!! \Illuminate\Support\Str::limit(
                                    strip_tags(htmlspecialchars_decode($row->content)),
                                    $limit = 200,
                                    $end = '...',
                                ) !!}
                                <a href="{{ route('frontend.berita.detail', $row->slug) }}"
                                    class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center mt-4">Data tidak tersedia</h3>
                    @endforelse
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
                        <form id="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        name="name" placeholder="Nama lengkap">
                                    <div class="errorName invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="number" class="form-control" name="no_telepon" id="no_telepon"
                                        placeholder="No telepon">
                                    <div class="errorNoTelepon invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject">
                                <div class="errorSubject invalid-feedback"></div>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="pesan" id="pesan" placeholder="Pesan"></textarea>
                                <div class="errorPesan invalid-feedback"></div>
                            </div>
                            <div class="text-center"><button type="submit" id="kirim">Kirim Pesan</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('frontend.kontak.store') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#kirim').attr('disabled', 'disabled');
                        $('#kirim').text('Proses...');
                    },
                    complete: function() {
                        $('#kirim').removeAttr('disabled');
                        $('#kirim').html('Kirim Pesan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(response.errors.name);
                            } else {
                                $('#name').removeClass('is-invalid');
                                $('.errorName').html('');
                            }

                            if (response.errors.no_telepon) {
                                $('#no_telepon').addClass('is-invalid');
                                $('.errorNoTelepon').html(response.errors.no_telepon);
                            } else {
                                $('#no_telepon').removeClass('is-invalid');
                                $('.errorNoTelepon').html('');
                            }

                            if (response.errors.subject) {
                                $('#subject').addClass('is-invalid');
                                $('.errorSubject').html(response.errors.subject);
                            } else {
                                $('#subject').removeClass('is-invalid');
                                $('.errorSubject').html('');
                            }

                            if (response.errors.pesan) {
                                $('#pesan').addClass('is-invalid');
                                $('.errorPesan').html(response.errors.pesan);
                            } else {
                                $('#pesan').removeClass('is-invalid');
                                $('.errorPesan').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil kirim',
                            }).then(function() {
                                top.location.href =
                                    "{{ route('frontend.beranda.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
