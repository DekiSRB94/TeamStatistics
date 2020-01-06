@extends('layout')

@section('title', 'Update player')

@section('content')


<div class="container">
  <h2>Update player</h2>

  <form method="POST" action="/players/{{ $player->id }}">

    @method('PATCH')
    @csrf

    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control {{ $errors->has('year') ? 'alert-danger' : '' }}" id="name" name="name" value="{{ $player->name }}" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
      <label for="usr">Surname:</label>
      <input type="text" class="form-control {{ $errors->has('year') ? 'alert-danger' : '' }}" id="surname" name="surname" value="{{ $player->surname }}" value="{{ old('surname') }}" required>
    </div>

    <div id="row">
      <div class="col-lg-2 col-xs-4">
        <div id="add_button">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>

      <div class="col-lg-2 col-xs-4">
        <div id="cancel_button">
          <button onclick="window.location.href='/players'" type="button" class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </div>

  </form>


@include('errors')


</div>


@stop
