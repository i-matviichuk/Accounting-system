@extends('blocks.layout')

@section('marks') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редагування</div>

                    <div class="panel-body">
                        <form id="form1" class="form-horizontal" method="POST" action="{{ route('updateMark', $mark->id) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('mark') ? ' has-error' : '' }}">
                                <label for="mark" class="col-md-4 control-label">Оцінка</label>

                                <div class="col-md-6">
                                    <p><select class="form-control" name="mark">
                                            <option value="Оцінка..">{{ $mark->mark }}</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select></p>
                                    @if ($errors->has('mark'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mark') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Дата</label>

                                <div class="col-md-6">
                                    <input id="date" type="text" class="form-control" name="date" value="{{ $mark->date }}" required>
                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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
