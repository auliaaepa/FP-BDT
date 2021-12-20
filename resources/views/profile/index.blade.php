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
                <h4 class="card-title text-center mb-3">Profile</h4>
                <div class="row mb-3">
                    <div class="col-lg-4">Name<span class="d-lg-none">&ensp;:</span></div>
                    <div class="col-lg-8"><span class="d-lg-inline d-none">: </span>{{ $user->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4">Email<span class="d-lg-none">&ensp;:</span></div>
                    <div class="col-lg-8"><span class="d-lg-inline d-none">: </span>{{ $user->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4">Role<span class="d-lg-none">&ensp;:</span></div>
                    <div class="col-lg-8"><span class="d-lg-inline d-none">: </span>{{ $user->role }}</div>
                </div>
                <div class="text-end">
                    <a class="btn btn-warning" href="{{ route('editProfile') }}">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
