@extends('layout')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
@endpush

@section('title', 'Update player statistics')

@section('content')


<div class="container">
  <h2>Update statistics</h2>

  <form method="POST" action="/statistics/{{ $player_statistics->player_id }}/{{ $player_statistics->competition_name }}/{{ $player_statistics->year }}">

    @method('PATCH')
    @csrf

      <div class="form-group">
        <label for="usr">Competition name:</label>
        <input type="text" class="form-control {{ $errors->has('competition_name') ? 'alert-danger' : '' }}" id="competition_name" name="competition_name" value="{{ $player_statistics->competition_name }}" value="{{ old('competition_name') }}">
      </div>    
      <div class="form-group">
        <label for="usr">Year:</label>
        <input type="text" class="form-control {{ $errors->has('year') ? 'alert-danger' : '' }}" id="year" name="year" value="{{ $player_statistics->year }}" value="{{ old('year') }}">
      </div>
      <div class="form-group">
        <label for="usr">Goals:</label>
        <input type="text" class="form-control {{ $errors->has('goals') ? 'alert-danger' : '' }}" id="goals" name="goals" value="{{ $player_statistics->goals }}" value="{{ old('goals') }}">
      </div>
      <div class="form-group">
        <label for="usr">Assists:</label>
        <input type="text" class="form-control {{ $errors->has('assists') ? 'alert-danger' : '' }}" id="assists" name="assists" value="{{ $player_statistics->assists }}" value="{{ old('assists') }}">
      </div>
      <div class="form-group">
        <label for="usr">Matches played:</label>
        <input type="text" class="form-control {{ $errors->has('matches_played') ? 'alert-danger' : '' }}" id="matches_played" name="matches_played" value="{{ $player_statistics->matches_played }}" value="{{ old('matches_played') }}">
      </div>
      <div class="form-group">
        <label for="usr">Minutes played:</label>
        <input type="text" class="form-control {{ $errors->has('minutes_played') ? 'alert-danger' : '' }}" id="minutes_played" name="minutes_played" value="{{ $player_statistics->minutes_played }}" value="{{ old('minutes_played') }}">
      </div> 
      <div class="form-group">
        <label for="usr">Red cards:</label>
        <input type="text" class="form-control {{ $errors->has('red_cards') ? 'alert-danger' : '' }}" id="red_cards" name="red_cards" value="{{ $player_statistics->red_cards }}" value="{{ old('red_cards') }}">
      </div>
      <div class="form-group">
        <label for="usr">Yellow cards:</label>
        <input type="text" class="form-control {{ $errors->has('yellow_cards') ? 'alert-danger' : '' }}" id="yellow_cards" name="yellow_cards" value="{{ $player_statistics->yellow_cards }}" value="{{ old('yellow_cards') }}">
      </div>
      <input type="hidden" name="statistics_id" value="{{ $player_statistics -> id }}" />

    <div id="row">
      <div class="col-lg-2 col-xs-4">
        <div id="add_button">
          <button type="submit" class="btn btn-primary">Update info</button>
        </div>
      </div>

      <div class="col-lg-2 col-xs-4">
        <div id="cancel_button">
          <button onclick="window.location.href='/players/{{ $player_statistics->player_id }}'" type="button" class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </div>

  </form>


  @if ($errors->any())
  <div id="alert" class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)

      <li>{{ $error }}</li>

    @endforeach
    </ul>
  </div>
  @endif


</div>


@stop