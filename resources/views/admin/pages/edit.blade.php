<?php $title = 'Edit Pages'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Pages
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('pages.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-0">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pages.update', $page->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId" value="{{ $page->title }}">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" name="slug" id="title"
                                class="form-control @error('slug') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId" value="{{ $page->slug }}">
                            @error('slug')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="description" id="default-editor" rows="10" placeholder="Description">{{ $page->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"
                                class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title"
                                aria-describedby="helpId" value="{{ $page->meta_title }}">
                            @error('meta_title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="8"
                                placeholder="Meta Description">{{ $page->meta_description }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-md mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
