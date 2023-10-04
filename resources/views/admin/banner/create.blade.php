<?php $title = 'Create Banners'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Banners
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('banners.index') }}
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
                    <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" value="1" name="type">
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
                                    name="images" id="images" aria-describedby="fileHelpId" onchange="preview(this);">
                                @error('images')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 group">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Source Type</label>
                                        <select class="form-select form-select-md" name="source_type" id="source_type">
                                            <option selected>Source Type</option>
                                            <option value="1">Categories</option>
                                            <option value="2">Brands</option>
                                            <option value="3">Products</option>
                                            <option value="4">Sub Categories</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status</label>
                                        <select name="status"
                                            class="form-select form-select-md @error('status') is-invalid @enderror">
                                            <option selected disabled>Select Status</option>
                                            <option value="0">Private</option>
                                            <option value="1">Public</option>
                                        </select>
                                        @error('status')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-6 " id="categories" style="display: none">
                                    <div class="mb-3">
                                        <select class="form-select form-select-md" name="category_id[]" id="source_type"
                                            multiple>
                                            @isset($categories)
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6" id="brands" style="display: none">
                                    <div class="mb-3">
                                        <select class="form-select form-select-md" name="brand_id[]" id="source_type"
                                            multiple>
                                            @isset($categories)
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6" id="products" style="display: none">
                                    <div class="mb-3">
                                        <select class="form-select form-select-md" name="product_id[]" id="source_type"
                                            multiple>
                                            @isset($categories)
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6" id="sub_categories" style="display: none">
                                    <div class="mb-3">
                                        <select class="form-select form-select-md" name="sub_category_id[]" id="source_type"
                                            multiple>
                                            @isset($sub_categories)
                                                @foreach ($sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}">{{ $sub_category->title }}
                                                    </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
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

    <script>
        $(document).ready(function() {
            $('#source_type').change(function() {
                var sections = $(this).val()

                $('#categories').css('display', 'none');
                $('#brands').css('display', 'none');
                $('#products').css('display', 'none');
                $('#sub_categories').css('display', 'none');

                if ($('#categories').attr('id') === 'categories' && sections == 1) {
                    $('#categories').css('display', 'block');
                }
                if ($('#brands').attr('id') === 'brands' && sections == 2) {
                    $('#brands').css('display', 'block');
                }
                if ($('#products').attr('id') === 'products' && sections == 3) {
                    $('#products').css('display', 'block');
                }
                if ($('#sub_categories').attr('id') === 'sub_categories' && sections == 4) {
                    $('#sub_categories').css('display', 'block');
                }
            })
        });
    </script>
@endsection
