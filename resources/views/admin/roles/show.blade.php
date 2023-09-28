@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>Name:{{ $role->name }}</h4>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if (!empty($rolePermissions))
                    <ol>

                        @foreach ($rolePermissions as $v)
                            <li class="m-0">{{ $v->name }}</li>
                        @endforeach
                    </ol>
                @endif
            </div>
        </div>
    </div>
@endsection
