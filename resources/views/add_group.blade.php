@extends('blocks.layout')

@section('groups') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Додати групу</div>

                    <div class="panel-body">

                        <form id="form1" class="form-horizontal" method="POST" action="{{ route('addGroup') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('group_number') ? ' has-error' : '' }}">
                                <label for="group_number" class="col-md-4 control-label">Номер групи</label>

                                <div class="col-md-6">
                                    <input id="group_number" type="text" class="form-control" name="group_number" value="{{ old('group_number') }}" required autofocus>

                                    @if ($errors->has('group_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('group_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('profession_name') ? ' has-error' : '' }}">
                                <label for="profession_name" class="col-md-4 control-label">Спеціальність</label>

                                <div class="col-md-6">
                                    {{--<input id="profession_id" type="text" class="form-control" name="profession_id" value="{{ old('profession_id') }}" required>--}}
                                    <p><select class="form-control"  name="profession_name">

                                            <option>Спеціальність..</option>
                                            @foreach($professions as $profession)
                                                <option value="{{$profession->id}}" {{ (old('profession_name') == $profession->id) ? "selected" : '' }}>{{$profession->specialty_title}} </option>
                                            @endforeach
                                        </select></p>
                                    @if ($errors->has('profession_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profession_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('curator_name') ? ' has-error' : '' }}">
                                <label for="curator_name" class="col-md-4 control-label">Куратор</label>
                                {{--@foreach($users as $user)--}}
                                {{--@endforeach--}}
                                <div class="col-md-6">
                                    {{--<input id="curator_id" type="text" class="form-control" name="curator_id" value="{{ old('curator_id') }}" required>--}}
                                    <p><select class="form-control"  name="curator_name">
                                            <option>Куратор..</option>
                                        @foreach($teachers as $teacher)
                                                @if($teacher->hasRole('teacher'))
                                                <option value="{{$teacher->id}}" {{ (old('curator_name') == $teacher->id) ? "selected" : '' }}>{{$teacher->lastname}} {{$teacher->name}} {{$teacher->surname}}</option>
                                                @endif
                                            @endforeach
                                        </select></p>
                                    @if ($errors->has('curator_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('curator_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input class="btn btn-success" type="submit" value="Створити" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
