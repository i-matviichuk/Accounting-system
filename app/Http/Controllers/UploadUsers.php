<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UploadUsers extends Controller
{
    public function showForm() {
    	return view('profile');
    }


    public function store(Request $request) {
    	//get file
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
                
                    $all['lastname'] = $row[0];
                    $all['name'] = $row[1];
                    $all['surname'] = $row[2];
                    $all['email'] = $row[3];
                    $all['login'] = $row[4];
                    $all['password'] = bcrypt($row[5]);
                    // dd($all);
                    User::create($all);
                }
        }
        return redirect('/');
    	//validate
    }

// php.net explode
}
