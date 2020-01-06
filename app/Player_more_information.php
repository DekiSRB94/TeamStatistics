<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_more_information extends Model
{
    protected $fillable = [
		'picture', 'years', 'nationality', 'height', 'weight', 'position', 'shirt_number', 'contract_ends', 'foot'
	];
}
