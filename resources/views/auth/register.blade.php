@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Register basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <img src="{{ asset('images/logo/soudagar1.png')}}" width="100">
                                <h4 class="card-title mb-1">Register 🚀</h4>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Steven Alexander" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    <div>
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="stevejobs@mail.com" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><br>
                                    <div class="mb-1">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input id="phone" type="text" class="form-control" name="phone" required autocomplete="phone" placeholder="08123123123" autofocus>
                                    </div>
                                    <div class="mb-1">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Register') }}
                                    </button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Already have an account?</span>
                                    <a href="/login">
                                        <span>Sign in instead</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Register basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
