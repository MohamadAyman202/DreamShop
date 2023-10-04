<?php $title = 'Banners'; ?>
@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@stop
@section('title-page')
    {{ $title }}
@stop
@section('link1')
    Dashboard
@stop
@section('url')
    {{ route('admin.dashboard') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="pb-3 pt-1 text-end">
                        <a href="{{ route('banners.create') }}" class="btn btn-primary ps-4 pe-4">Create
                            {{ $title }}</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="datatable-buttons"
                                class="table table-striped table-centered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Source type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($banners as $banner)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $banner->images }}</td>
                                            <td>{{ $banner->type }}</td>
                                            <td>{{ $banner->status }}</td>
                                            <td>{{ $banner->soucre_type }}</td>
                                            <td>
                                                <a href="{{ route('brands.edit', $brand->id) }}">
                                                    <i class='uil uil-pen btn-info btn-sm'></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" data-id="{{ $brand->id }}"
                                                    data-title="{{ $brand->title }}" data-bs-target="#danger-header-modal">
                                                    <i class='uil uil-trash btn-danger btn-sm'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
