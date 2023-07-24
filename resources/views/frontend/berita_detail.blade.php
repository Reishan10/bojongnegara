@extends('layouts.frontend_main')
@section('title', 'Berita')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@yield('title')</h2>
                    <ol>
                        <li><a href="{{ route('frontend.beranda.index') }}">Beranda</a></li>
                        <li><a href="{{ route('frontend.berita.index') }}">Berita</a></li>
                        <li>@yield('title')</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8">

                        <article class="blog-details">

                            <div class="post-img">
                                <img src="{{ asset('storage/thumbnail/' . $berita->image) }}"
                                    alt="Thumbnail - {{ $berita->title }}" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $berita->title }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="{{ route('frontend.berita.detail', $berita->slug) }}">{{ $berita->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('frontend.berita.detail', $berita->slug) }}">
                                            {{ $formattedDate = \Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('D MMMM Y') }}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="content">
                               {!! $berita->content !!}
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $berita->kategori->name }}</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">{{ $berita->tag }}</a></li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article><!-- End blog post -->
                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">Pencarian</h3>
                                <form action="" class="mt-3">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <div class="sidebar-item categories">
                                <h3 class="sidebar-title">Kategori</h3>
                                <ul class="mt-3">
                                    @forelse ($kategori as $row)
                                        <li><a href="#">{{ $row->name }}
                                                <span>({{ $row->berita_count }})</span></a></li>
                                    @empty
                                        <h3 class="text-center mt-4">Data tidak tersedia</h3>
                                    @endforelse
                                </ul>
                            </div><!-- End sidebar categories-->

                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Postingan Terbaru</h3>

                                @forelse ($berita_new as $row)
                                    <div class="mt-3">
                                        <div class="post-item mt-3">
                                            <img src="{{ asset('storage/thumbnail/' . $row->image) }}"
                                                alt="{{ $row->title }}" class="flex-shrink-0">
                                            <div>
                                                <h4><a href="{{ route('frontend.berita.detail', $row->slug) }}">{{ $row->title }}</a></h4>
                                                <time>
                                                    {{ $formattedDate = \Carbon\Carbon::parse($row->created_at)->locale('id')->isoFormat('D MMMM Y') }}</time>
                                            </div>
                                        </div><!-- End recent post item-->
                                    </div>
                                @empty
                                    <h3 class="text-center mt-4">Data tidak tersedia</h3>
                                @endforelse
                            </div><!-- End sidebar recent posts-->

                            <div class="sidebar-item tags">
                                <h3 class="sidebar-title">Tag</h3>
                                <ul class="mt-3">
                                    @forelse ($tag as $row)
                                        <li><a href="#">{{ $row->name }}</a></li>
                                    @empty
                                        <h3 class="text-center mt-4">Data tidak tersedia</h3>
                                    @endforelse
                                </ul>
                            </div><!-- End sidebar tags-->

                        </div><!-- End Blog Sidebar -->

                    </div>
                </div>

            </div>
        </section><!-- End Blog Details Section -->
    </main><!-- End #main -->
@endsection
