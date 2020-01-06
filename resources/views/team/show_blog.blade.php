@extends('layout')

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
@endpush

@section('title', $blog->title)

@section('content')

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <div id="logo">
      <a  href="/"><img class="img-responsive"       
       src="/images/logo.png"></a>
    </div>   
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/players">Players</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(!auth()->check())
        <li><a href="/home"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @endif
        @if(auth()->check())
        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>


	<div class="container">
		
		<h3>{{ $blog->title }}</h3>

		<br><br>

		<img src="{{ $blog->image }}">

		<br><br><br>

		<p>{{ $blog->text }}</p>

    @if(auth()->check() && auth()->user()->role == 3)
		<button class="blog_button" onclick="window.location.href='/team/{{ $blog->id }}/edit_blog'" type="button">Edit blog</button>
    @endif

		<br><br><br><br><br><br>


    <form method="POST" action="/comment/{{ $blog->id }}">

      @csrf

      <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}" id="name" name="name" value="{{ old('name') }}" required />
      </div>
      <div class="form-group">
        <label for="usr">Title:</label>
        <input type="text" class="form-control {{ $errors->has('title') ? 'alert alert-danger' : '' }}" id="title" name="title" value="{{ old('title') }}" required />
      </div>   
      <div class="form-group">
        <label for="usr">Text:</label>
        <textarea type="text" class="form-control {{ $errors->has('text') ? 'alert alert-danger' : '' }}" id="text" name="text" value="{{ old('text') }}" required /></textarea>
      </div>  
      <button type="submit">Add comment</button>   
    </form>

    <br><br>

     <div class="comments">
      <h4>Comments</h4>
      @foreach($blog->comments as $c)
        <div class="comment_name">
          <p>Name: {{ $c->name }}</p>
        </div>
        <div class="comment_title">
          <p>Title: {{ $c->title }}</p>
        </div>   
        <p class="comment_text">Comment: <br> {{ $c->text }}</p>
        @if(auth()->check() && auth()->user()->role == 3)
        <form method="POST" action="/comment/{{ $c->id }}/{{ $blog->id }}">

          @csrf
          @method('DELETE')

        <button type="submit" onclick="return confirm('Are you sure ?')">Delete comment</button>
        </form>
        @endif
        <div class="reply">
          <button class="reply_button" onclick="window.location.href='/reply/create/{{ $c->id }}/{{ $blog->id }}'">Reply</button>
          @foreach($c->replies as $r)
            <div class="reply_name">
            <p>Name: {{ $r->name }}</p>
          </div>
          <div class="reply_text">
            <p>Text: <br> {{ $r->text }}</p>
          </div>
          @if(auth()->check() && auth()->user()->role == 3)
          <form method="POST" action="/reply/{{ $r->id }}/{{ $blog->id }}">

          @csrf
          @method('DELETE')

        <button type="submit" onclick="return confirm('Are you sure ?')">Delete reply</button>
        </form>
        @endif
          <br>
          @endforeach
        </div>
        <br><br><br>
      @endforeach
    </div>


    <br><br><br><br><br><br>

	</div>


	<footer>
	  <p>Design by Dekster</p>
	</footer>



@stop