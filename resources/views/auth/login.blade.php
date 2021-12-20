@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if(session()->has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session()->get('success_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session()->has('failed_message'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Failed!</strong> {{ session()->get('failed_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-lg-4 col-form-label text-lg-right">{{ __('Email Address') }}</label>
                            <div class="col-lg-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" @if ($errors->has("email")) autofocus @endif>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('Password') }}</label>
                            <div class="col-lg-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password" @if ($errors->has("password")) autofocus @endif>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4 offset-lg-4 col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-6 text-end">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link py-0 px-0 " href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div> -->
                        </div>

                        <div class="row mb-0 text-end">
                            <div class="col-lg-8 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
