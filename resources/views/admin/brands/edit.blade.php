<?php $title = 'Edit Brands'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Brands
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('brands.index') }}
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
                    <form action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"wire:modal="slug"
                                wire:model="title" placeholder="Title" aria-describedby="helpId" wire:keyup="generateSlug"
                                value="{{ $brand->title }}">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 group">
                            <div>

                                Photo Preview:
                                <div class="box-size">
                                    <img id="previewImg" class="icons-box2" src="{{ asset($brand->images) }}">
                                </div>
                            </div>
                            <div class="files">
                                <label for="" class="form-label">Choose Iamge</label>
                                <input type="file" class="form-control @error('images') is-invalid @enderror"
                                    wire:model="image" name="images" id="images" aria-describedby="fileHelpId"
                                    onchange="preview(this);">
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 group">
                            <div class="row">
                                <div class="col-6">


                                    <label for="" class="form-label">Featured</label>
                                    <div class="form-floating">
                                        <select class="form-select @error('featured') is-invalid @enderror"
                                            id="floatingSelect" aria-label="Floating label select example" name="featured">
                                            i
                                            <option value="1" {{ $brand->featured == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0" {{ $brand->featured == 0 ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    @error('featured')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-6">


                                    <label for="" class="form-label">Status</label>
                                    <div class="form-floating">
                                        <select class="form-select @error('status') is-invalid @enderror"
                                            id="floatingSelect" aria-label="Floating label select example" name="status">
                                            <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>
                                                Public</option>
                                            <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    @error('status')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function preview(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
