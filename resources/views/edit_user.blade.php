@extends('blocks.layout')

@section('content')
<div class="container" style="padding-top: 5%; padding-bottom: 5%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Реагування</div>

                <div class="panel-body">

                    <form id="form1" class="form-horizontal" method="POST" action="{{ route('update', $user->id) }}">
                        {{ csrf_field() }}

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
                        
                        @if($user->group_id != NULL)
                        <div class="form-group{{ $errors->has('group_number') ? ' has-error' : '' }}">
                            <label for="group_number" class="col-md-4 control-label">ID групи</label>
                    
                            <div class="col-md-6">
                                <input id="group_number" type="text" class="form-control" name="group_number" value="{{ $user->group->group_number}}">

                                @if ($errors->has('group_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('group_number') ? ' has-error' : '' }}">
                            <label for="group_number" class="col-md-4 control-label">ID групи</label>
                    
                            <div class="col-md-6">
                                <input id="group_number" type="text" class="form-control" name="group_number">

                                @if ($errors->has('group_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                                        <div>Змінити роль користувача</div>
                                        <input type="radio" name="role" value="student" checked="checked">  Студент</input><br>
                                        <input type="radio" name="role" value="operator">  Оператор</input><br>
                                        <input type="radio" name="role" value="teacher">  Викладач</input><br>
                                        <input type="radio" name="role" value="admin">  Адміністратор</input><br>
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
