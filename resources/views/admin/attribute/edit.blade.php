<?php $title = 'Edit Attribute'; ?>
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
                    <form action="{{ route('attribute.update', $attribute->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') @enderror" placeholder="Title" aria-describedby="helpId"
                                value="{{ $attribute->title }}">
                            @error('title')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row handle">
                            <label for="" class="form-label">{{ $title }}</label>
                            @if (count($attribute->values) > 0)
                                @foreach ($attribute->values as $item)
                                    <div class="col-lg-4 col-md-4">
                                        <div class="mb-3">
                                            <input type="text" name="values[]" id="title"
                                                class="form-control @error('values') @enderror"
                                                placeholder="{{ $title }}" aria-describedby="helpId"
                                                value="{{ $item->title }}" required>
                                            @error('values')
                                                <small id="helpId" class="text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-4 col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="values[]" id="title"
                                            class="form-control @error('values') @enderror"
                                            placeholder="{{ $title }}" aria-describedby="helpId">
                                        @error('values')
                                            <small id="helpId" class="text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            @endif

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

@endsection
