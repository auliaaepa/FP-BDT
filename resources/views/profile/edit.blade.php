@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="{{ route('indexProfile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('changePasswordProfile') }}">Change Password</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('storeProfile') }}" novalidate>
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
                    <h4 class="card-title text-center mb-3">Edit Profile</h4>
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-lg-4 col-form-label text-lg-right">{{ __('Name') }}</label>
                        <div class="col-lg-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $user->name }}" required autocomplete="name" @if ($errors->has("name")) autofocus @endif>
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->email }}" required autocomplete="email" @if ($errors->has("email")) autofocus @endif>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-lg-4 col-form-label text-lg-right">{{ __('Role') }}</label>
                        <div class="col-lg-8">
                            <input id="role" type="text" class="form-control" name="role" value="{{ $user->role }}" disabled readonly>
                        </div>
                    </div>
                    <div class="row mb-0 text-end">
                        <div class="col-lg-8 offset-lg-4">
                            <a class="btn btn-secondary" href="{{ route('indexProfile') }}">
                                {{ __('Cancel') }}
                            </a>
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
