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
                                            <a href="blog-details.html">{{ $row->title }}</a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $row->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html">
                                                        {{ $formattedDate = \Carbon\Carbon::parse($row->created_at)->locale('id')->isoFormat('D MMMM Y') }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                        href="blog-details.html">12 Comments</a></li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p>
                                                {!! \Illuminate\Support\Str::limit(
                                                    strip_tags(htmlspecialchars_decode($row->content)),
                                                    $limit = 150,
                                                    $end = '...',
                                                ) !!}
                                            </p>
                                        </div>

                                        <div class="read-more mt-auto align-self-end">
                                            <a href="blog-details.html">Baca Selengkapnya</a>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @empty
                                <h3 class="text-center mt-4">Data tidak tersedia</h3>
                            @endforelse

                        </div><!-- End blog posts list -->

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div><!-- End blog pagination -->

                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">Search</h3>
                                <form action="" class="mt-3">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <div class="sidebar-item categories">
                                <h3 class="sidebar-title">Kategori</h3>
                                <ul class="mt-3">
                                    @forelse ($kategori as $row)
                                        <li><a href="#">{{ $row->name }} <span>(25)</span></a></li>
                                    @empty
                                        <h3 class="text-center mt-4">Data tidak tersedia</h3>
                                    @endforelse
                                </ul>
                            </div><!-- End sidebar categories-->

                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Postingan Terbaru</h3>

                                <div class="mt-3">
                                    <div class="post-item mt-3">
                                        <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                                        <div>
                                            <h4><a href="blog-post.html">Nihil blanditiis at in nihil autem</a></h4>
                                            <time datetime="2020-01-01">Jan 1, 2020</time>
                                        </div>
                                    </div><!-- End recent post item-->
                                </div>

                            </div><!-- End sidebar recent posts-->

                            <div class="sidebar-item tags">
                                <h3 class="sidebar-title">Tags</h3>
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
        </section><!-- End Blog Section -->
    </main><!-- End #main -->
@endsection
