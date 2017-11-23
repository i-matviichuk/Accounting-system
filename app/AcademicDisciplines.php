<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicDisciplines extends Model
{
    protected $fillable = [
        'group_id', 'name', 'teacher_id', 'discipline_title', 'hours',
    ];

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }
}

