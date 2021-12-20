@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('indexProfile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="{{ route('changePasswordProfile') }}">Change Password</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('savePasswordProfile') }}" novalidate>
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
                    <h4 class="card-title text-center mb-3">Change Password</h4>
                    @csrf
                    <div class="row mb-3">
                        <label for="current_password" class="col-lg-4 col-form-label text-lg-right">{{ __('Current Password') }}</label>
                        <div class="col-lg-8">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}" required autocomplete="current-password" @if ($errors->has("current_password")) autofocus @endif>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="new_password" class="col-lg-4 col-form-label text-lg-right">{{ __('New Password') }}</label>
                        <div class="col-lg-8">
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" required autocomplete="new-password" @if ($errors->has("new_password")) autofocus @endif>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="confirm_new_password" class="col-lg-4 col-form-label text-lg-right">{{ __('Confirm New Password') }}</label>
                        <div class="col-lg-8">
                            <input id="confirm_new_password" type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password" value="{{ old('confirm_new_password') }}" require autocomplete="new-password" @if ($errors->has("confirm_new_password")) autofocus @endif>
                            @error('confirm_new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0 text-end">
                        <div class="col-lg-8 offset-lg-4">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
