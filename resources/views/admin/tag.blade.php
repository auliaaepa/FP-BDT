@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('admin.post', ['id' => $post->_id]) }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.tag', ['id' => $post->_id]) }}">Tags</a>
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

            <h4 class="card-title text-center mb-3">Edit Tags</h4>
            @if(count($post->tags) >= 1)
                @for ($i=0; $i < count($post->tags); $i++)
                    <div class="row mb-3">
                        @php
                            $id_edit_form = 'edit-tag-form-'. $i;
                        @endphp
                        <form id="{{ $id_edit_form }}" class="col-8" method="POST" action="{{ route('admin.save', ['id' => $post->_id]) }}" novalidate>
                            @csrf
                            <div class="row">
                                <div class="d-none">
                                    <input id="old_tag" type="text" class="form-control" name="old_tag" value="{{ $post->tags[$i] }}" required>
                                </div>
                                <div class="w-100">
                                    <input id="tag" type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') ? old('tag') : $post->tags[$i] }}" required @if($errors->has("tag")) autofocus @endif>
                                    @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        <div class="col-2">
                            <a class="btn btn-warning w-100" href="{{ route('admin.save', ['id' => $post->_id]) }}"
                                onclick="event.preventDefault();
                                        document.getElementById('{{ $id_edit_form }}').submit();">
                                {{ __('Edit') }}
                            </a>
                        </div>
                        @php
                            $id_delete_form = 'delete-tag-form-' . $i;
                        @endphp
                        <div class="col-2">
                            <a class="btn btn-danger w-100" href="{{ route('admin.remove', ['id' => $post->_id]) }}"
                                onclick="event.preventDefault();
                                        document.getElementById('{{ $id_delete_form }}').submit();">
                                    {{ __('Delete') }}
                            </a>
                        </div>
                        <form id="{{ $id_delete_form }}" method="POST" action="{{ route('admin.remove', ['id' => $post->_id]) }}" class="d-none">
                            @csrf
                            <input id="tag" type="text" class="form-control" name="tag" value="{{ $post->tags[$i] }}" required>
                        </form>
                    </div>
                @endfor
            @endif

            <div class="row mb-3">
                @php
                    $id_new_form = 'new-tag-form';
                @endphp
                <form id="{{ $id_new_form }}" class="col-8" method="POST" action="{{ route('admin.new', ['id' => $post->_id]) }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="w-100">
                            <input id="new_tag" type="text" class="form-control @error('new_tag') is-invalid @enderror" name="new_tag" value="{{ old('new_tag') }}" required @if($errors->has("new_tag")) autofocus @endif>
                            @error('new_tag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>
                <div class="col-4">
                    <a class="btn btn-primary w-100" href="{{ route('admin.new', ['id' => $post->_id]) }}"
                        onclick="event.preventDefault();
                                document.getElementById('{{ $id_new_form }}').submit();">
                        {{ __('Add') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
