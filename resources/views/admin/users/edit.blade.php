@extends('layouts.admin')


@section('content')

<h1>Create User</h1>
<div class="row">
<div class="col-sm-3">
	
	<img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" height="100" alt="" class="img-responsive img-round">

</div>

<div class="col-sm-9">

{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

	<div class="form-group">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('role', 'Role:') !!}
		{!! Form::select('role_id',[''=>'Choose an option'] + $roles, null , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('is_active', 'Status:') !!}
		{!! Form::select('is_active',[1=>'Active', 0=>'Not Active'] , null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id') !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>
	<div class="col-sm-6">
		{!! Form::submit('Update User', ['class'=>'btn btn-primary pull-left']) !!}
	</div>
{!! Form::close() !!}
	<div class="col-sm-6">
		{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
			{!! Form::submit('Delete User', ['class'=>'btn btn-danger pull-right']) !!}
		{!! Form::close() !!}
	</div>
</div>


</div>
<div class="row">
@if(count($errors) > 0)
@include('includes.form_error')
@endif
</div>

@stop