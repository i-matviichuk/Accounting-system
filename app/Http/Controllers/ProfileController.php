<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function showProfile (User $user) {
     	if(auth()->check()) {
     		if(auth()->user()->id == $user->id || $user->role('admin')) {
     			return view('profile', ['user' => $user]);
     		} 
        	else {
        		return redirect()->route('profile', auth()->user()->id);
        	}
   		}
   		else {
   			return redirect('/login');
   		}
    }
}
