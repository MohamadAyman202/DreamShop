<?php $title = 'Create Brands'; ?>
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
                <div class="card-body ">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            {{-- <input type="hidden" value="{{ $category->title }}" name="old_name"> --}}
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"wire:modal="slug"
                                wire:model="title" placeholder="Title" aria-describedby="helpId" wire:keyup="generateSlug">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 group">
                            <div>

                                Photo Preview:
                                <div class="box-size">
                                    <img id="previewImg" class="icons-box2">
                                </div>
                                <div class="box-size">
                                    <i class="dripicons-photo-group icons-box"></i>
                                </div>
                            </div>
                            <div class="files">
                                <label for="" class="form-label">Choose Iamge</label>
                                <input type="file" class="form-control @error('images') is-invalid @enderror"
                                    wire:model="image" name="images" id="images" aria-describedby="fileHelpId"
                                    onchange="preview(this);">
                                @error('images')
                                    <span class="error">{{ $message }}</span>
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

                                <div class="col-6">
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


        function showImg() {
            if ($("#previewImg").attr("src") == undefined) {
                $("#previewImg").parent().hide();
                $(".icons-box").parent().show();
            } else {
                $("#previewImg").parent().show();
                $(".icons-box").parent().hide();
            }
        }

        setInterval(() => {
            showImg();
        }, 200);
    </script>
@endsection
