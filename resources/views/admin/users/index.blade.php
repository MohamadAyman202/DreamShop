@extends('admin.layouts.app')

@section('title')
    users
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($admins as $key => $admin)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    @if (!empty($admin->getRoleNames()))
                        @foreach ($admin->getRoleNames() as $v)
                            <label class="bg-success px-3 py-1 text-light "
                                style="border-radius: 20px">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('users.show', $admin->id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('users.edit', $admin->id) }}">Edit</a>
                    <a href="" data-bs-toggle="modal" data-id="{{ $admin->id }}"
                        data-roles="{{ $admin->getRoleNames() }}" class="btn btn-danger" data-title="{{ $admin->name }}"
                        data-bs-target="#danger-header-modal">
                        Delete
                    </a>

                </td>
            </tr>
        @endforeach

        @foreach ($users as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <label class="bg-info px-3 py-1 text-light "
                        style="border-radius: 20px">{{ $user->getRoleNames() ? 'User' : '' }}</label>
                </td>
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <a href="" data-bs-toggle="modal" data-id="{{ $user->id }}"
                        data-roles="{{ !$admin->getRoleNames() ? $admin->getRoleNames() : 'User' }}" class="btn btn-danger"
                        data-title="{{ $user->name }}" data-bs-target="#danger-header-modal">
                        Delete
                    </a>

                </td>
            </tr>
        @endforeach

    </table>


    <!-- Danger Header Modal -->
    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('users.destroy', 'destroy') }}" method="post">
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
                        <input type="hidden" name="roles" id="roles">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {!! $users->render() !!}
@endsection
@section('js')
    <script>
        $('#danger-header-modal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');
            var title = button.data('title')
            var roles = button.data('roles')
            var modal = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #roles').val(roles);
            modal.find('.modal-header #title').html(title);
        });
    </script>
@endsection
