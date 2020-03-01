@extends('layouts.app')
@section('title', '| Permissions')
@section('content')
<div class="col-md-10 col-md-offset-1">
    <h1><i class="fa fa-key"></i>Permissions Management
    @can('view_users', 'add_users', 'view_users')
    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    @endcan
    @can('view_roles', 'add_roles', 'view_roles')
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    @endcan
    @can('view_permissions', 'add_permissions', 'view_permissions')
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
    @endcan
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    @can('edit_permissions', 'delete_permissions')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    @can('edit_permissions', 'delete_permissions')
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection