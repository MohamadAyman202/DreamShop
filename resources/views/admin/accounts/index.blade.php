<?php $title = 'Withdrawal Accounts'; ?>
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
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="pb-3 pt-1 text-end">
                        <a href="{{ route('accounts.create') }}" class="btn btn-primary ps-4 pe-4">Create
                            {{ $title }}</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="datatable-buttons"
                                class="table table-striped table-centered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Default</th>
                                        <th>Name</th>
                                        <th>Account number</th>
                                        <th>Bank</th>
                                        <th>Branch</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($accounts as $account)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $account->title }}</td>

                                            <td>
                                                @if ($account->default == 1)
                                                    <span
                                                        class="bg-success ps-3 pe-3 pt-1 pb-1 rounded text-light">Yes</span>
                                                @else
                                                    <span
                                                        class="bg-danger ps-3 pe-3 pt-1 pb-1 rounded text-light">No</span>
                                                @endif
                                            </td>
                                            <td>{{ $account->account_name }}</td>
                                            <td>{{ $account->account_number }}</td>
                                            <td>{{ $account->bank_name }}</td>
                                            <td>{{ $account->branch_name }}</td>
                                            <td>{{ $account->created_at }}</td>
                                            <td>
                                                <a href="{{ route('accounts.edit', $account->id) }}">
                                                    <i class='uil uil-pen btn-info btn-sm'></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" data-id="{{ $account->id }}"
                                                    data-title="{{ $account->title }}"
                                                    data-bs-target="#danger-header-modal">
                                                    <i class='uil uil-trash btn-danger btn-sm'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->

    <!-- Danger Header Modal -->
    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('accounts.destroy', 'destroy') }}" method="post">
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
