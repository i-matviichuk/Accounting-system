<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function showProfile (User $user) {
     	if(auth()->check()) {
        	return view('profile', ['user' => $user]);
   		}
   		else {
   			return redirect('/login');
   		}
    }
}
