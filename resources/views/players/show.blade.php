@extends('layout')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/show_player.css') }}">
@endpush

@section('title',$player->name . " " . $player->surname)

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

<div id="background-image"> 
  
<div class="container text-center">    
  <br>
  <div class="row">
    <div id="basic_informations" class="col-sm-4">
            <tr>
              <td> {{ $player->info->shirt_number }} </td><br>
            </tr>
        <div id="name">
            <tr>
              <td> {{ $player->name }} </td><br>
              <td> {{ $player->surname }} </td><br>
            </tr>
        </div>
            <tr>
              <td> {{ $player->info->position }} </td><br>
            </tr>
    </div>

    <div id="player">
      <div class="col-sm-4"> 
          <img src="{{ $player->info->picture }}" class="img-responsive" alt="Image">   
      </div>
    </div>

    <div class="col-sm-4">
      <div class="well">
           <table class="table">
            <thead>
              <tr>
                <th class="text-center">Years</th>
               </tr>
            </thead>
            <tbody>
                    <tr>
                      <td> {{ $player->info->years }} </td>
                    </tr>      
            </tbody>
          </table>
           <table class="table">
            <thead>
              <tr>
                <th class="text-center">Nationality</th>
               </tr>
            </thead>
            <tbody>
                    <tr>
                      <td> {{ $player->info->nationality }} </td>
                    </tr>     
            </tbody>
          </table>
           <table class="table">
            <thead>
              <tr>
                <th class="text-center">Height</th>
               </tr>
            </thead>
            <tbody>
                    <tr>
                      <td> {{ $player->info->height }} </td>
                    </tr>        
            </tbody>
          </table>
           <table class="table">
            <thead>
              <tr>
                <th class="text-center">Weight</th>
               </tr>
            </thead>
            <tbody>
                    <tr>
                      <td> {{ $player->info->weight }} </td>
                    </tr>        
            </tbody>
          </table>
           <table class="table">
            <thead>
              <tr>
                <th class="text-center">Foot</th>
               </tr>
            </thead>
            <tbody>
                    <tr>
                      <td> {{ $player->info->foot }} </td>
                    </tr>
            </tbody>
          </table>
           <table class="table">
            <thead>
              <tr>
                <th class="text-center">Contract ends</th>
               </tr>

            </thead>
            <tbody>
                    <tr>
                      <td> {{ $player->info->contract_ends }} </td>
                    </tr>     
            </tbody>
          </table>

          @if(auth()->check() && auth()->user()->role == 3)
          <button onclick="window.location.href='/player/{{ $player->id }}/edit_informations'" type="button" class="btn btn-primary">Update info</button>
          @endif

      </div>
    </div>

  </div>
</div>

</div>

<br><br>

<div class="container down">

<div id="row">

 <div class="col-lg-6">
  <p>Statistics</p>
 </div>

@if(!empty($message))
  <div class="alert alert-danger"> {{ $message }}</div>
@endif

@if(!empty($player_statistics))
<form method="POST" action="/show/statistics/{{ $player->id }}">

@csrf

  <div class="col-lg-2">
  <div class="form-group">
    <i>Competition:</i> 
    <select id="competition_name" name="competition_name" class="form-control">
        <option value="null"></option> 
         <option value="{{ $player_statistics->competition_name }}" selected hidden>{{ $player_statistics->competition_name }}</option> 
        @foreach($player->statistics->unique('competition_name') as $s)
          <option value="{{ $s->competition_name }}">{{ $s->competition_name }}</option>
        @endforeach
      </select>
  </div>
 </div>  
  <div class="col-lg-2">
  <div class="form-group">
    <i>Year:</i> 
      <select id="year" name="year" class="form-control">
        <option value="null"></option>  
        <option value="{{ $player_statistics->year }}" selected hidden>{{ $player_statistics->year }}</option> 
        @foreach($player->statistics->unique('year') as $s)
          <option value="{{ $s->year }}">{{ $s->year }}</option>
        @endforeach
      </select>
  </div>
 </div>
<div class="col-lg-2">
 <button type="submit" name="submit" class="show_button">Show</button>
</div>
</form>
@endif

</div>

</div>

  
<div class="container down stat_circle">

@if(!empty($player_statistics))
<div class="col-lg-2 col-sm-6 col-xs-6">
<div id="circle"> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Goals</th>
      </tr>
    </thead>
    <tbody> 
           <tr>
              <td class="text-center"><span class="count"> {{ $player_statistics->goals }} </span></td>
            </tr>   
    </tbody>
  </table>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-xs-6">
<div id="circle"> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Assists</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td class="text-center"><span class="count"> {{ $player_statistics->assists }} </span></td>
            </tr>    
    </tbody>
  </table>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-xs-6">
<div id="circle"> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Matches played</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td class="text-center"><span class="count"> {{ $player_statistics->matches_played }} </span></td>
            </tr>   
    </tbody>
  </table>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-xs-6">
<div id="circle"> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Minutes played</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td class="text-center"><span class="count"> {{ $player_statistics->minutes_played }} </span></td>
            </tr>
    </tbody>
  </table>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-xs-6">
<div id="circle"> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Yellow cards</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td class="text-center"><span class="count"> {{ $player_statistics->yellow_cards }} </span></td>
            </tr>    
    </tbody>
  </table>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-xs-6">
<div id="circle"> 
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Red cards</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td class="text-center"><span class="count"> {{ $player_statistics->red_cards }} </span></td>
            </tr>   
    </tbody>
  </table>
</div>
</div>
@endif

@if(auth()->check() && auth()->user()->role == 3 && !empty($player_statistics))
<button onclick="window.location.href='/player/{{ $player->id }}/{{ $player_statistics->competition_name }}/{{ $player_statistics->year }}/edit_statistics'" type="button" class="btn btn-primary">Edit statistics</button>
@endif

  @if(auth()->check() && auth()->user()->role == 3)
  <div class="col-lg-2 statistics_button">
    <button onclick="window.location.href='/player/{{ $player->id }}/create_statistics'" type="button" class="btn btn-primary">Add statistics</button>
  </div>
  @endif

</div>




<br> <br> <br> <br> <br> <br>

  <footer class="container-fluid text-center">
    <p>Design by Dekster</p>
  </footer>


<script>
  function play() {
    $('.count').each(function () {
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
          duration: 4000,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now));
          }
      });
   });
  }
  play();
 </script>


@stop
