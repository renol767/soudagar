@extends('layouts.app')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-basic px-2">
                <div class="auth-inner my-2">
                    <!-- Login basic -->
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('images/logo/soudagar1.png')}}" width="100">
                            <h4 class="card-title mb-1">Welcome! 👋</h4>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-1">
                                    <label for="login-email" class="form-label">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="john@example.com" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="login-password">Password</label>
                                        <a href="auth-forgot-password-basic.html">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input id="password" type="password"
                                            class="form-control form-control-merge @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="4" type="submit">Sign in</button>
                            </form>

                            <p class="text-center mt-2">
                                <span>New on our platform?</span>
                                <a href="/register">
                                    <span>Create an account</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- /Login basic -->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection