@extends('auth.layout.auth-layout')

@section('title_postfix')Register @endsection

@section('content')

    <div class="login-page row">
        <div class="login-page__bck col-md-5">
        </div>
        <div class="login-page__input col-md-7">
            <h2 class="text-center mb-4">Register to Εvolved-5G</h2>
            <div class="sign-in-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name" class="col-form-label text-md-right">Full Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="col-form-label text-md-right">e-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="@email.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="col-form-label text-md-right">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Password">
                        <p class="text-details"><i>Must be 8 characters at least.</i></p>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password-confirm"
                            class="col-form-label text-md-right">{{ __('auth.confirm_password_label') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirm Password">

                    </div>

                    <div class="form-group mb-3">
                        <button id="register_btn" type="submit" class="btn btn--blue">
                            {{ __('auth.register_btn') }}</button>
                    </div>

                </form>


                <div class="row justify-content-center change-button"> <a class="btn btn-link"
                        href="{{ route('login') }} ">
                        {{ __('auth.login_btn') }}
                    </a></div>


            </div>
            <p id="rights" class="text-details">©Evolved-5G {{ now()->year }} | <small>{{ config('app.version') }}</small></p>
        </div>
    </div>

    {{-- <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 pt-5">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name_label') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email_label') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password_label') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.confirm_password_label') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="register_btn" type="submit" class="btn btn-primary">
                                        {{ __('auth.register_btn') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')

@endpush
