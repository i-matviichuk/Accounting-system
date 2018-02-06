@extends('blocks.layout')

@section('users') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Реєстрація</div>
                    <div class="panel-body">
                        <i class="fa fa-angle-left" aria-hidden="true"><a href="{{ route('users') }}"> Назад</a></i>
                        <div style="margin-bottom: 5%;">
                            <div class="banner-buttons">
                                <div class="banner-button">
                                    <a style="cursor: pointer; margin-left: 5%" onclick="form1()">Зареєструвати
                                        одного</a>
                                    <a style="cursor: pointer; margin-right: 5%" onclick="form2()">Зареєструвати
                                        множинно</a>
                                </div>
                            </div>
                        </div>

                        <form id="form1" class="form-horizontal" method="POST" action="{{ route('new') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label">Прізвище <a style="color: red">*</a></label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname"
                                           value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Ім'я <a style="color: red">*</a></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label for="surname" class="col-md-4 control-label">По-батькові <a style="color: red">*</a></label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname"
                                           value="{{ old('surname') }}" required>

                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                <label for="login" class="col-md-4 control-label">Login <a style="color: red">*</a></label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control" name="login"
                                           value="{{ old('login') }}" required>

                                    @if ($errors->has('login'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address <a style="color: red">*</a></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

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
                                    <p><select class="form-control" name="group_number">
                                            <option>Група..</option>
                                            @foreach($groups as $group)
                                                {{--{{dd(old('group_number'), )}}--}}
                                                <option value="{{ $group->id }}" {{ (old('group_number') == $group->id) ? "selected" : '' }}>{{$group->group_number}}</option>
                                            @endforeach
                                        </select></p>
                                    {{--<input id="group_number" type="text" class="form-control" name="group_number">--}}

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
                                    <input id="stud_number" type="text" class="form-control" name="stud_number" value="{{ old('stud_number') }}">

                                    @if ($errors->has('stud_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stud_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday" class="col-md-4 control-label">День народження <a style="color: red">*</a></label>
                                <div class="col-md-6">
                                        <picker :old="{{ json_encode(old('birthday')) }}"></picker>
                                @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                <label for="note" class="col-md-4 control-label">Нотатка</label>

                                <div class="col-md-6">
                                    <input id="note" type="text" class="form-control" name="note" value="{{ old('note') }}">

                                    @if ($errors->has('note'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Пароль <a style="color: red">*</a></label>

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
                                <label for="password-confirm" class="col-md-4 control-label">Повторіть пароль <a style="color: red">*</a></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>
                            <div>Вкажіть роль користувача <a style="color: red">*</a></div>
                            <div style="margin: 10px;">
                                <radio :with-admin="true"></radio>
                            </div>
                            {{----}}
                            {{--<input type="radio" name="role" value="student" checked="checked"> Студент</input><br>--}}
                            {{--<input type="radio" name="role" value="operator"> Оператор</input><br>--}}
                            {{--<input type="radio" name="role" value="teacher"> Викладач</input><br>--}}
                            {{--<input type="radio" name="role" value="admin"> Адміністратор</input><br>--}}
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input class="btn btn-success" type="submit" value="Додати" name="submit">
                                </div>
                            </div>
                        </form>


                        <form id="form2" style="display: none" action="{{url('/new')}}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="file">Завантажити</label>
                                <input type="file" name="file" class="form-control"/><br>
                                <div>Вкажіть роль користувача</div>
                                <div>
                                    <radio></radio>
                                </div>
                            </div>
                            <input class="btn btn-success" type="submit" value="Завантажити файл" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
