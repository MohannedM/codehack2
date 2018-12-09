@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop

@section('content')

<h1>Medias</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'files'=>true, 'class'=>'dropzone']) !!}

{!! Form::close() !!}

@stop


@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop