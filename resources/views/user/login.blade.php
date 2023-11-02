@extends('landing-page.layouts.main')

@section('content')
    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">


                    <form class="card login-form" method="post" action="{{ url('/login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Login Sekarang</h3>
                                <p>Masuk ke akun anda menggunakan username dan password yang sudah terdaftar</p>
                            </div>
                            <div class="social-login">
                                <div class="row">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="alt-option">
                                <span></span>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                    id="reg-email" name="username" autofocus required>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    id="reg-pass" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                {{-- <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a> --}}
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Masuk</button>
                            </div>
                            {{-- @if(auth()->user()count == 0) --}}
                            @php
                                use App\Models\User;
                            @endphp
                            @if(User::all()->count() == 0)
                            <p class="outer-link">Penggunaan aplikasi SID pertama kali?
                                <a href="{{ url('/register') }}">Daftar akun admin</a>
                            </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
@endsection
