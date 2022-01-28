@extends('auth.layout.auth-layout')
@section('title_postfix')Reset @endsection

@section('content')

    <div class="login-page row">
        <div class="login-page__bck col-md-5">
        </div>
        <div class="login-page__input col-md-7">
            <h2 class="text-center mb-4"> {{ __('auth.reset_password') }}</h2>
            <div class="sign-in-form">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row mb-2">
                        <label for="email" class="col-form-label text-md-right">{{ __('auth.email_label') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="password" class="col-form-label text-md-right">{{ __('auth.password_label') }}</label>


                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="password-confirm"
                            class="col-form-label text-md-right">{{ __('auth.confirm_password_label') }}</label>


                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">

                    </div>

                    <div class="form-group row mb-0">

                        <button type="submit" class="btn btn-primary">
                            {{ __('auth.reset_password_btn') }}
                        </button>

                    </div>
                </form>




            </div>
            <p id="rights" class="text-details">© 2021 Mockup. All Rights Reserved.</p>
        </div>
    </div>


    {{-- <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 py-5">
                <div class="card">
                    <div class="card-header">{{ __('auth.reset_password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row mb-2">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('auth.email_label') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus>

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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('auth.confirm_password_label') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('auth.reset_password_btn') }}
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
