@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-lg-4 col-form-label text-lg-right">{{ __('Name') }}</label>
                            <div class="col-lg-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" @if ($errors->has("name")) autofocus @endif>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" @if ($errors->has("password")) autofocus @endif>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-lg-4 col-form-label text-lg-right">{{ __('Confirm Password') }}</label>
                            <div class="col-lg-8">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password" @if ($errors->has("password_confirmation")) autofocus @endif>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 text-end">
                            <div class="col-lg-8 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
