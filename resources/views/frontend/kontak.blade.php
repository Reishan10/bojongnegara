@extends('layouts.frontend_main')
@section('title', 'Kontak')
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
                                    <input type="text" name="name" class="form-control" id="name" name="name"
                                        placeholder="Nama lengkap">
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
                                    "{{ route('frontend.kontak.index') }}";
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
