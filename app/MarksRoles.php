<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarksRoles extends Model
{
    protected $fillable = [
        'role_name',
    ];

    public function marks_roles()
    {
        return $this->hasMany('App\Marks', 'role_id', 'id');
    }
}
