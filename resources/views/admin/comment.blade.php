@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.post', ['id' => $post->_id]) }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.tag', ['id' => $post->_id]) }}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="{{ route('admin.comment', ['id' => $post->_id]) }}">Comments</a>
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
            <h4 class="card-title text-center mb-3">Comments</h4>
        </div>
        <ul class="list-group list-group-flush">
            @for ($i=0; $i < count($post->comments); $i++)
                <li class="list-group-item">
                    <small class="text-muted">{{ $post->comments[$i]['author'] }} - {{ $post->comments[$i]['email'] }}</small><br>
                    {{ $post->comments[$i]['body'] }}
                </li>
            @endfor
        </ul>
    </div>
</div>
@endsection
