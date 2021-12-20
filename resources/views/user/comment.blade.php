@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.post', ['id' => $post->_id]) }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="{{ route('user.comment', ['id' => $post->_id]) }}">Comments</a>
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
            
            <form method="POST" action="{{ route('user.store', ['id' => $post->_id]) }}" novalidate>
                @csrf
                <div class="row mb-3">
                    <div class="col-11">
                        <textarea id="comment" rows="5" class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="Write your comment here.." required @if ($errors->has("comment")) autofocus @endif>{{ old('comment') ? old('comment') : $post->comment }}</textarea>
                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary w-100" type="submit" style="height: 132px;">
                            {{ __('Send') }}
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
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
