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
            <form method="POST" action="{{ route('admin.update', ['id' => $post->_id]) }}" novalidate>
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

                <h4 class="card-title text-center mb-3">Edit Post</h4>
                @csrf
                <div class="row mb-3">
                    <label for="author" class="col-lg-2 col-form-label text-lg-right">{{ __('Author') }}</label>
                    <div class="col-lg-10">
                        <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') ? old('author') : $post->author }}" required @if ($errors->has("author")) autofocus @endif>
                        @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-lg-2 col-form-label text-lg-right">{{ __('Title') }}</label>
                    <div class="col-lg-10">
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title') : $post->title }}" required @if ($errors->has("title")) autofocus @endif>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="body" class="col-lg-2 col-form-label text-lg-right">{{ __('Body') }}</label>
                    <div class="col-lg-10">
                        <textarea id="body" rows="10" class="form-control @error('body') is-invalid @enderror" name="body" required @if ($errors->has("body")) autofocus @endif>{{ old('body') ? old('body') : $post->body }}</textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0 text-end">
                    <div class="col-lg-10 offset-lg-2">
                        <a class="btn btn-secondary" href="{{ route('admin.post', ['id' => $post->_id]) }}">
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
@endsection
