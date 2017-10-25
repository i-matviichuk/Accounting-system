<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiting extends Model
{
    public function user_pass () {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
