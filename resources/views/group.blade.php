@extends('blocks.layout')

@section('groups') class="active" @endsection

@section('content')
    <div class="container" style=" margin-top: 5%; margin-bottom:5%; width: 80%">
        <div class="row">
            <div class="table-responsive-vertical shadow-z-1">
                <div class="col-md-7" style="width: 100%;">

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #10c7bf; color: #fff">

                            <div class="fb fb__1" style="display: flex; justify-content: space-between;">
                                <div class="fb fb__1_2">
                                    <h4>Група {{ $group->group_number }}</h4>
                                </div>
                                <div class="fb fb__1_3">
                                    <h4>
                                        Куратор {{ $group->curator->lastname }} {{ $group->curator->name }} {{ $group->curator->surname }}</h4>
                                </div>
                                <div class="fb fb__1_4">
                                    <!-- 1 -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false"></a>

                                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                       aria-expanded="true">
                                        <span class="fa fa-cog dropdown-toggle" style="color: #fff"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="top: auto; left: auto;">
                                        <li><a href="{{route('showEdit', $group->id)}}"><i class="fa fa-pencil"
                                                                                           aria-hidden="true"
                                                                                           style="font-size: 16px">
                                                    Редагувати </i></a></li>
                                        <li><a href="{{route('showDiscipline', $group->id)}}"><i class="fa fa-plus"
                                                                                                 aria-hidden="true"
                                                                                                 style="font-size: 16px">
                                                    Додати предмет</i></a></li>
                                        <li><a href="{{route('showAddMark', $group->id)}}"><i class="fa fa-table"
                                                                                              aria-hidden="true"
                                                                                              style="font-size: 16px">
                                                    Додати оцінки</i></a></li>
                                    </ul>
                                </div><!-- /container -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <div class="tabs-left">
                                <ul class="nav nav-tabs col-md-2" style="z-index: 1">
                                    <li class="active"><a href="#a" data-toggle="tab">Список групи</a></li>
                                    @if($group->disciplines != NULL)
                                        @foreach($group->disciplines as $discipline)
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
                                                <th data-type="number" style="width: 10%"><input type="text"
                                                                                                 id="myInput0"
                                                                                                 style="color: black"
                                                                                                 onkeyup="myFunction()"
                                                                                                 placeholder="Пошук по ID.."
                                                                                                 title="Введіть ID"> №
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
                                            @foreach($users as $user)
                                                @if($user->group_id == $group->id)
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <a href="{{ route('profile', $user->id) }}"
                                                               style="color: #999">{{$user->lastname}} {{$user->name}} {{$user->surname}}
                                                            </a>
                                                        </td>
                                                        {{--<td>{{$avg}}</td>--}}
                                                        <td>
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @if($group->disciplines != NULL)
                                        @foreach($group->disciplines as $discipline)
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
                                                <table rules="all" id="grid"
                                                       class="table table-hover table-mc-light-blue subject-table responsive-table">
                                                    <thead>
                                                    <tr>
                                                        <th data-type="number" style="padding: 26px !important;" class="number">№</th>
                                                        <th data-type="string" style="padding: 26px !important;" class="name"> ПІБ</th>
                                                        <th data-type="string"
                                                            style="padding-left: 292px !important"></th>
                                                        @foreach($marks as $mark)
                                                            @if($mark->discipline_id == $discipline->id)
                                                                <th data-type="number"> {{$mark->date->format('d')}}
                                                                    <div class="rotate-line"></div>
                                                                    {{$mark->date->format('m')}}
                                                                </th>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        @if($user->group_id == $group->id)
                                                            <tr>
                                                                <td class="number"></td>
                                                                <td class="name"><a
                                                                            href="{{ route('profile', $user->id) }}"
                                                                            style="color: #999">{{$user->lastname}} {{$user->name}}</a>
                                                                </td>
                                                                <td style="padding-left: 292px !important;"></td>
                                                                @foreach($marks as $mark)
                                                                    @if($mark->discipline_id == $discipline->id)
                                                                        @if($mark->user_id == $user->id)
                                                                            @if($mark->marks_roles->id == 3 || $mark->marks_roles->id == 4)
                                                                            <td style="background-color: #00C8BE; color: white" class="center-text"
                                                                                title="{{ $mark->marks_roles->role_name }}.{{$mark->comment}}">
                                                                                <a href="{{ route('editMark', $mark->id) }}" style="color: white;">{{$mark->mark}}</a></td>
                                                                            @else
                                                                                <td  class="center-text"
                                                                                    title="{{ $mark->marks_roles->role_name }}.{{$mark->comment}}">{{$mark->mark}}</td>
                                                                            @endif
                                                                        @else
                                                                            <td style="padding: 25px !important;"></td>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    @endif
                                </div><!-- /tab-content -->
                            </div><!-- /tabbable -->
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div>
            </div>
        </div>
    </div>

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('#profile-image1').on('click', function () {
                $('#profile-image-upload').click();
            });
        });
    </script>
@endsection



