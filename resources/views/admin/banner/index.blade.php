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
                                            <td><img src=" {{ asset($banner->images) }}"
                                                    @if ($banner->type == 'Beside featured brands' || $banner->type == 'Bottom of flash sale section') width="300" height="150"
                                                    width="300" height="150"
                                                    @elseif($banner->type == 'Top of daily discover')
                                                    width="300" height="45"
                                                    @elseif($banner->type == 'Bottom of daily discover')
                                                    width="300" height="37.5"
                                                    @elseif($banner->type == 'Detail page(beside rating)')
                                                    width="225" height="300"
                                                    @elseif($banner->type == 'Top banner')
                                                    width="300" height="12"
                                                    @else
                                                    width="300" height="300" @endif
                                                    alt=""></td>
                                            <td>{{ $banner->type }}</td>
                                            <td>{{ $banner->status }}</td>
                                            <td>{{ $banner->source_type }}</td>
                                            <td>
                                                <a href="{{ route('banners.edit', $banner->id) }}">
                                                    <i class='uil uil-pen btn-info btn-sm'></i>
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
