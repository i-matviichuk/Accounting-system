<?php

namespace App\Http\Controllers;

use App\AcademicDisciplines;
use App\Marks;
use App\Professions;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function showGroupProfile(Group $group, User $user, AcademicDisciplines $academicDisciplines, Marks $marks) {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher'))
        {
            $users = User::all();
            $marks = Marks::orderBy('date', 'asc')->get();
            $academicDisciplines = AcademicDisciplines::all();
            return view('group', ['group' => $group, 'users' => $users, 'disciplines' => $academicDisciplines, 'marks' => $marks]);
        }
        else {
           return redirect()->back();
        }
//        $marks = $marks->groupBy('date');
    }


    public function showGroups(Group $group, User $user) {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher'))
        {
            $groups = Group::orderBy('id', 'desc')->get();
            $users = User::all();
            return view('groups')->with(['groups' => $groups, 'users' => $users]);
        }
        else {
            return redirect()->back();
        }
    }

    public function showForm(User $user, Professions $professions, Role $role) {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher')) {
            $teachers = User::all();
            $professions = Professions::all();
            return view('add_group')->with(['teachers' => $teachers, 'professions' => $professions]);
        }
        else {
            return redirect()->back();
        }
    }

    public function showEdit(Group $group, Professions $professions, User $user)
    {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher'))
        {
            $professions = Professions::all();
            $teachers = User::all();
            return view('edit_group', ['group' => $group, 'teachers' => $teachers, 'professions' => $professions]);
        }
        else
        {
            return redirect()->back();
        }
    }

    public function updateGroup(Request $request, Group $group)
    {
        if($request->input('group_number') != NULL) {
            $group->group_number = $request->input('group_number');
        }
        if($request->input('profession_id') != "Спеціальність..") {
            $group->profession_id = $request->input('profession_id');
        }
        if($request->input('surname') != "Куратор..") {
            $group->curator_id = $request->input('curator_id');
        }

        $group->save();
        return redirect()->route('showGroupProfile', $group->id);
    }

    public function addGroup(Request $request)
    {
        if(Auth::user()->hasRole('admin') ||  Auth::user()->hasRole('teacher') || Auth::user()->hasRole('teacher'))
        {
            $data['group_number'] = $request->input('group_number');
            if($request->input('profession_name') != "Спеціальність..")
            {
                $data['profession_id'] = $request->input('profession_name');
            }
            else {
                return redirect()->back();
            }

            if($request->input('curator_name') != "Куратор..")
            {
                $data['curator_id'] = $request->input('curator_name');
            }
            else {
                return redirect()->back();
            }
            $group = Group::create($data);
            return redirect()->route('showGroups');
        }
        else
        {
            return redirect()->back();
        }
    }
}
