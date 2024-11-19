@extends('layouts.A')
@section('custom-css')
    <style>
        body {
            background-color: #F4CDB0;
        }
        .btn-custom {
            background-color: #644961;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .btn-custom1 {
            background-color: #F4CDB0;
            border: none;
            color: #644961;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 100px">
                    <br>
                    {{-- <div class="card-header" style="text-align: center;">{{ __('Login') }}</div> --}}
                    <p class="text-center fw-bold display-2" style="color: #644961">Login</p>
                    <br>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-0">
                                <div class="col-md- 10 offset-md-4">
                                    <button type="submit" class="btn btn-custom fw-semibold">
                                        {{ __('Login') }}
                                    </button>
                                    <button type="submit" class="btn btn-custom1">
                                        <a class="nav-link fw-semibold" href="{{ route('register') }}">Registrasi</a>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">{{ __('Email Address') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <hr class="my-4">
                    <small class="text-body-secondary">...</small>
                </form>
            </div>
            <div class="col-lg-7 text-center text-lg-start">
                <img src="{{ Vite::asset('resources/images/hero.png') }}" width="600" height="500">
            </div>
        </div>
    </div> --}}
@endsection
