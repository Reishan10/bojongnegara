@extends('layouts.backend_main')
@section('title', 'Berita')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-9">
                    <ul class="list-links mb-4">
                        <li
                            class="{{ request()->query('status') !== '1' && request()->query('status') !== '0' ? 'active' : '' }}">
                            <a href="{{ url('berita') }}">Semua</a>
                        </li>
                        <li class="{{ request()->query('status') === '1' ? 'active' : '' }}">
                            <a href="{{ url('berita?status=1') }}">Pending</a>
                        </li>
                        <li class="{{ request()->query('status') === '0' ? 'active' : '' }}">
                            <a href="{{ url('berita?status=0') }}">Publish</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-md-end">
                    <a href="{{ route('berita.create') }}" class="btn btn-primary btn-blog mb-3">
                        <i class="feather-plus-circle me-1"></i>
                        Tambah Berita
                    </a>
                </div>
            </div>

            @if ($berita->count() > 0)
                <div class="row">
                    @forelse($berita as $row)
                        <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                            <div class="blog grid-blog flex-fill">
                                <div class="blog-image">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('storage/thumbnail/' . $row->image) }}"
                                            alt="Thumbnail - {{ $row->title }}" alt="Post Image">
                                    </a>

                                    <div class="blog-views">
                                        <i class="feather-eye me-1"></i> {{ $row->views }}
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="{{ route('pengaturan.profile') }}">
                                                    <img src="{{ $row->user->avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $row->user->name : asset('storage/avatar/' . auth()->user()->avatar) }}"
                                                        alt="Post Author">
                                                    <span>
                                                        <span class="post-title">{{ $row->user->name }}</span>
                                                        <span class="post-date">
                                                            <i class="far fa-clock"></i>
                                                            {{ $formattedDate = \Carbon\Carbon::parse($row->created_at)->locale('id')->isoFormat('D MMMM Y') }}
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">
                                            {{ $row->title }}</a>
                                    </h3>
                                    <p>{!! \Illuminate\Support\Str::limit(
                                        strip_tags(htmlspecialchars_decode($row->content)),
                                        $limit = 150,
                                        $end = '...',
                                    ) !!}</p>
                                </div>
                                <div class="row">
                                    <div class="edit-options">
                                        <div class="edit-delete-btn">
                                            <a href="{{ route('berita.edit', $row->id) }}" class="text-success"><i
                                                    class="feather-edit-3 me-1"></i>
                                                Edit</a>
                                            <a href="javascript:void(0);" class="text-danger" data-id="{{ $row->id }}"
                                                id="btnHapus"><i class="feather-trash-2 me-1"></i>
                                                Hapus</a>
                                        </div>
                                        <div class="text-end inactive-style">
                                            @if ($row->status == '0')
                                                <a href="javascript:void(0);" class="text-danger"
                                                    data-id="{{ $row->id }}" id="btnPending"><i
                                                        class="feather-eye-off me-1"></i>
                                                    Pending</a>
                                            @else
                                                <a href="javascript:void(0);" class="text-success"
                                                    data-id="{{ $row->id }}" id="btnPublish"><i
                                                        class="feather-eye me-1"></i>
                                                    Publish</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center">Data tidak tersedia</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if ($berita->hasPages())
                            <div class="pagination-tab d-flex justify-content-center">
                                <ul class="pagination mb-0">
                                    <!-- Tombol previous -->
                                    <li class="page-item{{ $berita->onFirstPage() ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $berita->previousPageUrl() }}" tabindex="-1">
                                            <i class="feather-chevron-left mr-2"></i> Sebelumnya
                                        </a>
                                    </li>

                                    <!-- Halaman-halaman -->
                                    @php
                                        $start = max(1, $berita->currentPage() - 5);
                                        $end = min($start + 9, $berita->lastPage());
                                    @endphp

                                    @if ($start > 1)
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">...</a>
                                        </li>
                                    @endif

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li class="page-item{{ $berita->currentPage() === $i ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $berita->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($end < $berita->lastPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">...</a>
                                        </li>
                                    @endif

                                    <!-- Tombol next -->
                                    <li class="page-item{{ $berita->hasMorePages() ? '' : ' disabled' }}">
                                        <a class="page-link" href="{{ $berita->nextPageUrl() }}">
                                            Selanjutnya <i class="feather-chevron-right ml-2"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Data tidak tersedia</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Publish
            $('body').on('click', '#btnPublish', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Notifikasi',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Publish!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('berita/publish') }}/" + id,
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: response.success,
                                    }).then(function() {
                                        top.location.href =
                                            "{{ route('berita.index') }}";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.error,
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" + thrownError);
                            }
                        });
                    }
                });
            });

            // Pending
            $('body').on('click', '#btnPending', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Notifikasi',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Pending!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('berita/pending') }}/" + id,
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: response.success,
                                    }).then(function() {
                                        top.location.href =
                                            "{{ route('berita.index') }}";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.error,
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" + thrownError);
                            }
                        });
                    }
                });
            });

            // Hapus Data
            $('body').on('click', '#btnHapus', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Hapus',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('berita') }}/" + id,
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: response.success,
                                    }).then(function() {
                                        top.location.href =
                                            "{{ route('berita.index') }}";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.error,
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" + thrownError);
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
