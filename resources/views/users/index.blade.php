@extends('layouts.app')
@section('title', '| Users')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> User Management 
    @can('view_roles', 'add_roles', 'view_roles')
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    @endcan
    @can('view_permissions', 'add_permissions')
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
    @endcan
    @can('add_users')
    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
    @endcan
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    @can('edit_users', 'delete_users')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                    @can('edit_users', 'delete_users')
                    <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    @can('delete_users')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endcan
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection