@extends('layout')

@section('title', 'Create reply')

@section('content')

<div class="container">
<form method="POST" action="/reply/{{ $comment->id }}/{{ $blog->id }}">

      @csrf

      <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}" id="name" name="name" value="{{ old('name') }}" required />
      </div> 
      <div class="form-group">
        <label for="usr">Text:</label>
        <textarea type="text" class="form-control {{ $errors->has('text') ? 'alert alert-danger' : '' }}" id="text" name="text" value="{{ old('text') }}" required /></textarea>
      </div>  
      <button type="submit">Add reply</button>   
      <button onclick="window.location.href='/show/blog/{{ $blog->id }}'">Cancel</button>
</form>
	
	@include('errors');

</div>


  @stop