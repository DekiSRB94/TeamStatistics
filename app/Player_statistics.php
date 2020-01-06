<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_statistics extends Model
{
    
	 protected $fillable = [
		'player_id', 'competition_name', 'year', 'goals', 'assists', 'matches_played', 'minutes_played', 'red_cards', 'yellow_cards'
	];

}
