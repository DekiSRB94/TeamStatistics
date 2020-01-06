<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
protected $fillable = [
	'blog_id', 'name', 'title', 'text'
];

public function replies(){
	return $this->hasMany('App\Comment_reply', 'comment_id');
}

}
