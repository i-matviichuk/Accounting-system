<?php

namespace App\Http\Controllers;

use App\AcademicDisciplines;
use App\Professions;
use Illuminate\Http\Request;

class ProfessionsController extends Controller
{
    public function show() {
        $professions = Professions::orderBy('id', 'desc')->get();
        return view('professions')->with(['professions' => $professions]);
    }

    public function showAdd() {
        return view('add_profession');
    }

    public function addProfession(Request $request) {
        $this->validate($request, [
            'specialty_title' => 'required|string|max:255',
        ]);
        $data['specialty_title'] = $request->input('specialty_title');
        $professions = Professions::create($data);
        flash()->success('Спеціальність успішно додана');
        return redirect()->route('showProfessions');
    }

    public function showEdit(Professions $profession)
    {
        return view('edit_profession', ['profession' => $profession]);
    }

    public function updateProfession(Request $request, Professions $profession)
    {
        $this->validate($request, [
            'specialty_title' => 'required|string|max:255',
        ]);
        $profession->specialty_title = $request->input('specialty_title');
        $profession->save();
        if ($profession) {
            flash()->success('Успішно оновлено');
        } else {
            flash()->success('Помилка при оновленні!');
        }
        return redirect()->route('showProfessions');
    }
}
