<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    public function user_mark () {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
