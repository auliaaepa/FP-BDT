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

    <div class="d-inline clearfix mb-4">
        <div class="float-start">
            <h2>{{ __('Post') }}</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" role="button" href="{{ route('admin.add') }}">{{ __('Add Post') }}</a>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-inline">
                <div class="float-start">
                    {{ $post->author }}
                </div>
                @php
                    $id_delete_form = 'delete-form-' . $post->_id;
                @endphp                
                <div class="float-end">
                    <a class="btn btn-sm btn-danger ms-2" role="button" href="{{ route('admin.delete', ['id' => $post->_id]) }}"
                        onclick="event.preventDefault();
                                document.getElementById('{{ $id_delete_form }}').submit();">
                            Delete
                    </a>
                </div>
                <form id="{{ $id_delete_form }}" method="POST" action="{{ route('admin.delete', ['id' => $post->_id]) }}" class="d-none">
                    @csrf
                </form>
                <div class="float-end">
                    <a class="btn btn-sm btn-warning" role="button" href="{{ route('admin.post', ['id' => $post->_id]) }}">See and Edit</a>
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