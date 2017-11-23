<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professions extends Model
{
    protected $fillable = [
        'specialty_title',
    ];
    public function group() {
    	return $this->hasMany('App\Group', 'profession_id', 'id');
    }
}
