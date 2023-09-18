<?php $title = 'Add Attribute'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Attribute
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('attribute.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('attribute.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') @enderror" placeholder="Title"
                                aria-describedby="helpId">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row handle">
                            <label for="" class="form-label">{{ $title }}</label>
                            <div class="col-lg-4 col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="values[]" id="title"
                                        class="form-control @error('values') @enderror" placeholder="{{ $title }}"
                                        required aria-describedby="helpId">
                                    @error('values')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="button" id="attr" class="btn btn-primary btn-sm">Add Attribute
                                Value</button>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#attr').on('click', function() {
                $('.handle').find('.col-lg-4:last').after(
                    `
                    <div class="col-lg-4 col-md-4">
                        <div class="mb-3">
                            <input type="text" name="values[]" id="title"
                                class="form-control @error('values') @enderror" placeholder="{{ $title }}" required
                                aria-describedby="helpId">
                            @error('values')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    `
                )
            })
        });
    </script>
@endsection
