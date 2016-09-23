<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

	public function created_user() {
        return $this->belongsTo('App\User', 'created_user_id', 'id');
	}

	public function edited_user() {
        return $this->belongsTo('App\User', 'edited_user_id', 'id');
	}
}
