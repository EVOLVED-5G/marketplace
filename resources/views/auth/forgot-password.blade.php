@extends('auth.layout.auth-layout')

@section('title_postfix')Forgot password @endsection

@section('content')
    <div class="login-page row">
        <div class="login-page__bck col-md-5">
        </div>
        <div class="login-page__input col-md-7">
            <h2 class="text-center mb-4"> {{ __('auth.reset_password') }}</h2>
            <div class="sign-in-form px-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="email" class="col-form-label text-md-right">{{ __('auth.email_label') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group row mb-0">

                        <button type="submit" class="btn btn-primary">
                            {{ __('auth.send_password_reset_link') }}
                        </button>

                    </div>
                </form>




            </div>
            <p id="rights" class="text-details">©Evolved-5G {{ now()->year }} | <small>{{ config('app.version') }}</small></p>
        </div>
    </div>


    {{-- <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 py-5">
                <div class="card">
                    <div class="card-header">{{ __('auth.reset_password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('auth.email_label') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('auth.send_password_reset_link') }}
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
