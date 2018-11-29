@extends('layouts.admin')


@section('content')

<h1>Users</h1>


@if(Session::has('deleted_user'))
	
	<p class="alert-danger">The user has been deleted</p>

@endif

@if($users)
<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
			<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
			<td>{{$user->email}}</td>
			<td>{{$user->role->name}}</td>
			<td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
			<td>{{$user->created_at->diffForHumans()}}</td>
			<td>{{$user->updated_at->diffForHumans()}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

@stop