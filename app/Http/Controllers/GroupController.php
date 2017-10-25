<?php

namespace App\Http\Controllers;

use App\Professions;
use Illuminate\Http\Request;
use App\User;
use App\Group; 

class GroupController extends Controller
{
    public function showGroupProfile(Group $group, User $user) {
        $groups = Group::all();
        $users = User::all();
        return view('group')->with(['groups' => $groups, 'users' => $users]);
    }

    public function showGroups(Group $group, User $user) {
        $groups = Group::all();
        $users = User::all();
        return view('groups')->with(['groups' => $groups, 'users' => $users]);
    }

    public function showForm(User $user, Professions $professions) {
        $teachers = User::all();
        $professions = Professions::all();
        return view('add_group')->with(['teachers' => $teachers, 'professions' => $professions]);
    }


    public function addGroup(Request $request)
    {
        $data['group_number'] = $request->input('group_number');
        $data['profession_id'] = $request->input('profession_name');
        $data['curator_id'] = $request->input('curator_name');
        $group = Group::create($data);
        return redirect()->route('showGroups');
    }

    public function deleteGroup($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->back();
    }
    // public function attachDiscipline(Request $request) 
    // {
    // 	$data = $request->;
    // }
}
