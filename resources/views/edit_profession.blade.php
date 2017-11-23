@extends('blocks.layout')

@section('professions') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редагування</div>

                    <div class="panel-body">

                        <form id="form1" class="form-horizontal" method="POST" action="{{ route('updateProfession', $profession->id) }}">
                            {{ csrf_field() }}

                            @role('admin')
                            <div class="form-group{{ $errors->has('specialty_title') ? ' has-error' : '' }}">
                                <label for="specialty_title" class="col-md-4 control-label">Назва спеціальності</label>

                                <div class="col-md-6">
                                    <input id="specialty_title" type="text" class="form-control" name="specialty_title" value="{{ $profession->specialty_title }}" required autofocus>

                                    @if ($errors->has('specialty_title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('specialty_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">--}}
                            {{--<label for="surname" class="col-md-4 control-label">По-батькові</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required>--}}

                            {{--@if ($errors->has('surname'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('surname') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">--}}
                            {{--<label for="login" class="col-md-4 control-label">Логін</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="login" type="text" class="form-control" name="login" value="{{$user->login}}" required>--}}

                            {{--@if ($errors->has('login'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('login') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>  --}}

                            {{--<div class="form-group{{ $errors->has('profession_id') ? ' has-error' : '' }}">--}}
                                {{--<label for="profession_id" class="col-md-4 control-label">Спеціальність</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<p><select class="form-control"  name="profession_id">--}}
                                            {{--<option value="{{$group->profession->id}}">Спеціальність..</option>--}}
                                            {{--@foreach($professions as $profession)--}}
                                                {{--<option value="{{$profession->id}}" {{ $profession->id == $group->profession->id ? " selected" : "" }}>{{$profession->specialty_title}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select></p>--}}
                                    {{--@if ($errors->has('profession_id'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('profession_id') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('curator_id') ? ' has-error' : '' }}">--}}
                                {{--<label for="curator_id" class="col-md-4 control-label">Куратор</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<p><select class="form-control"  name="curator_id">--}}
                                            {{--<option value="{{$group->curator->id}}">Куратор..</option>--}}
                                            {{--@foreach($teachers as $teacher)--}}
                                                {{--@if($teacher->hasRole('teacher'))--}}
                                                    {{--<option value="{{$teacher->id}}" {{ $teacher->id == $group->curator->id ? " selected" : "" }}>{{$teacher->lastname}} {{$teacher->name}} {{$teacher->surname}}</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</select></p>--}}
                                    {{--@if ($errors->has('curator_id'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('curator_id') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="form-group{{ $errors->has('stud_number') ? ' has-error' : '' }}">--}}
                            {{--<label for="stud_number" class="col-md-4 control-label">Студентський</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--@if($user->stud_number != NULL)--}}
                            {{--<input id="stud_number" type="text" class="form-control" name="stud_number" value="{{ $user->stud_number }}">--}}
                            {{--@else--}}
                            {{--<input id="stud_number" type="text" class="form-control" name="stud_number">--}}
                            {{--@endif--}}

                            {{--@if ($errors->has('stud_number'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('stud_number') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}



                            {{--<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">--}}
                            {{--<label for="birthday" class="col-md-4 control-label">День народження</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--@if($user->birthday != NULL)--}}
                            {{--<input id="birthday" type="text" class="form-control" name="birthday" value="{{$user->birthday}}">--}}
                            {{--@else--}}
                            {{--<input id="birthday" type="text" class="form-control" name="birthday" placeholder="2000-12-31">--}}
                            {{--@endif--}}

                            {{--@if ($errors->has('birthday'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('birthday') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            {{--@if($user->note != NULL)--}}
                            {{--<div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">--}}
                            {{--<label for="note" class="col-md-4 control-label">Нотатка</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="note" type="text" class="form-control" name="note" value="{{$user->note}}">--}}

                            {{--@if ($errors->has('note'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('note') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--@else--}}
                            {{--<div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">--}}
                            {{--<label for="note" class="col-md-4 control-label">Нотатка</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="note" type="text" class="form-control" name="note">--}}

                            {{--@if ($errors->has('note'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('note') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--@endif--}}

                            {{--<input type="checkbox" name="show_pass_field" value="show_pass_field" id="show_pass" onchange='showOrHide("show_pass", "pass_form")'> Змінити пароль</input>--}}
                            {{--<div id="pass_form">--}}
                            {{--@endrole--}}
                            {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Пароль</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="password" type="password" class="form-control" name="password">--}}

                            {{--@if ($errors->has('password'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('password') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Повторіть пароль</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--@role('admin')--}}
                            {{--</div><br/>--}}

                            {{--<input type="checkbox" name="show_role_field" value="show_role_field" id="show_role" onchange='showRole("show_role", "role_form")'> Змінити роль користувача</input>--}}
                            {{--<div id="role_form">--}}
                            {{--<input type="radio" name="role" value="student">  Студент</input><br>--}}
                            {{--<input type="radio" name="role" value="operator">  Оператор</input><br>--}}
                            {{--<input type="radio" name="role" value="teacher">  Викладач</input><br>--}}
                            {{--<input type="radio" name="role" value="admin">  Адміністратор</input><br>--}}
                            {{--</div>--}}
                            @endrole
                            <script type="text/javascript">
                                document.getElementById("pass_form").style.display="none";
                                document.getElementById("role_form").style.display="none";
                                // document.getElementById("pass_conf_form").style.display="none";
                                // document.getElementById("checkbox2").style.display="none";


                                function showOrHide(show_pass, pass_form) {
                                    show_pass = document.getElementById(show_pass);
                                    pass_form = document.getElementById(pass_form);
                                    if (show_pass.checked) {
                                        pass_form.style.display = "block";
                                    }
                                    else {
                                        pass_form.style.display = "none";
                                    }
                                }

                                function showRole(show_role, role_form) {
                                    show_role = document.getElementById(show_role);
                                    role_form = document.getElementById(role_form);
                                    if (show_role.checked) {
                                        role_form.style.display = "block";
                                    }
                                    else {
                                        role_form.style.display = "none";
                                    }
                                }

                            </script>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input class="btn btn-success" type="submit" value="Save" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
