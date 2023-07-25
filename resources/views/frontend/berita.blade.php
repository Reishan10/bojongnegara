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
                        <li>@yield('title')</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8">

                        <div class="row gy-4 posts-list">

                            @forelse ($berita as $row)
                                <div class="col-lg-12">
                                    <article class="d-flex flex-column">

                                        <div class="post-img">
                                            <img src="{{ asset('storage/thumbnail/' . $row->image) }}"
                                                alt="Thumbnail - {{ $row->title }}" class="img-fluid">
                                        </div>

                                        <h2 class="title">
                                            <a
                                                href="{{ route('frontend.berita.detail', $row->slug) }}">{{ $row->title }}</a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="{{ route('frontend.berita.detail', $row->slug) }}">{{ $row->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="{{ route('frontend.berita.detail', $row->slug) }}">
                                                        {{ $formattedDate = \Carbon\Carbon::parse($row->created_at)->locale('id')->isoFormat('D MMMM Y') }}</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                                {!! \Illuminate\Support\Str::limit(
                                                    strip_tags(htmlspecialchars_decode($row->content)),
                                                    $limit = 200,
                                                    $end = '...',
                                                ) !!}
                                        </div>

                                        <div class="read-more mt-auto align-self-end">
                                            <a href="{{ route('frontend.berita.detail', $row->slug) }}">Baca
                                                Selengkapnya</a>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @empty
                                <h3 class="text-center mt-4">Data tidak tersedia</h3>
                            @endforelse

                        </div><!-- End blog posts list -->

                        @if ($berita->lastPage() > 1)
                            <div class="blog-pagination">
                                <ul class="justify-content-center">
                                    {{-- Tombol "Previous" --}}
                                    @if ($berita->currentPage() > 1)
                                        <li><a href="{{ $berita->previousPageUrl() }}">&laquo;</a></li>
                                    @else
                                        <li class="disabled"><a href="#">&laquo;</a></li>
                                    @endif

                                    {{-- Tombol halaman --}}
                                    @for ($i = 1; $i <= $berita->lastPage(); $i++)
                                        @if ($i === $berita->currentPage())
                                            <li class="active"><a href="#">{{ $i }}</a></li>
                                        @else
                                            <li><a href="{{ $berita->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                    @endfor

                                    {{-- Tombol "Next" --}}
                                    @if ($berita->currentPage() < $berita->lastPage())
                                        <li><a href="{{ $berita->nextPageUrl() }}">&raquo;</a></li>
                                    @else
                                        <li class="disabled"><a href="#">&raquo;</a></li>
                                    @endif
                                </ul>
                            </div><!-- End blog pagination -->
                        @endif

                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">Pencarian</h3>
                                <form action="{{ route('frontend.berita.search') }}" method="GET" class="mt-3">
                                    <input type="text" name="keyword" placeholder="Cari berita...">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <!-- Tampilkan daftar kategori -->
                            <div class="sidebar-item categories">
                                <h3 class="sidebar-title">Kategori</h3>
                                <ul class="mt-3">
                                    @forelse ($kategori as $row)
                                        <li><a href="{{ route('frontend.berita.kategori', ['kategori' => $row->slug]) }}">{{ $row->name }}
                                                <span>({{ $row->berita_count }})</span>
                                            </a>
                                        </li>
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
                                        <li><a
                                                href="{{ route('frontend.berita.tag',  ['tag' => $row->name]) }}">{{ $row->name }}</a>
                                        </li>
                                    @empty
                                        <h3 class="text-center mt-4">Data tidak tersedia</h3>
                                    @endforelse
                                </ul>
                            </div><!-- End sidebar tags -->

                        </div><!-- End Blog Sidebar -->

                    </div>

                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->
@endsection
