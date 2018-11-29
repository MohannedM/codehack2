@extends('layouts.admin');


@section('content')


<h1>Categories</h1>
<div class="row">
	<div class="col-sm-6">
		{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		
			{!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6']) !!}

		{!! Form::close() !!}
		{!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
			{!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
		{!! Form::close() !!}

	</div>
	<div class="col-sm-6">
	</div>
</div>

@stop