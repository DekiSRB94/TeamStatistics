@extends('layout')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
@endpush

@section('title','Create statistics')

@section('content')



<div class="container">

  @if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif

  <h2>Create statistics</h2>

  <form method="POST" action="/statistics/{{ $player->id }}">

    @csrf

       <div class="form-group">
         <p>Competition name:</p> 
         <select id="competition_name" name="competition_name" class="form-control {{ $errors->has('competition_name') ? 'alert-danger' : '' }}">
          <option hidden>{{ old('competition_name') }}</option>
          <option value="Champions League" <?php if(old('competition_name') == 'Champions League')  echo 'selected = "selected"'; ?>>Champions League</option>
          <option value="German Bundesliga" <?php if(old('competition_name') == 'German Bundesliga')  echo 'selected = "selected"'; ?>>German Bundesliga</option>
          <option value="German DFB-Pokal" <?php if(old('competition_name') == 'German DFB-Pokal')  echo 'selected = "selected"'; ?>>German DFB-Pokal</option>
          <option value="Supercup" <?php if(old('competition_name') == 'Supercup')  echo 'selected = "selected"'; ?>>Supercup</option>
        </select>
      </div>   
      <div class="form-group">
        <label for="usr">Year:</label>
        <input type="text" class="form-control {{ $errors->has('year') ? 'alert-danger' : '' }}" id="year" name="year" value="{{ old('year') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Goals:</label>
        <input type="text" class="form-control {{ $errors->has('goals') ? 'alert-danger' : '' }}" id="goals" name="goals" value="{{ old('goals') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Assists:</label>
        <input type="text" class="form-control {{ $errors->has('assists') ? 'alert-danger' : '' }}" id="assists" name="assists" value="{{ old('assists') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Matches played:</label>
        <input type="text" class="form-control {{ $errors->has('matches_played') ? 'alert-danger' : '' }}" id="matches_played" name="matches_played" value="{{ old('matches_played') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Minutes played:</label>
        <input type="text" class="form-control {{ $errors->has('minutes_played') ? 'alert-danger' : '' }}" id="minutes_played" name="minutes_played" value="{{ old('minutes_played') }}" required>
      </div> 
      <div class="form-group">
        <label for="usr">Red cards:</label>
        <input type="text" class="form-control {{ $errors->has('red_cards') ? 'alert-danger' : '' }}" id="red_cards" name="red_cards" value="{{ old('red_cards') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Yellow cards:</label>
        <input type="text" class="form-control {{ $errors->has('yellow_cards') ? 'alert-danger' : '' }}" id="yellow_cards" name="yellow_cards" value="{{ old('yellow_cards') }}" required>
      </div>


    <div id="row">
      <div class="col-lg-2 col-xs-4">
        <div id="add_button">
          <button type="submit" class="btn btn-primary">Add statistics</button>
        </div>
      </div>

      <div class="col-lg-2 col-xs-4">
        <div id="cancel_button">
          <button onclick="window.location.href='/players/{{ $player->id }}'" type="button" class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </div>

  </form>


@include('errors')


</div>


@stop
