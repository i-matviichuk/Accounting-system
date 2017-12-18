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
    public function showGroupProfile(Group $group, User $user, AcademicDisciplines $academicDisciplines, Marks $marks)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher')) {
            $users = User::all();
            $marks = Marks::orderBy('date', 'asc')->get();
            $academicDisciplines = AcademicDisciplines::all();
            return view('group', ['group' => $group, 'users' => $users, 'disciplines' => $academicDisciplines, 'marks' => $marks]);
        } else {
            return redirect()->back();
        }
//        $marks = $marks->groupBy('date');
    }


    public function showGroups(Group $group, User $user, Marks $marks)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher')) {
            $marks = Marks::all();
            $groups = Group::orderBy('id', 'desc')->get();
            $users = User::all();
            return view('groups')->with(['groups' => $groups, 'users' => $users]);
        } else {
            return redirect()->back();
        }
    }

    public function showForm(User $user, Professions $professions, Role $role)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher')) {
            $teachers = User::all();
            $professions = Professions::all();
            return view('add_group')->with(['teachers' => $teachers, 'professions' => $professions]);
        } else {
            return redirect()->back();
        }
    }

    public function showEdit(Group $group, Professions $professions, User $user)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher')) {
            $professions = Professions::all();
            $teachers = User::all();
            return view('edit_group', ['group' => $group, 'teachers' => $teachers, 'professions' => $professions]);
        } else {
            return redirect()->back();
        }
    }

    public function updateGroup(Request $request, Group $group)
    {
        $this->validate($request, [
            'group_number' => 'required|string|max:255',
            'profession_id' => 'required|integer|max:255',
            'curator_id' => 'required|integer|max:255',
        ]);
        if ($request->input('group_number') != NULL) {
            $group->group_number = $request->input('group_number');
        }
        if ($request->input('profession_id') != "Спеціальність..") {
            $group->profession_id = $request->input('profession_id');
        }
        if ($request->input('curator_id') != "Куратор..") {
            $group->curator_id = $request->input('curator_id');
        }

        $group->save();
        if ($group->save()) {
            flash()->success('Успішно оновлено');
        } else {
            flash()->error('Помилка при оновленні!');
        }
        return redirect()->route('showGroupProfile', $group->id);
    }

    public function addGroup(Request $request)
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher') || Auth::user()->hasRole('teacher')) {
            $this->validate($request, [
                'group_number' => 'required|string|max:255',
                'profession_name' => 'required|integer|max:255',
                'curator_name' => 'required|integer|max:255',
            ]);
            $data['group_number'] = $request->input('group_number');
            $data['profession_id'] = $request->input('profession_name');
            $data['curator_id'] = $request->input('curator_name');
            $group = Group::create($data);
            if ($group) {
                flash()->success('Групу успішно створено');
            } else {
                flash()->error('Помилка при створенні!');
            }
            return redirect()->route('showGroups');
        } else {
            return redirect()->back();
        }
    }
}
