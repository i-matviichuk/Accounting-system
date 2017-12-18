@extends('blocks.layout')

@section('groups') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Додати предмет</div>

                    <div class="panel-body">
                        <form id="form1" class="form-horizontal" method="POST" action="{{ route('addDiscipline', $group->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('discipline_title') ? ' has-error' : '' }}">
                                <label for="discipline_title" class="col-md-4 control-label">Назва предмету</label>
                                <div class="col-md-6">
                                    <input id="discipline_title" type="text" class="form-control" name="discipline_title" value="{{ old('discipline_title') }}" required autofocus>

                                    @if ($errors->has('discipline_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discipline_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('teacher_name') ? ' has-error' : '' }}">
                                <label for="teacher_name" class="col-md-4 control-label">Викладач</label>
                                <div class="col-md-6">
                                    <p><select class="form-control"  name="teacher_name">
                                            <option>Викладач..</option>
                                            @foreach($teachers as $teacher)
                                                @if($teacher->hasRole('teacher'))
                                                    <option value="{{ $teacher->id }}" {{ (old('teacher_name') == $teacher->id) ? "selected" : '' }}>{{$teacher->lastname}} {{$teacher->name}} {{$teacher->surname}}</option>
                                                @endif
                                            @endforeach
                                        </select></p>
                                    @if ($errors->has('teacher_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('teacher_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                                <label for="hours" class="col-md-4 control-label">Кількість годин</label>
                                <div class="col-md-6">
                                    <input id="hours" type="text" class="form-control" name="hours" value="{{ old('hours') }}" required>

                                    @if ($errors->has('hours'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hours') }}</strong>
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



