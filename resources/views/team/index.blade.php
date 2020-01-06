@extends('layout')

@section('title', 'Bayern Munchen')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
@endpush

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

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>

      @if(auth()->check() && Auth()->user()->role == 3)
      <button onclick="window.location.href='/blog/create'">Add blog</button>
      @endif

      <h3>Blog</h3>

      <div class="container-fluid">
      <div class="blog">
        <div class="row">
          @foreach($blog as $b)
          <div class="col-sm-6">
            <h4>{{ $b->title }}</h4>
            <img class="small_image" src="{{ $b->image }}">
            <p> {{ substr($b->text, 0, 80) }} ... </p>
          <button onclick="window.location.href='/show/blog/{{ $b->id }}'" class="show_button">Show more</button>

            @if(auth()->check() && auth()->user()->role == 3)
            <form method="POST" action="/blog/{{ $b->id }}">

              @csrf
              @method('DELETE')

            <button type="submit" class="show_button" onclick="return confirm('Are you sure ?')">Delete</button>
            </form>
            @endif
            </div>
          @endforeach
        </div>
      </div>
      </div>

    </div>



    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer>
  <p>Design by Dekster</p>
</footer>

@stop
