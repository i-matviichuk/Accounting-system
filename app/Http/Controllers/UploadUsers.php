<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Group;

class UploadUsers extends Controller
{
    public function showForm(Group $group) {
        $groups = Group::all();
    	return view('register_user')->with(['groups' => $groups]);;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }



    public function store(Request $request) {
    	//get file
        if ($request->file() != NULL) {
            $upload = $request->file('upload-file');
            $filePath = $upload->getRealPath();
            //read
            $file = file_get_contents($filePath);
            
            $rows = explode("\r".PHP_EOL, $file);

            foreach ($rows as $key => $value) {
                $row = explode(';', $value);
                // dd($row);
                if($key > 0) {
                    if (count($row) < 5) {
                        continue;
                    } 
                    
                        $all['email'] = $row[4];
                        $all['lastname'] = $row[1];
                        $all['name'] = $row[2];
                        $all['surname'] = $row[3];
                        $all['login'] = $row[6];

                        $all['password'] = bcrypt($row[5]);
                        // Role::create($role_id);
                        $user = User::create($all);
                        $user->assignRole($request->input('role'));
                    }
            }
        }
        else {
            $data['lastname'] = $request->input('lastname');
            $data['name'] = $request->input('name');
            $data['surname'] = $request->input('surname');
            $data['login'] = $request->input('login');
            $data['email'] = $request->input('email');
            $data['password'] = bcrypt($request->input('password'));

            $user = User::create($data);
            // $role = Role::create(['name' => 'student']);

            $user->assignRole($request->input('role'));
        }

        return redirect()->back();
    	//validate
    }



// php.net explode
}
