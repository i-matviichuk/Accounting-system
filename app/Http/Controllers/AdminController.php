<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function showProfile (User $user) {
     	if(auth()->check()) {
        	return view('admin', ['user' => $user]);
   		}
   		else {
   			return redirect('/login');
   		}
    }
}
