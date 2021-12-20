@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="{{ route('user.post', ['id' => $post->_id]) }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.comment', ['id' => $post->_id]) }}">Comments</a>
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
            <div class="row mb-3">
                <div class="col-lg-2">Tags<span class="d-lg-none">&ensp;:</span></div>
                <div class="col-lg-10"><span class="d-lg-inline d-none">: </span>
                    @if(count($post->tags) == 1)
                        {{ $post->tags[0] }}; 
                    @elseif(count($post->tags) > 1)
                        @foreach ($post->tags as $tag)
                            {{ $tag }}; 
                        @endforeach
                    @else
                        no tags
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
