@extends('blocks.layout')

@section('users') class="active" @endsection

@section('content')
<div class="container" style="padding-top: 5%; padding-bottom: 5%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редагування</div>

                <div class="panel-body">

                    <form id="form1" class="form-horizontal" method="POST" action="{{ route('update', $user->id) }}">
                        {{ csrf_field() }}

                        @role('admin')

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Прізвище</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ім'я</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">По-батькові</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login" class="col-md-4 control-label">Логін</label>

                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control" name="login" value="{{$user->login}}" required>

                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адреса</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('group_number') ? ' has-error' : '' }}">
                            <label for="group_number" class="col-md-4 control-label">Номер групи</label>
                    
                            <div class="col-md-6">
                                @if($user->group_id != NULL)
                                    <p><select class="form-control"  name="group_number">
                                            <option>Група..</option>
                                        @foreach($groups as $group)
                                                <option{{ $group->group_number == $user->group->group_number ? " selected" : "" }}>{{$group->group_number}}</option>
                                            @endforeach
                                        </select></p>
{{--                                <input id="group_number" type="text" class="form-control" name="group_number" value="{{ $user->group->group_number}}">--}}
                                @else
                                    <p><select class="form-control"  name="group_number">
                                            <option>Група..</option>
                                        @foreach($groups as $group)
                                                <option>{{$group->group_number}}</option>
                                            @endforeach
                                        </select></p>
                                @endif

                            @if ($errors->has('group_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    

                        <div class="form-group{{ $errors->has('stud_number') ? ' has-error' : '' }}">
                            <label for="stud_number" class="col-md-4 control-label">Студентський</label>
                    
                            <div class="col-md-6">
                                @if($user->stud_number != NULL)
                                <input id="stud_number" type="text" class="form-control" name="stud_number" value="{{ $user->stud_number }}">
                                @else
                                <input id="stud_number" type="text" class="form-control" name="stud_number">
                                @endif

                                @if ($errors->has('stud_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stud_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        
                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">День народження</label>
                    
                            <div class="col-md-6">
                                @if($user->birthday != NULL)
                                <input id="birthday" type="text" class="form-control" name="birthday" value="{{$user->birthday}}">
                                @else
                                <input id="birthday" type="text" class="form-control" name="birthday" placeholder="2000-12-31">
                                @endif

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            

                        @if($user->note != NULL)
                        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                            <label for="note" class="col-md-4 control-label">Нотатка</label>
                    
                            <div class="col-md-6">
                                <input id="note" type="text" class="form-control" name="note" value="{{$user->note}}">

                                @if ($errors->has('note'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                            <label for="note" class="col-md-4 control-label">Нотатка</label>
                    
                            <div class="col-md-6">
                                <input id="note" type="text" class="form-control" name="note">

                                @if ($errors->has('note'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        
                        <input type="checkbox" name="show_pass_field" value="show_pass_field" id="show_pass" onchange='showOrHide("show_pass", "pass_form")'> Змінити пароль</input>
                    <div id="pass_form">
                        @endrole
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Повторіть пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        @role('admin')
                    </div><br/>

                        <input type="checkbox" name="show_role_field" value="show_role_field" id="show_role" onchange='showRole("show_role", "role_form")'> Змінити роль користувача</input>
                        <div id="role_form">
                            <input type="radio" name="role" value="student">  Студент</input><br>
                            <input type="radio" name="role" value="operator">  Оператор</input><br>
                            <input type="radio" name="role" value="teacher">  Викладач</input><br>
                            <input type="radio" name="role" value="admin">  Адміністратор</input><br>
                        </div>
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
