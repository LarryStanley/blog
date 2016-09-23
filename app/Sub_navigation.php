<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_navigation extends Model
{
	protected $table = 'sub_navigation';

	public $timestamps = false;

	public function navigation() {
        return $this->belongsTo('App\Navigation', 'parent_id', 'id');
	}
}
