<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'name', 'surname', 'login', 'email', 'password', 'group_id', 'stud_number', 'birthday', 'note',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
    ];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group() {
        return $this->hasOne('App\Group', 'id', 'group_id');
    }

    public function discipline() {
        return $this->hasOne('App\AcademicDisciplines', 'id', 'discipline_id');
    }

    public function pass() {
        return $this->hasMany('App\Visiting', 'user_id', 'id');
    }

    public function mark() {
        return $this->hasMany('App\Marks', 'user_id', 'id');
    }

    public function examMarks()
    {
        return $this->mark()
            ->where(function ($where_sql) {
                $where_sql->whereIn('role_id', [3, 4]);
            });
    }

    public function studentAvg()
    {
        return $this->examMarks()
            ->get()
            ->map(function(Marks $mark) {
                return $mark->mark;
            })
            ->avg();
    }

    // public function roles() {
    //     return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    // }

     // public function isEmployee()
     // {
     //     $roles = $this->roles->toArray();
     //     return !empty($roles);
     // }

    // public function hasRole($check)
    // {
    //     return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    // }

    // public function isAdmin() 
    // {
    //       return !!$this->roles()->where('name', 'admin')->count();    
    // }    

    // public function isOperator()    
    // {      
    //     return !!$this->roles()->where('name', 'operator')->count();    
    // }

    // public function isTeacher()    
    // {      
    //     return !!$this->roles()->where('name', 'teacher')->count();    
    // }

     // private function getIdInArray($array, $term)
     // {
     //     foreach ($array as $key => $value) {
     //         if ($value == $term) {
     //             return $key;
     //         }
     //     }
 
     //     throw new UnexpectedValueException;
     // }

     //  public function makeEmployee($title)
     // {
     //     $assigned_roles = array();
 
     //     $roles = array_fetch(Role::all()->toArray(), 'name');
 
     //     switch ($title) {
     //         case 'super_admin':
     //             $assigned_roles[] = $this->getIdInArray($roles, 'edit_customer');
     //             $assigned_roles[] = $this->getIdInArray($roles, 'delete_customer');
     //         case 'admin':
     //             $assigned_roles[] = $this->getIdInArray($roles, 'create_customer');
     //         case 'concierge':
     //             $assigned_roles[] = $this->getIdInArray($roles, 'add_points');
     //             $assigned_roles[] = $this->getIdInArray($roles, 'redeem_points');
     //             break;
     //        default:
     //             throw new \Exception("The employee status entered does not exist");
     //     }
 
     //     $this->roles()->attach($assigned_roles);
     // }

    public function scopeOfGroup($query, $group_id)
    {
        return $query->where('group_id', $group_id);
    }

//    public function isAdmin()
//    {
//        return false;
//    }
//
//    public function isTeacher()
//    {
//        return false;
//    }
}
