<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicDisciplines;
use App\User;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function index(AcademicDisciplines $discipline) {
    	$user = Auth::user();
    	$marks = $user->mark->where('discipline_id', $discipline->id);
    	$avg = $marks->avg('mark');
    	return view('marks')->with(['discipline' => $discipline, 'marks' => $marks, 'avg' => $avg]);
    }
}
