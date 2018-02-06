<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiting extends Model
{
    protected $fillable = [
        'passes', 'comment', 'user_id',  'discipline_id', 'date',
    ];

    protected $dates = [
        'date',
    ];

    public function user_pass () {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
