<?php $title = 'Create Withdrawal'; ?>
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
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('accounts.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                aria-describedby="helpId">
                            @error('title')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Account number</label>
                            <input type="text" name="account_number" id="title"
                                class="form-control @error('account_number') is-invalid @enderror"
                                placeholder="Account number" aria-describedby="helpId">
                            @error('account_number')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Account name</label>
                            <input type="text" name="account_name" id="title"
                                class="form-control @error('account_name') is-invalid @enderror" placeholder="Account name"
                                aria-describedby="helpId">
                            @error('account_name')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Bank name</label>
                            <input type="text" name="bank_name" id="title"
                                class="form-control @error('bank_name') is-invalid @enderror" placeholder="Bank name"
                                aria-describedby="helpId">
                            @error('bank_name')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Branch name</label>
                            <input type="text" name="branch_name" id="title"
                                class="form-control @error('branch_name') is-invalid @enderror" placeholder="Branch name"
                                aria-describedby="helpId">
                            @error('branch_name')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Default</label>
                                    <select class="form-select form-select-md" name="default" id="Default">
                                        <option selected value="no">no</option>
                                        <option value="yes">Yes</option>
                                    </select>
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
