<?php $title = 'Create Pages'; ?>
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
                    <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <livewire:create-slug />
                        <div class="mb-3">
                            <textarea name="description" id="default-editor" rows="10" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"
                                class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title"
                                aria-describedby="helpId">
                            @error('meta_title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="8"
                                placeholder="Meta Description"></textarea>
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
