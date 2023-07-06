@extends('layouts.auth_main')
@section('title', 'Login')
@section('content')
    <div class="login-right-wrap">
        <h1>Login</h1>
        <p class="account-subtitle">Bojongnegara - Kab. Cirebon</p>
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-control-label" for="username">Email / No Telepon</label>
                <input type="text" id="username" name="username" autofocus
                    class="form-control @error('username') is-invalid @enderror">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="password">Password</label>
                <div class="pass-group">
                    <input type="password" id="password" name="password" class="form-control pass-input">
                    <span class="fas fa-eye toggle-password"></span>
                </div>
                @error('password')
                    <small class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">Ingat saya</label>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <a class="forgot-link" href="forgot-password.html">Lupa Password ?</a>
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>
        </form>
    </div>
@endsection