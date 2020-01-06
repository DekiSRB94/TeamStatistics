<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    
	protected $fillable = [
	'name', 'surname'
];

    public function info()
    {
        return $this->hasOne('App\Player_more_information', 'player_id');
    }


	public function statistics()
    {
        return $this->hasMany('App\Player_statistics', 'player_id');
    }


}
