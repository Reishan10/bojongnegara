@extends('errors.minimal')
@section('title', '404')
@section('content')
    <div class="main-wrapper">
        <div class="error-box">
            <h1>@yield('title')</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i> Oops!</h3>
            <p class="h4 font-weight-normal">Halaman yang Anda minta tidak di temukan.</p>
        </div>
    </div>
@endsection
