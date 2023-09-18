<?php $title = 'Edit Bundle Deals'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Bundle Deals
@stop
@section('link2')
    {{ $title }}
@stop
@section('url')
    {{ route('bundle_deals.index') }}
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
                    @endif
                    <form action="{{ route('bundle_deals.update', $bundle->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId" value="{{ $bundle->title }}">
                            @error('title')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Free</label>
                                    <input type="text" name="free" id="free"
                                        class="form-control @error('free') is-invalid @enderror" placeholder="Free"
                                        aria-describedby="helpId" value="{{ $bundle->free }}">
                                    @error('free')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Buy</label>
                                    <input type="text" name="buy" id="buy"
                                        class="form-control @error('buy') is-invalid @enderror" placeholder="Buy"
                                        aria-describedby="helpId" value="{{ $bundle->buy }}">
                                    @error('buy')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-md btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
