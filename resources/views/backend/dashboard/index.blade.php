@extends('layouts.backend_main')
@section('title', 'Dashboard')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">@yield('title')</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Selamat Datang <strong>{{ auth()->user()->name }}</strong> di Dashboard Bojongnegara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
