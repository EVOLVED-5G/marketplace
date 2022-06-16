@extends('auth.layout.auth-layout')

@section('title_postfix')Login @endsection


@section('content')

    <div class="login-page row">

        <div class="login-page__bck col-md-5">
        </div>
        <div class="login-page__input col-md-7">
            <a href="{{ route('home') }}">     <i class="fas fa-home"></i></a>

            <h2 class="text-center mb-5">Sign in to Εvolved-5G</h2>
            <div class="sign-in-form px-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="email" class="col-form-label text-md-right">Username or e-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group mb-5">
                        <label for="password" class="col-form-label text-md-right">Password</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p class="text-details"><i>Must be 8 characters at least.</i></p>
                    </div>



                    <div class="form-group">
                        <div class="form-check float-start mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        <div class="float-end mb-3" id="forgot-pass">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Forgot password
                                </a>
                            @endif
                        </div>

                    </div>

                    <div class="form-group mb-3">

                        <button type="submit" class="btn btn--blue">
                            Sign in
                        </button>

                    </div>
                </form>

                {{-- edo einai sosto to sign in kai to register? etsi tha ta balo kai to register.blade? --}}
                <div class="row justify-content-center change-button"> <a class="btn btn-link"
                        href="{{ route('register') }} ">
                        {{ __('auth.register_btn') }}
                    </a></div>
            </div>
            <p id="rights" class="text-details">©Evolved-5G {{ now()->year }} | <small>{{ config('app.version') }}</small></p>
        </div>
    </div>


    {{-- <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 pt-5">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('auth.email_label') }}</label>

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

                            <div class="form-group row mb-4">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('auth.password_label') }}</label>

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

                            <div class="form-group row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('auth.remember_me_label') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('auth.login_btn') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('auth.forgot_password_link') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <a class="btn btn-link" style="color: darkred;}" href="{{ route('register') }} ">
                    {{ __('auth.register_btn') }}
                </a>
            </div>
        </div>
    </div> --}}
@endsection


@push('scripts')

@endpush
