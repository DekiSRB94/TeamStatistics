@extends('layout')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
@endpush

@section('title', 'Create blog')

@section('content')


<div class="container">
	<form method="POST" action="/blog">

		@csrf

		 <div class="form-group">
	      <label for="usr">Image:</label>
	      <input type="text" class="form-control" id="image" name="image">
	    </div>
	    <div class="form-group">
	      <label for="usr">Title:</label>
	      <input type="text" class="form-control" id="title" name="title">
	    </div>
	    <div class="form-group">
	      <label for="usr">Text:</label>
	      <textarea name="text"></textarea>
	    </div>
	    <button type="submit">Create blog</button>
	    <button onclick="window.location.href='/'" type="button">Cancel</button>
	</form>

@include('errors')
</div>


@stop