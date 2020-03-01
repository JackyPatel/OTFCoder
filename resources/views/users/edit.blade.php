@extends('layouts.app')
@section('title', '| Update User')
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-user-plus'></i> Update {{$user->name}}</h1>
    <hr>
    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
    <div class="form-group @if ($errors->has('first_name')) has-error @endif">
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group @if ($errors->has('last_name')) has-error @endif">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group @if ($errors->has('email')) has-error @endif">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>
    <h5><b>Assign Role</b></h5>
    <div class="form-group @if ($errors->has('roles')) has-error @endif">
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        @endforeach
    </div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group @if ($errors->has('password')) has-error @endif">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
@endsection