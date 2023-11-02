@extends('landing-page.layouts.main')

@section('content')
    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" action="{{ url('/register') }}" method="post">
                            @csrf
                            <div class="col-sm-12">
                                <input type="hidden" name="masyarakat_id" value="0">
                                <input type="hidden" name="is_admin" value="1">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                        id="reg-fn" name="username" required>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email">E-mail</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        id="reg-email" name="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        id="reg-pass" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Konfirmasi Password</label>
                                    <input class="form-control" type="password" id="reg-pass-confirm" name="password2"
                                        required>
                                </div>
                            </div> --}}
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ url('/login') }}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
@endsection
