<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_reply extends Model
{
    protected $fillable = [
	'comment_id', 'name', 'text'
	];
}
