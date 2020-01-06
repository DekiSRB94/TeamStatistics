@extends('layout')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
@endpush

@section('title', 'Update blog')

@section('content')


<div class="container">
	<form method="POST" action="/update_blog/{{ $blog->id }}">

		@csrf
		@method('PATCH')

		 <div class="form-group">
	      <label for="usr">Image:</label>
	      <input type="text" class="form-control" id="image" name="image" value="{{ $blog->image }}">
	    </div>
	    <div class="form-group">
	      <label for="usr">Title:</label>
	      <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
	    </div>
	    <div class="form-group">
	      <label for="usr">Text:</label>
	      <textarea name="text">{{ $blog->text }}</textarea>
	    </div>
	    <button type="submit">Update blog</button>
	    <button onclick="window.location.href='/show/blog/{{ $blog->id }}'" type="button">Cancel</button>
	</form>

@include('errors')
</div>


@stop