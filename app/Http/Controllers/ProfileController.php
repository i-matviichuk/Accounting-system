<?php

namespace App\Http\Controllers;

use App\Marks;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\AcademicDisciplines;

class ProfileController extends Controller
{
    public function showProfile (User $user, Marks $marks) {
        $students = User::where('group_id', '=', $user->group_id)->get();
        $marks = Marks::orderBy('date', 'desc')->get();
        $exams = $user->examMarks()->get();
        $avg = $exams->avg('mark');
        $fill = (100 * $avg)/5;
        $month = ["01"=>"Січня","02"=>"Лютого","03"=>"Березня","04"=>"Квітня","05"=>"Травня", "06"=>"Червня", "07"=>"Липня",
            "08"=>"Серпня","09"=>"Вересня","10"=>"Жовтня","11"=>"Листопада","12"=>"Грудня"];
//        $fill = 100;
     	if(auth()->check()) {
     		if(auth()->user()->id == $user->id || auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher') || auth()->user()->hasRole('operator')) {
     			return view('profile', ['user' => $user, 'students' => $students,'marks' => $marks, 'avg' => $avg, 'fill' => $fill, 'month'=>$month]);
     		} 
        	else {
        		return redirect()->route('profile', auth()->user()->id);
        	}
   		}
   		else {
   			return redirect('/');
   		}
    }
}
