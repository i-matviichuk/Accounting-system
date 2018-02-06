<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Visiting;
use Illuminate\Http\Request;

class VisitingController extends Controller
{


    public function showForm(Group $group, User $user, Visiting $visiting) {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher') || auth()->user()->hasRole('operator')) {
            $students = User::all();
            return view('add_visiting', ['students' => $students, 'group' => $group, 'visiting' => $visiting]);
        } else {
            return redirect()->back();
        }
    }

    public function addVisiting(Request $request, User $user)
    {
//        dd($request->input());
        $this->validate($request, [
            'passes' => 'required|string|max:5',
            'date' => 'required|date|max:255',
            'comment' => 'max:255',
            'student_name' => 'required|string|max:255',
            'discipline_title' => 'required|integer|max:255',
        ]);
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('teacher') || auth()->user()->hasRole('operator')) {
            if ($request->file() != NULL) {
                $extension = File::extension($request->file->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                    $path = $request->file->getRealPath();
                    $data = Excel::load($path, function ($reader) {
                    })->first();
                    if (!empty($data) && $data->count()) {

                        foreach ($data as $key => $value) {
                            if ($request->input('discipline_title') != "Предмет..") {
                                $user = User::where('login', '=', $value->login)->first();
                                $insert[] = [
                                    'discipline_id' => $request->input('discipline_title'),
                                    'user_id' => $user->id,
                                    'passes' => $value->vidsutnist,
                                    'date' => $value->data,
                                    'comment' => $value->komentar,
                                ];
                            }
                        }
                        if (!empty($insert)) {
                            $visiting = Visiting::insert($insert);

                            if ($visiting) {
                                flash()->success('Дані введені успішно');
                            } else {
                                flash()->error('Помилка про вводі даних!');
                                return back();
                            }
                        }
                    }
                    return back();
                } else {
                    Session::flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
                    return back();
                }
            } else {
                if ($request->input('passes') != "Відсутність..") {
                    $data['passes'] = $request->input('passes');
                } else {
                    flash()->error('Виберіть відсутність!');
                    return redirect()->back();
                }

                $data['date'] = $request->input('date');
                $data['comment'] = $request->input('comment');
                if ($request->input('student_name') != "Студент..") {
                    $data['user_id'] = $request->input('student_name');
                } else {
                    flash()->error('Виберіть студента!');
                    return redirect()->back();
                }

                if ($request->input('discipline_title') != "Предмет..") {
                    $data['discipline_id'] = $request->input('discipline_title');
                } else {
                    flash()->error('Виберіть предмет!');
                    return redirect()->back();
                }

                $visiting = Visiting::create($data);
                if ($visiting) {
                    flash()->success('Відвідуванння успішно додані');
                } else {
                    flash()->error('Відвідування не додані!');
                }
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
