<?php $title = 'Create Sub-Category'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Sub-Category
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('sub-category.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-0">
                <div class="card-body">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <livewire:create-category />
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
                            <div class="form-floating">
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                                    placeholder="Leave a comment here" id="floatingTextarea" style="height: 200px;"></textarea>
                                <label for="floatingTextarea">Meta Description</label>
                            </div>
                            @error('meta_description')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">Category</label>
                                    <div class="form-floating">
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            id="floatingSelect" aria-label="Floating label select example" name="category_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    @error('category_id')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-4">


                                    <label for="" class="form-label">Featured</label>
                                    <div class="form-floating">
                                        <select class="form-select @error('featured') is-invalid @enderror"
                                            id="floatingSelect" aria-label="Floating label select example" name="featured">
                                            <option selected disabled>Select Featured</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    @error('featured')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-4">


                                    <label for="" class="form-label">Status</label>
                                    <div class="form-floating">
                                        <select class="form-select @error('status') is-invalid @enderror"
                                            id="floatingSelect" aria-label="Floating label select example" name="status">
                                            <option selected disabled>Select Status</option>
                                            <option value="1">Public</option>
                                            <option value="0">Private</option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    @error('status')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
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
