<?php $title = 'Create Product'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Products
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('product.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') @enderror" placeholder="Title"
                                        aria-describedby="helpId">
                                    @error('title')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Purchased(ج.م.)</label>
                                            <input type="number" name="purchased" id="purchased"
                                                class="form-control @error('purchased') @enderror"
                                                placeholder="Purchased Price" aria-describedby="helpId">
                                            @error('purchased')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Selling(ج.م.)</label>
                                            <input type="number" name="selling" id="selling"
                                                class="form-control @error('selling') @enderror" placeholder="Selling Price"
                                                aria-describedby="helpId">
                                            @error('selling')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Offered(ج.م.)</label>
                                            <input type="number" name="offered" id="offered"
                                                class="form-control @error('offered') @enderror" placeholder="offered Price"
                                                aria-describedby="helpId">
                                            @error('offered')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Category</label>
                                            <select class="form-select form-select-md" name="category_id" id="category_id">
                                                <option selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sub Category</label>
                                            <select class="form-select form-select-md" name="sub_category_id"
                                                id="sub_category_id">
                                                <option selected>Select Sub Category</option>
                                                @foreach ($sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}">{{ $sub_category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Unit</label>
                                                <input type="text" name="unit" id="unit"
                                                    class="form-control @error('unit') is-invalid @enderror"
                                                    placeholder="Unit" aria-describedby="helpId">
                                                @error('unit')
                                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Badge</label>
                                                <input type="text" name="badge" id="badge"
                                                    class="form-control @error('badge') is-invalid @enderror"
                                                    placeholder="Badge" aria-describedby="helpId">
                                                @error('badge')
                                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Overview</label>
                                        <textarea class="form-control" name="overview" id="default-editor" rows="13"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="default-editor1" rows="13"></textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Status</label>
                                            <select
                                                class="form-select form-select-md @error('status') is-invalid @enderror"
                                                name="status">
                                                <option selected disabled>Select Status</option>
                                                <option value="1">Public</option>
                                                <option value="0">Private</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Brand</label>
                                            <select class="form-select form-select-md" name="brand_id" id="brand_id">
                                                <option selected>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tax</label>
                                            <select class="form-select form-select-md" name="tax_rule_id"
                                                id="tax_rule_id">
                                                <option selected>Select Brand</option>
                                                @foreach ($tax_rules as $tax_rule)
                                                    <option value="{{ $tax_rule->id }}">{{ $tax_rule->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- 
                                    <div class="col-lg-4 col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">shipping</label>
                                            <select class="form-select form-select-md" name="brand_id" id="brand_id">
                                                <option selected>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4 col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Bundle Deal</label>
                                            <select class="form-select form-select-md" name="bundle_deal_id"
                                                id="bundle_deal_id">
                                                <option selected>Select Bundle Deal</option>
                                                @foreach ($bundles as $bundle)
                                                    <option value="{{ $bundle->id }}">{{ $bundle->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Collection</label>
                                        <div class="d-flex justify-content-between w-50 flex-wrap">
                                            @foreach ($collections as $collection)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $collection->id }}" id="coll-{{ $collection->id }}"
                                                        name="collection_id[]">
                                                    <label class="form-check-label" for="coll-{{ $collection->id }}">
                                                        {{ $collection->title }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label for="" class="form-label">Product Info</label>
                                        <div class="mb-1">
                                            <label class="form-check-label me-1" for="">Refundable</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="refundable">Yes</label>
                                                <input class="form-check-input" type="radio" name="refundable"
                                                    id="refundable" value="1">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="refundable1">No</label>
                                                <input class="form-check-input" type="radio" name="refundable"
                                                    id="refundable1" value="0">
                                            </div>
                                        </div>

                                        <label class="form-check-label me-1" for="">Warranty</label>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="warranty">Yes</label>
                                            <input class="form-check-input" type="radio" name="warranty"
                                                id="warranty" value="1">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="warranty1">No</label>
                                            <input class="form-check-input" type="radio" name="warranty"
                                                id="warranty1" value="0">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title"
                                            class="form-control @error('meta_title') is-invalid @enderror"
                                            placeholder="Meta Title" aria-describedby="helpId">
                                        @error('meta_title')
                                            <small id="helpId" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="8"
                                            placeholder="Meta Description"></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-md mt-3">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card">
                            <div class="body-header" style="padding:10px 0 0px 20px">
                                <h4>Preview Video (Max size: 8MB)</h4>
                            </div>
                            <div class="card-body">
                                <div class="video">
                                    <video src="" id="previewImg" controls class="w-100"></video>
                                    <input type="file" name="video" id="video" class="form-control mt-1"
                                        onchange="preview(this)">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="body-header" style="padding: 10px 0 0px 20px">
                                <h4>Preview Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="image w-100 mb-2">
                                    <img src="" alt="" class="w-100" id="image">
                                </div>
                                <input type="file" class="form-control" name="images[]" id="image"
                                    onchange="previewImage(this)" multiple accept="image/*">
                            </div>
                        </div>
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

        function previewImage(input) {
            var file = $('input[type=file]').get(1).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#image').attr('src', reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
