<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professions extends Model
{
    public function group() {
    	return $this->hasMany('App\Group', 'profession_id', 'id');
    }
}
