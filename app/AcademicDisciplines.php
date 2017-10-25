<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicDisciplines extends Model
{
	public function group_discipline() {
    	return $this->belongsToMany('App\Group', 'disciplines_groups', 'discipline_id', 'group_id')->withPivot('hours');
	}
}
