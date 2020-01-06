@extends('layout')

@section('title', 'Players')

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
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/players">Players</a></li>
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
      <p>On this page you can see all players.</p>
      <hr>


<div class="container">
           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th></th>
        @if(auth()->check() && auth()->user()->role == 3)
        <th></th>
        <th></th>
        @endif
      </tr>
    </thead>
    <tbody>

      @foreach($player as $p)

      <tr>
        <td> {{ $p->name }} </td>
        <td> {{ $p->surname }} </td>

        <td> <button onclick="window.location.href='players/{{ $p->id }}'" type="button" class="btn btn-primary">Details</button> </td>

        @if(auth()->check() && auth()->user()->role == 3)
        <td> <button onclick="window.location.href='players/{{ $p->id }}/edit'" type="button" class="btn btn-primary">Update</button> </td>
        @endif

        @if(auth()->check() && auth()->user()->role == 3)
        <form method="POST" action="players/{{ $p->id }}">

          @method('DELETE')
          @csrf

          <td> <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Delete</button> </td>
        </form>
        @endif

      </tr>

      @endforeach

    </tbody>

    </table>

    @if(auth()->check() && auth()->user()->role == 3)
      <button onclick="window.location.href='players/create'" type="button" class="btn btn-primary">Add new player</button>
    @endif

    
  
</div>



    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Design by Dekster</p>
</footer>



@stop
