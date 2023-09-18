<?php $title = 'Create Tax Rules'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Tax Rules
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('tax-rule.index') }}
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
                    <form action="{{ route('tax-rule.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="text" name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Price"
                                        aria-describedby="helpId">
                                    @error('price')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Price Type</label>
                                    <select class="form-select form-select-md @error('type') is-invalid @enderror"
                                        name="type" id="price_type">
                                        <option selected>Select Price Type</option>
                                        <option value="1">Flat</option>
                                        <option value="2">Percent</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger" id="helpId">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
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
