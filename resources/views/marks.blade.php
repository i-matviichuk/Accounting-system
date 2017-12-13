@extends('blocks.layout')

@section('marks') class="active" @endsection

@section('content')

<div class="container" style="padding: 5%; width: 80%">
    @if($user->group != NULL)
        <div class="col-md-14">
            <div class="row">
                    <div class="tabs-left">
                        <h1 style="margin-bottom: 3%">{{$user->lastname}} {{$user->name}} {{$user->surname}}</h1>
                        <ul class="nav nav-tabs col-md-2" style="z-index: 1; min-width: 170px">
                            <li class="active"><a href="#a" data-toggle="tab">Список групи</a></li>
                            @if($user->group->disciplines != NULL)
                                @foreach($user->group->disciplines as $discipline)
                                    <li><a href="#{{$discipline->id}}"
                                           data-toggle="tab">{{$discipline->discipline_title}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="tab-content my-tab-content">
                            <div class="tab-pane active" id="a">
                                <table id="grid" class="table table-hover table-mc-light-blue">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%"> №
                                        </th>
                                        <th data-type="string" style="width: 80%"><input type="text"
                                                                                         id="myInput1"
                                                                                         style="color: black"
                                                                                         onkeyup="myFunction1()"
                                                                                         placeholder="Пошук по ПІБ.."
                                                                                         title="Введіть ПІБ студента">ПІБ
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td></td>
                                            <td>
                                                {{$student->lastname}} {{$student->name}} {{$student->surname}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @if($user->group->disciplines != NULL)
                                @foreach($user->group->disciplines as $discipline)
                                    <div class="tab-pane" id="{{$discipline->id}}">
                                        <div class="fb fb__1"
                                             style="display: flex; justify-content: space-between;">
                                            <div class="fb fb__1_2">
                                                <h3>{{$discipline->discipline_title}}</h3>
                                            </div>
                                            <div class="fb fb__1_3">
                                                <p>Кількість годин: {{$discipline->hours}}</p>
                                            </div>
                                            <div class="fb fb__1_4">
                                                @if($discipline->teacher_id)
                                                    <p>
                                                        Викладач: {{$discipline->teacher->lastname}} {{$discipline->teacher->name}} {{$discipline->teacher->surname}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        @foreach($marks as $mark)
                                            @if($mark->discipline_id == $discipline->id)
                                                @if($mark->user_id == $user->id)
                                                    <div class="col-md-3 date
                                                         @if($mark->role_id == 3 || $mark->role_id == 4)
                                                            {{ ($mark->mark == 5) ? 'mark-five' : '' }}
                                                            {{ ($mark->mark == 4) ? 'mark-four' : '' }}
                                                            {{ ($mark->mark == 3) ? 'mark-three' : '' }}
                                                            {{ ($mark->mark == 2) ? 'mark-two' : '' }}
                                                            {{ ($mark->mark == 1) ? 'mark-one' : '' }}
                                                        @endif  "
                                                        title="{{ $mark->marks_roles->role_name }}. {{$mark->comment}}">
                                                        {{--{{ ($mark->role_id == 3 || $mark->role_id == 4) ? 'background-color: #2B2B2B' : '' }}--}}
                                                        <p>{{$mark->mark}}</p>
                                                        <span style="margin-bottom: 10%">{{$mark->date->format('d')}}</span>
                                                        <span style="text-transform: lowercase;">{{$month[ $mark->date->format('m') ]}}</span>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @endif
                        </div><!-- /tab-content -->
                    </div><!-- /tabbable -->
            </div><!-- /row -->
        </div>
        @else
        <div style="margin: 10%">
            <h3>
                Користувач не належить до жодної з груп!
            </h3>
        </div>
    @endif
</div>

@endsection