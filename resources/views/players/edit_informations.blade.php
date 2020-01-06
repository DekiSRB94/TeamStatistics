@extends('layout')

@section('title', 'Edit informations')

@section('content')


<div class="container">
  <h2>Edit informations</h2>

  <form method="POST" action="/informations/{{ $player->id }}">

    @method('PATCH')
    @csrf

    @foreach($player_more_information as $p)
     @if($p->id == $player->id)
      <div class="form-group">
        <label for="usr">Picture:</label>
        <input type="text" class="form-control {{ $errors->has('picture') ? 'alert-danger' : '' }}" id="picture" name="picture" value="{{ $p->picture }}" value="{{ old('picture') }}" required>
      </div>    
      <div class="form-group">
        <label for="usr">Shirt number:</label>
        <input type="text" class="form-control {{ $errors->has('shirt_number') ? 'alert-danger' : '' }}" id="shirt_number" name="shirt_number" value="{{ $p->shirt_number }}" value="{{ old('shirt_number') }}" required>
      </div>
       <div class="form-group">
         <p>Position:</p> 
         <select id="position" name="position" class="form-control {{ $errors->has('position') ? 'alert-danger' : '' }}">
          <option value="Goalkeeper" <?php if($p->position == 'Goalkeeper')  echo 'selected = "selected"'; ?> >Goalkeeper</option>
          <option value="Defender" <?php if($p->position == 'Defender')  echo 'selected = "selected"'; ?> >Defender</option>
          <option value="Midlfield" <?php if($p->position == 'Midlfield')  echo 'selected = "selected"'; ?> >Midlfield</option>
          <option value="Forward" <?php if($p->position == 'Forward')  echo 'selected = "selected"'; ?> >Forward</option>
        </select>
      </div>
      <div class="form-group">
        <label for="usr">Years:</label>
        <input type="text" class="form-control {{ $errors->has('years') ? 'alert-danger' : '' }}" id="years" name="years" value="{{ $p->years }}" value="{{ old('years') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Nationality:</label>
        <input type="text" class="form-control {{ $errors->has('nationality') ? 'alert-danger' : '' }}" id="nationality" name="nationality" value="{{ $p->nationality }}" value="{{ old('nationality') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Height:</label>
        <input type="text" class="form-control {{ $errors->has('height') ? 'alert-danger' : '' }}" id="height" name="height" value="{{ $p->height }}" value="{{ old('height') }}" required>
      </div>
      <div class="form-group">
        <label for="usr">Weight:</label>
        <input type="text" class="form-control {{ $errors->has('weight') ? 'alert-danger' : '' }}" id="weight" name="weight" value="{{ $p->weight }}" value="{{ old('weight') }}" required>
      </div> 
      <div class="form-group">
         <p>Foot:</p> 
         <select id="foot" name="foot" class="form-control {{ $errors->has('foot') ? 'alert-danger' : '' }}">
          <option hidden selected value="{{ $p->foot }}" value="{{ old('foot') }}">{{ $p -> foot }}</option>
          <option>R</option>
          <option>L</option>
        </select>
      </div>
      <div class="form-group">
        <label for="usr">Contract ends:</label>
        <input type="text" class="form-control {{ $errors->has('contract_ends') ? 'alert-danger' : '' }}" id="contract_ends" name="contract_ends" value="{{ $p->contract_ends }}" value="{{ old('contract_ends') }}" required>
      </div>
     @endif
    @endforeach

    <div id="row">
      <div class="col-lg-2 col-xs-4">
        <div id="add_button">
          <button type="submit" class="btn btn-primary">Update info</button>
        </div>
      </div>

      <div class="col-lg-2 col-xs-4">
        <div id="cancel_button">
          <button onclick="window.location.href='/players/{{ $player -> id }}'" type="button" class="btn btn-primary">Cancel</button>
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
