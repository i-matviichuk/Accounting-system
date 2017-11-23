@extends('blocks.layout')

@section('professions') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 5%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Додати спеціальність</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('addProfession')}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('specialty_title') ? ' has-error' : '' }}">
                                <label for="specialty_title" class="col-md-4 control-label">Назва спеціальності</label>
                                <div class="col-md-6">
                                    <input id="specialty_title" type="text" class="form-control" name="specialty_title" value="{{ old('specialty_title') }}" required autofocus>

                                    @if ($errors->has('specialty_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('specialty_title') }}</strong>
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



