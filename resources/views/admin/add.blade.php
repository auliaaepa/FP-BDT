@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('New Post') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.store') }}" novalidate>
                @csrf

                <div class="row mb-3">
                    <label for="author" class="col-lg-2 col-form-label text-lg-right">{{ __('Author*') }}</label>
                    <div class="col-lg-10">
                        <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required @if ($errors->has("author")) autofocus @endif>
                        @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-lg-2 col-form-label text-lg-right">{{ __('Title*') }}</label>
                    <div class="col-lg-10">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required @if ($errors->has("title")) autofocus @endif>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="body" class="col-lg-2 col-form-label text-lg-right">{{ __('Body*') }}</label>
                    <div class="col-lg-10">
                        <textarea id="body" rows="3" class="form-control @error('body') is-invalid @enderror" name="body" value="" required @if ($errors->has("author")) autofocus @endif>{{ old('body') }}</textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tag" class="col-lg-2 col-form-label text-lg-right">{{ __('Tag') }}</label>
                    <div class="col-lg-10">
                        <input id="tag" type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" @if ($errors->has("tag")) autofocus @endif>
                        @error('tag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0 text-end">
                    <div class="col-lg-8 offset-lg-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Post') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
