<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
	protected $table = 'navigation';

	public $timestamps = false;

	public function sub_navigation() {
        return $this->hasMany('App\Sub_navigation', 'parent_id', 'id');
	}
}
