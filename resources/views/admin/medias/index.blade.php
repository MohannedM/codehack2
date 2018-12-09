@extends('layouts.admin')

@section('content')

<h1>Medias</h1>

@if($photos)
	<form action="delete/media" method="post" class="form-inline">
		{{csrf_field()}}
		{{method_field('delete')}}
		<div class="form-group">
			<select class="form-control">
				<option value="">Delete</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="delete_all" class="btn btn-primary">
		</div>

<table class="table">
	<thead>
		<tr>
			<th><input type="checkbox" id="options"></th>
			<th>Id</th>
			<th>Photo</th>
			<th>Created At</th>
			<!-- <th>Delete</th> -->
		</tr>
	</thead>
	@foreach($photos as $photo)
	<tbody>
		<tr>
			<td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></td>
			<td>{{$photo->id}}</td>
			<td><img height="100" src="{{$photo->file}}" alt=""></td>
			<td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}</td>
<!-- 			<td>

				<input type="hidden" name="photo" value="{{$photo->id}}">
					<input type="submit" value="Delete" name="single_delete" class="btn btn-danger">
			</td> -->
		</tr>
	</tbody>
	@endforeach
</table>
</form>
@endif

@stop
@section('footer')

<script>
	$(document).ready(function(){
		console.log('hi');
		$('#options').click(function(){
			if(this.checked){
				$('.checkBoxes').each(function(){
					this.checked = true;
				});
			} else {
				$('.checkBoxes').each(function(){
					this.checked = false;
				});
			}
		});
	});
</script>
@stop

