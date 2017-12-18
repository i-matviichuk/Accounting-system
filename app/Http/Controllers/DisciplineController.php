<?php

namespace App\Http\Controllers;

use App\AcademicDisciplines;
use App\Group;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function showForm(User $user, Role $role, Group $group)
    {
        $teachers = User::all();
        return view('add_discipline', ['teachers' => $teachers, 'group' => $group]);
    }

    public function addDiscipline(Group $group, Request $request)
    {
        $this->validate($request, [
            'discipline_title' => 'required|string|max:255',
            'teacher_name' => 'required|integer|max:255',
            'hours' => 'required|integer|max:255',
        ]);
        $data['discipline_title'] = $request->input('discipline_title');

        if($request->input('teacher_name') != "Викладач..")
        {
            $data['teacher_id'] = $request->input('teacher_name');
        }
        else {
            return redirect()->back();
        }

        $data['group_id'] = $group->id;

        $data['hours'] = $request->input('hours');
        $discipline = AcademicDisciplines::create($data);
        return redirect()->route('addDiscipline', $group->id);
    }
}
