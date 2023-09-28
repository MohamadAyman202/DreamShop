<?php $title = 'Edit Flash Sales'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Edit Flash Sales
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('flash_sales.index') }}
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
                    <form action="{{ route('flash_sales.update', $flash_sale->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId" value="{{ $flash_sale->title }}">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Start Time</label>
                                    <input type="datetime-local" name="start_time" id="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror"
                                        aria-describedby="helpId" value="{{ $flash_sale->start_time }}">
                                    @error('start_time')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">End Time</label>
                                    <input type="datetime-local" name="end_time" id="end_time"
                                        class="form-control @error('end_time') is-invalid @enderror"
                                        aria-describedby="helpId" value="{{ $flash_sale->end_time }}">
                                    @error('end_time')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                                        <option value="1" {{ $flash_sale->status == 1 ? 'selected' : '' }}>
                                            Public</option>
                                        <option value="0" {{ $flash_sale->status == 0 ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="accordion custom-accordion" id="custom-accordion-one">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="m-0">
                                            <a class="custom-accordion-title d-block py-1" data-bs-toggle="collapse"
                                                href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                Products <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                        data-bs-parent="#custom-accordion-one">
                                        <div class="card-body" style="padding: 0;max-height:500px;overflow-y:auto">
                                            <table class="table table-centered mb-0">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th style="width: 20px">#</th>
                                                        <th>Title</th>
                                                        <th>Price(ج.م.)</th>
                                                        <th>Offered(ج.م.)</th>
                                                        <th>Sale price(ج.م.)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="{{ $product->id }}" id=""
                                                                        name="product_id[]"
                                                                        @foreach ($flash_sale->products as $products)
                                                                    {{ $products->id == $product->id ? 'checked' : '' }} @endforeach>
                                                                </div>
                                                            </td>
                                                            <td class="d-flex justify-content-between align-items-center">
                                                                <div class="imagess" style="width:60px">
                                                                    <img style="max-width: 50px"
                                                                        src="{{ asset($product->images[0]) }}"
                                                                        alt="" class="me-2">
                                                                </div>
                                                                <div class="title d-flex justify-content-start align-items-center fw-bold"
                                                                    style="padding:10px;width:100%;font-size:18px">
                                                                    {{ $product->title }}
                                                                </div>
                                                            </td>
                                                            <td>{{ $product->selling }}</td>
                                                            <td>{{ $product->offered }}</td>
                                                            <td>
                                                                <input type="number" class="form-control" name="price[]"
                                                                    id="" min="0" placeholder="Sale price"
                                                                    value=@foreach ($flash_sale->products as $key => $products)
                                                                    {{ $products->id == $product->id ? "{$flash_product[$key]->price}" : '' }} @endforeach>
                                                            </td>
                                                    @endforeach

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-primary m-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
