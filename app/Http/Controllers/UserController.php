<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show(User $user, Role $role)
    {
        $roles = Role::all();
        $users = User::orderBy('id', 'desc')->get();
        return view('users')->with(['users' => $users, 'roles' => $roles]);
    }

    public function index()
    {
        $result = User::latest()->paginate();
        return view('home', compact('result'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('user.new', compact('roles'));
    }

public function store(Request $request)
{
    $this->validate($request, [
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
    ]);

    // hash password
    $request->merge(['password' => bcrypt($request->get('password'))]);

    // Create the user
    if ( $user = User::create($request->except('roles', 'permissions')) ) {
        $this->syncPermissions($request, $user);
        flash('User has been created.');
    } else {
        flash()->error('Unable to create user.');
    }

    return redirect()->route('users.index');
}

//public function edit($id)
//{
//    $user = User::find($id);
//    $roles = Role::pluck('name', 'id');
//    $permissions = Permission::all('name', 'id');
//
//    return view('edit_user', compact('user', 'roles', 'permissions'));
//}

public function show_edit(User $user, Group $group)
{
    $groups = Group::all();
    if(auth()->check()) {
            if(auth()->user()->hasRole('admin') || auth()->user()->id == $user->id) {

                return view('edit_user')->with(['user' => $user, 'groups' => $groups]);
            }
            else {
                return redirect()->route('edit', auth()->user()->id);
            }
        }
        else {
            return redirect('/');
        }
}

public function update(Request $request, User $user)
{

    // return Validator::make($user, [
    //         'lastname' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'surname' => 'required|string|max:255',
    //         'login' => 'required|string|max:255|unique:users',
    //         'email' => 'required|string|email|max:255',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    //$user = User::find($user);
    if($request->input('role') != NULL)
    {   
       foreach ($user->roles as $role) 
       {
          if ($role->name != $request->input('role'));
          {
              $user->removeRole($role->name);
              $user->assignRole($request->input('role'));
          }
       };
    }

    if($request->input('lastname') != NULL) {
        $user->lastname = $request->input('lastname'); 
    }
    if($request->input('name') != NULL) {
        $user->name = $request->input('name');
    }
    if($request->input('surname') != NULL) {
        $user->surname = $request->input('surname');
    }
    if($request->input('login') != NULL) {
        $user->login = $request->input('login');
    }
    if($request->input('email') != NULL) {
        $user->email = $request->input('email');
    }
//    dd($request->input());
//    $group_id = Group::where('group_number', $request->input('group_number'))->first();
    if(!auth()->user()->hasRole('student')) {
        $user->group_id = $request->input('group_number');
        $user->stud_number = $request->input('stud_number');
        $user->birthday = $request->input('birthday');
        $user->note = $request->input('note');
    }
    if($request->input('password') != NULL)
    {
        $user->password = bcrypt($request->input('password'));
    }
    $user->save();
    flash('Успішно збережено')->success();
    return redirect()->route('profile',['user' => $user->id]);
}

public function destroy($id)
{
    if ( Auth::user()->id != $id ) {
        $user = User::find($id);
        $user->delete();
        flash()->success('Користувач успішно видалений');
        return redirect()->route('users');
    }
    else {
        flash()->error('Користувача не видалено!');
    }
    return redirect()->back();
}

private function syncPermissions(Request $request, $user)
{
    // Get the submitted roles
    $roles = $request->get('roles', []);
    $permissions = $request->get('permissions', []);

    // Get the roles
    $roles = Role::find($roles);

    // check for current role changes
    if( ! $user->hasAllRoles( $roles ) ) {
        // reset all direct permissions for user
        $user->permissions()->sync([]);
    } else {
        // handle permissions
        $user->syncPermissions($permissions);
    }

    $user->syncRoles($roles);
    return $user;
}
}
