<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Group;
use Session;
use Excel;
use File;
use Carbon\Carbon;

class UploadUsers extends Controller
{
    public function showForm(Group $group) {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator') || auth()->user()->hasRole('teacher')) {
            $groups = Group::all();
            return view('register_user')->with(['groups' => $groups]);
        }
        else
        {
            return redirect()->back();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255',
            'group_id' => 'required|unsignedInt|group_id|max:255',
            'birthday' => 'required|string|birthday|max:255',
            'note' => 'required|string|note|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function store(Request $request)
    {
        //get file
        if ($request->file() != NULL) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->first();
                if (!empty($data) && $data->count()) {
                    foreach ($data as $key => $value) {
                        $group = Group::where('group_number', '=', $value->grupa)->first();
                        $insert[] = [
                            'lastname' => $value->prizvishche,
                            'name' => $value->imya,
                            'surname' => $value->po_batkovi,
                            'login' => $value->login,
                            'email' => $value->e_mail,
                            'group_id' => $group->id,
                            'stud_number' => $value->studentskiy,
                            'birthday' => $value->data_narodzhennya,
                            'note' => $value->notatka,
                            'password' => bcrypt($value->parol),
                        ];
                    }
                    if (!empty($insert)) {
                        foreach ($insert as $user)
                        {
                            $user = User::create($user);
                            $user->assignRole($request->input('role'));
                        }
                        if ($user) {
                            flash()->success('Користувачі завантажені успішно');
                        } else {
                            flash()->error('Помилка при завантажені!');
                            return back();
                        }
                    }
                }
                return back();
            } else {
                flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        } else {
            $data['lastname'] = $request->input('lastname');
            $data['name'] = $request->input('name');
            $data['surname'] = $request->input('surname');
            $data['login'] = $request->input('login');
            $data['email'] = $request->input('email');
            $group_id = Group::where('group_number', $request->input('group_number'))->first();
            if ($group_id != NULL) {
                $data['group_id'] = $group_id->id;
            }
            if ($request->input('stud_number') != NULL) {
                $data['stud_number'] = $request->input('stud_number');
            }
            $data['birthday'] = $request->input('birthday');
            if ($request->input('note') != NULL) {
                $data['note'] = $request->input('note');
            }
            $data['password'] = bcrypt($request->input('password'));
            $user = User::create($data);
            // $role = Role::create(['name' => 'student']);
            $user->assignRole($request->input('role'));
        }
        flash('Користувач успішно доданий')->success();
        return redirect()->back();
    }
}
