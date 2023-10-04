<?php $title = 'Home Slider'; ?>
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
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="parents">

        <div id="carouselExampleIndicators" class="carousel slide sliders" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($home_sliders as $key => $home_slider)
                    @if ($home_slider->type == 1)
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                            class={{ $key == 0 ? 'active' : '' }}></li>
                    @endif
                @endforeach

            </ol>
            <div class="carousel-inner" role="listbox">
                @if ($home_sliders->count() != 0)
                    @foreach ($home_sliders as $key => $home_slider)
                        @if ($home_slider->type == 1)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="links_image">
                                    <a href="{{ route('home_sliders.create') }}" class="btn btn-primary btn-m">Add Image</a>
                                    <a href="{{ route('home_sliders.edit', $home_slider->id) }}"
                                        class="btn btn-primary btn-m mx-1">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-id="{{ $home_slider->id }}"
                                        data-title="{{ $home_slider->title }}" class="btn btn-primary btn-m"
                                        data-bs-target="#danger-header-modal">
                                        Delete
                                    </a>
                                </div>
                                <img class="d-block img-fluid" src="{{ asset($home_slider->images) }}" alt="First slide"
                                    style="width: 1200px;height:610px">
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="links_image2">
                        <a href="{{ route('home_sliders.create') }}" class="btn btn-primary btn-m">Add Image</a>
                    </div>
                @endif



            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="box">
            <div class="item1">

                @if ($home_sliders->count() > 1)
                    @forelse ($home_sliders as $home_slider)
                        @if ($home_slider->type == 2)
                            <div class="links_image">
                                <img src="{{ asset($home_slider->images) }}" alt="" style="height: 295px">
                            </div>
                            <div class="btns">
                                <a href="{{ route('home_sliders.edit', $home_slider->id) }}"
                                    class="btn btn-primary btn-m">Edit</a>
                                <a href="" data-bs-toggle="modal" data-id="{{ $home_slider->id }}"
                                    data-title="{{ $home_slider->title }}" class="btn btn-primary btn-m"
                                    data-bs-target="#danger-header-modal">
                                    Delete
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="slider_image2">
                        <a href="{{ route('home_sliders.create2') }}" class="btn btn-primary btn-m">Add
                            Image</a>
                    </div>
                @endif

            </div>

            <div class="item2">
                <div class="links_image2">
                    @if ($home_sliders->count() > 2)
                        @foreach ($home_sliders as $home_slider)
                            @if ($home_slider->type == 3)
                                <div class="links_image">
                                    <img src="{{ asset($home_slider->images) }}" alt="" style="height: 295px">
                                </div>
                                <div class="btns">
                                    <a href="{{ route('home_sliders.edit', $home_slider->id) }}"
                                        class="btn btn-primary btn-m">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-id="{{ $home_slider->id }}"
                                        data-title="{{ $home_slider->title }}" class="btn btn-primary btn-m"
                                        data-bs-target="#danger-header-modal">
                                        Delete
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="slider_image2">
                            <a href="{{ route('home_sliders.create3') }}" class="btn btn-primary btn-m">Add
                                Image</a>
                        </div>
                    @endif



                </div>
            </div>
        </div>

    </div>

    <!-- Danger Header Modal -->
    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('home_sliders.destroy', 'destroy') }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="danger-header-modalLabel">
                            Delete <span id="title"></span>
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Are you sure to delete</h3>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img src="" id="image" alt="">
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('js')



    <script>
        $('#danger-header-modal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');
            var title = button.data('title')
            var modal = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-header #title').html(title);
        });
    </script>

    <script>
        $('#bs-example-modal-lg').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var title = button.data('title')
            var image = button.data('img');
            var modal = $(this);

            modal.find('.modal-body .box #image').attr('src', image);
            modal.find('.modal-header #myLargeModalLabel').html(title);
        });
    </script>
@endsection
