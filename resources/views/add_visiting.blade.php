@extends('blocks.layout')

@section('groups') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Додати оцінку</div>
                    <div class="panel-body">
                        <i class="fa fa-angle-left" aria-hidden="true"><a href="{{ route('showGroupProfile', $group->id) }}"> Назад</a></i>
                        <div style="margin-bottom: 5%;">
                            <div class="banner-buttons">
                                <div class="banner-button">
                                    <a style="cursor: pointer; margin-left: 15%" onclick="form1()">Додати відвідування</a>
                                    <a style="cursor: pointer; margin-right: 5%" onclick="form2()">Завантажити з файлу</a>
                                </div>
                            </div>
                        </div>

                        <form id="form1" class="form-horizontal" method="POST" action="{{ route('addVisiting', $group->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('passes') ? ' has-error' : '' }}">
                                <label for="passes" class="col-md-4 control-label">Відсутність</label>

                                <div class="col-md-6">
                                    <p><select class="form-control"  name="passes">
                                            <option value="Відсутність..">Відсутність..</option>
                                            <option>н/б</option>
                                            <option>н/з</option>
                                            {{--<option>3</option>--}}
                                            {{--<option>4</option>--}}
                                            {{--<option>5</option>--}}
                                        </select></p>
                                    @if ($errors->has('passes'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('passes') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Дата</label>

                                <div class="col-md-6">
                                    {{--<picker :name="date"></picker>--}}
                                    <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" required>
                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <label for="comment" class="col-md-4 control-label">Коментар</label>
                                <div class="col-md-6">
                                    <input id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                                    @if ($errors->has('comment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('student_name') ? ' has-error' : '' }}">
                                <label for="student_name" class="col-md-4 control-label">Студент</label>
                                <div class="col-md-6">
                                    <p><select class="form-control"  name="student_name">
                                            <option>Студент..</option>
                                            @foreach($students as $student)
                                                @if($student->group_id == $group->id))
                                                <option value="{{$student->id}}" {{ (old('student_name') == $student->id) ? "selected" : '' }}>{{$student->lastname}} {{$student->name}}</option>
                                                @endif
                                            @endforeach
                                        </select></p>
                                    @if ($errors->has('student_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('student_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('discipline_title') ? ' has-error' : '' }}">
                                <label for="discipline_title" class="col-md-4 control-label">Предмет</label>
                                <div class="col-md-6">
                                    <p><select class="form-control"  name="discipline_title">
                                            <option>Предмет..</option>
                                            @foreach($group->disciplines as $discipline)
                                                <option value="{{$discipline->id}}" {{ (old('discipline_title') == $discipline->id) ? "selected" : '' }}>{{$discipline->discipline_title}}</option>
                                            @endforeach
                                        </select></p>
                                    @if ($errors->has('discipline_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discipline_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('role_title') ? ' has-error' : '' }}">--}}
                            {{--<label for="role_title" class="col-md-4 control-label">Вид оцінки</label>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<p><select class="form-control"  name="role_title">--}}
                            {{--<option>Вид оцінки..</option>--}}
                            {{--@foreach($marksRoles as $markRole)--}}
                            {{--<option value="{{$markRole->id}}" {{ (old('role_title') == $markRole->id) ? "selected" : '' }}>{{$markRole->role_name}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select></p>--}}
                            {{--@if ($errors->has('role_title'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('role_title') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input class="btn btn-success" type="submit" value="Додати" name="submit">
                                </div>
                            </div>
                        </form>


                        <form id="form2" style="display: none" action="{{ route('addMark', $group->id) }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="role_title" class="col-md-4 control-label">Завантажити</label>
                                <div class="col-md-6">
                                    <input type="file" name="file" class="form-control" /><br>
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('role_title') ? ' has-error' : '' }}">--}}
                            {{--<label for="role_title" class="col-md-4 control-label">Вид оцінки</label>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<p><select class="form-control"  name="role_title">--}}
                            {{--<option>Вид оцінки..</option>--}}
                            {{--@foreach($marksRoles as $markRole)--}}
                            {{--<option value="{{$markRole->id}}" {{ (old('role_title') == $markRole->id) ? "selected" : '' }}>{{$markRole->role_name}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select></p><br>--}}
                            {{--@if ($errors->has('role_title'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('role_title') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            <div class="form-group{{ $errors->has('discipline_title') ? ' has-error' : '' }}">
                                <label for="discipline_title" class="col-md-4 control-label">Предмет</label>
                                <div class="col-md-6">
                                    <p><select class="form-control"  name="discipline_title">
                                            <option>Предмет..</option>
                                            @foreach($group->disciplines as $discipline)
                                                <option value="{{$discipline->id}}" {{ (old('discipline_title') == $discipline->id) ? "selected" : '' }}>{{$discipline->discipline_title}}</option>
                                            @endforeach
                                        </select></p><br>
                                    @if ($errors->has('discipline_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discipline_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input class="btn btn-success" type="submit" value="Додати" name="submit">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
