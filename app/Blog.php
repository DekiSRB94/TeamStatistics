<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
	'image', 'title', 'text'
	];


	public function comments()
    {
        return $this->hasMany('App\Comment', 'blog_id');
    }


}
