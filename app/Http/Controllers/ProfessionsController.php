<?php

namespace App\Http\Controllers;

use App\AcademicDisciplines;
use App\Professions;
use Illuminate\Http\Request;

class ProfessionsController extends Controller
{
    public function show() {
        $professions = Professions::all();
        return view('professions')->with(['professions' => $professions]);
    }

    public function addProfession(Request $request) {
        $data['specialty_title'] = $request->input('specialty_title');
        $professions = Professions::create($data);
        return redirect()->route('showProfessions');
    }
}
