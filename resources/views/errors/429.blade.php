@extends('errors.minimal')
@section('title', '429')
@section('content')
    <div class="main-wrapper">
        <div class="error-box">
            <h1>@yield('title')</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i>Too Many Requests</h3>
        </div>
    </div>
@endsection
