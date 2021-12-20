@extends('layouts.app')

@section('content')
<div class="container">
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

    <div class="mb-4">
        <div class="">
            <h2>{{ __('Post') }}</h2>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-inline">
                <div class="float-start">
                    {{ $post->author }}
                </div>
                <div class="float-end">
                    <a class="btn btn-sm btn-primary" role="button" href="{{ route('user.post', ['id' => $post->_id]) }}">see more</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>
            <p class="card-text"><small class="text-muted">{{ $post->date->toDateTime()->format('d-m-Y H:i:s e') }}</small></p>
        </div>
        <div class="card-footer text-muted">
            tags: 
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
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection