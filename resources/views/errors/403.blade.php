@extends('errors.minimal')
@section('title', '403')
@section('content')
    <div class="main-wrapper">
        <div class="error-box">
            <h1>@yield('title')</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i> Akses ditolak</h3>
            <p class="h4 font-weight-normal">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
        </div>
    </div>

@endsection
