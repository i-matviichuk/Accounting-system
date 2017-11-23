<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $fillable = [
        'mark', 'comment', 'user_id',  'discipline_id', 'role_id', 'date',
    ];

    protected $dates = [
        'date',
    ];

    public function user_mark () {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function marks_roles()
    {
        return $this->hasOne('App\MarksRoles', 'id', 'role_id');
    }
}
