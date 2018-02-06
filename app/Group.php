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

    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function groupAvg()
    {
        return $this->students()
            ->whereHas('mark', function($sql) {
                $sql->whereIn('role_id', [3, 4]);
            })
            ->get()
            ->map(function (User $student) {
                $count_marks = $student->mark()->count();
                if ($count_marks > 0) {
                    return $student->mark()->sum('mark') / $count_marks;
                }
                return 0;
            });
    }
}
