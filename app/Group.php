<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_number', 'profession_id', 'curator_id',
    ];

	public function curator()
	{
    	return $this->hasOne('App\User', 'id', 'curator_id');
	}

	public function profession() 
	{
		return $this->hasOne('App\Professions', 'id', 'profession_id');
	}

    public function disciplines()
    {
        return $this->hasMany(AcademicDisciplines::class, 'group_id', 'id');
    }

//	public function attachDiscipline($discipline_id)
//	{
//		$this->disciplines()->attach($discipline_id);
//		return $this;
//	}
}
