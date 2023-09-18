<?php $title = 'Create Vouchers'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Vouchers
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('vouchers.index') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif`
                    <form action="{{ route('vouchers.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId" required>
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Price"
                                        aria-describedby="helpId">
                                    @error('price')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
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

                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Capped price(ج.م.)</label>
                                    <input type="number" name="capped_price" id="capped_price"
                                        class="form-control @error('capped_price') is-invalid @enderror" placeholder="Price"
                                        aria-describedby="helpId">
                                    @error('capped_price')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Min spent(ج.م.)</label>
                                    <input type="number" name="min_spend" id="min_spend"
                                        class="form-control @error('min_spend') is-invalid @enderror" placeholder="Price"
                                        aria-describedby="helpId">
                                    @error('min_spend')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Usage Limit(Order)</label>
                                    <input type="number" name="usage_limit" id="usage_limit"
                                        class="form-control @error('usage_limit') is-invalid @enderror" placeholder="Price"
                                        aria-describedby="helpId">
                                    @error('usage_limit')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Limit per customer(Order)</label>
                                    <input type="number" name="limit_per_customer" id="limit_per_customer"
                                        class="form-control @error('limit_per_customer') is-invalid @enderror"
                                        placeholder="Price" aria-describedby="helpId">
                                    @error('limit_per_customer')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Voucher code</label>
                            <input type="text" name="code" id="code"
                                class="form-control @error('code') is-invalid @enderror" placeholder="Voucher code"
                                aria-describedby="helpId" required>
                            @error('code')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Start Time</label>
                                    <input type="datetime-local" name="start_time" id="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror"
                                        aria-describedby="helpId">
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
                                        aria-describedby="helpId">
                                    @error('end_time')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
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

                        <div class="text-center">
                            <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
