@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="{{ route('admin.post', ['id' => $post->_id]) }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.tag', ['id' => $post->_id]) }}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.comment', ['id' => $post->_id]) }}">Comments</a>
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
            <h4 class="card-title text-center mb-3">Post</h4>
            <div class="row mb-3">
                <div class="col-lg-2">Author<span class="d-lg-none">&ensp;:</span></div>
                <div class="col-lg-10"><span class="d-lg-inline d-none">: </span>{{ $post->author }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Title<span class="d-lg-none">&ensp;:</span></div>
                <div class="col-lg-10"><span class="d-lg-inline d-none">: </span>{{ $post->title }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">Body<span class="d-lg-none">&ensp;:</span></div>
                <div class="col-lg-10"><span class="d-lg-inline d-none">: </span>{{ $post->body }}</div>
            </div>
            <div class="text-end">
                <a class="btn btn-warning" href="{{ route('admin.edit', ['id' => $post->_id]) }}">Edit Post</a>
            </div>
        </div>
    </div>
</div>
@endsection
