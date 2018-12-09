@extends('layouts.admin')


@section('content')

<h1>Edit Post</h1>

<div class="row">
	<div class="col-sm-3">
		<img height="100" src="{{$post->photo->file}}" alt="">
	</div>
	<div class="col-sm-9">
{!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('category_id', 'Category:') !!}
	{!! Form::select('category_id', [''=>'Choose a category'] + $categories , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('photo_id', 'Photo:') !!}
	{!! Form::file('photo_id', null) !!}
</div>
<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>
<div class="col-sm-6">
	{!! Form::submit('Update Post', ['class'=>'btn btn-primary pull-left']) !!}
</div>

{!! Form::close() !!}
	<div class="col-sm-6">
		{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
			{!! Form::submit('Delete Post', ['class'=>'btn btn-danger pull-right']) !!}
		{!! Form::close() !!}
	</div>
	</div>
</div>
@if(count($errors) > 0)

	@include('includes.form_error')

@endif
@stop