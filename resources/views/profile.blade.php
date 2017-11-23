@extends('blocks.layout')

@section('profile') class="active" @endsection

@section('content')


    <div class="container" style="padding: 5%">
        <div class="row">

            <div class="col-md-7">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #10c7bf; color: #fff">

                        <div class="fb fb__1" style="display: flex; justify-content: space-between;">
                            <div class="fb fb__1_2">
                                <h4>User Profile</h4>
                            </div>
                            <div class="fb fb__1_3">
                                <!-- 1 -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"></a>
                                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="true">
                                    <span class="fa fa-cog dropdown-toggle" style="color: #fff"></span>
                                </a>
                                <ul class="dropdown-menu" style="top: auto; left: auto;">
                                    <li><a href="{{ route('edit', $user->id) }}"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"
                                                                                    style="font-size: 16px">
                                                Редагувати</i></a></li>
                                    <li><a href="{{ route('marks', $user->id) }}"><i class="fa fa-table"
                                                                                    aria-hidden="true"
                                                                                    style="font-size: 16px">
                                                Оцінки</i></a></li>
                                    {{--<li><a href="#"><i class="fa fa-table" aria-hidden="true" style="font-size: 16px">--}}
                                                {{--Відвідування</i></a></li>--}}
                                    @role('admin')
                                    <li>
                                        <form id="loginForm" action="{{ route('delete', $user->id) }}"
                                              onclick="return (confirm('Дійсно видалити?'))" method="post">
                                            {{ csrf_field() }}
                                            <input style="font-size: 14px" type="submit" id="login"
                                                   value="Видалити користувача">
                                        </form>
                                    </li>
                                    @endrole
                                </ul>

                            </div>
                        </div>


                    </div>
                    <div class="panel-body">

                        <div class="box box-info">

                            <div class="box-body" style="line-height: 2.2">
                                <div class="col-sm-6">
                                    <div align="center"><img alt="User Pic"
                                                             src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                                                             id="profile-image1" class="img-circle img-responsive">

                                        <!-- <input id="profile-image-upload" class="hidden" type="file"> -->
                                        <!-- <div style="color:#999;" >click here to change profile image</div> -->
                                        <!-- Upload Image Js And Css -->

                                    </div>

                                    <br>

                                    <!-- /input-group -->
                                </div>
                                <div class="col-sm-6">
                                    <h4 style="color:#00b1b1;">{{$user->lastname}} {{$user->name}} {{$user->surname}} </h4></span>
                                <!-- @if($user->hasRole($user->roles)) -->
                                    <span><p>{{$user->roles[0]->name}}</p></span>
                                <!-- @endif -->
                                </div>
                                <div class="clearfix"></div>
                                <hr style="margin:5px 0 5px 0;">

                                @if($user->group != NULL)
                                    <div class="col-sm-11" style="text-align: center">Шкала успішності</div><br>

                                    <div class="progress w3-agileits">
                                        <div class="progress-bar progress-bar-success"
                                             style="width: {{$fill}}%; {{ ($fill>=0 && $fill<60) ? 'background-color: #ea412f' : ''}}
                                             {{ ($fill>=60 && $fill<70) ? 'background-color: #eeb335' : '' }} {{ ($fill>=70 && $fill<80) ? 'background-color: #d8eb2c' : ''}}
                                             {{ ($fill>=80 && $fill<90) ? 'background-color: #6ceb1c' : '' }} {{ ($fill>=90 && $fill<95) ? 'background-color: #71dc2e' : ''}}
                                             {{ ($fill>=95 && $fill<100) ? 'background-color: #54bb1a' : '' }} {{ ($fill>=100) ? 'background-color: #c516c0' : '' }}">{{round($fill, 1)}}
                                            %
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital ">Середній бал:</div>
                                    <div class="col-sm-7">{{round($avg, 2)}}</div>
                                @endif
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital ">Прізвище:</div>
                                <div class="col-sm-7 col-xs-6 ">{{$user->lastname}}</div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital ">Ім'я:</div>
                                <div class="col-sm-7">{{$user->name}}</div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 tital ">По-батькові:</div>
                                <div class="col-sm-7">{{$user->surname}}</div>

                                @if($user->group != NULL)
                                    {{--@foreach($user->group->disciplines as $discipline)--}}
                                    {{--<div class="clearfix"></div>--}}
                                    {{--<div class="bot-border"></div>--}}
                                    {{--<div class="col-sm-5 col-xs-6 tital " >Навчальні дисципліни:</div><div class="col-sm-7">{{$discipline->discipline_title}}</div>--}}
                                    {{--@endforeach--}}

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital ">Спеціальність:</div>
                                    <div class="col-sm-7">{{$user->group->profession->specialty_title}}</div>


                                @endif

                                @if($user->birthday != NULL)
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital ">День народження:</div>
                                    <div class="col-sm-7">{{$user->birthday->format('d-m-Y') }}</div>
                                @endif

                                @if($user->group != NULL)
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital ">Група:</div>
                                    <div class="col-sm-7">{{$user->group->group_number }}</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital ">Куратор:</div>
                                    <div class="col-sm-7">{{$user->group->curator->lastname }} {{$user->group->curator->name }} {{$user->group->curator->surname }}</div>
                            @endif

                            <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>


            {{--@if($user->group != NULL)--}}
                {{--<div class="col-md-7">--}}
                    {{--<div class="row" style="min-width: 100%;">--}}
                        {{--<div>--}}
                            {{--<div class="tabs-left">--}}
                                {{--<ul class="nav nav-tabs col-md-2" style="z-index: 1; min-width: 170px">--}}
                                    {{--<li class="active"><a href="#a" data-toggle="tab">Список групи</a></li>--}}
                                    {{--@if($user->group->disciplines != NULL)--}}
                                        {{--@foreach($user->group->disciplines as $discipline)--}}
                                            {{--<li><a href="#{{$discipline->id}}"--}}
                                                   {{--data-toggle="tab">{{$discipline->discipline_title}}</a></li>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                    {{--<li><a href="#c" data-toggle="tab"><span class="glyphicon glyphicon-headphones"></span></a></li>--}}
                                    {{--<li><a href="#d" data-toggle="tab"><span class="glyphicon glyphicon-time"></span></a></li>--}}
                                    {{--<li><a href="#e" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span></a></li>--}}
                                    {{--<li><a href="#f" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span></a></li>--}}
                                {{--</ul>--}}
                                {{--<div class="tab-content my-tab-content">--}}
                                    {{--<div class="tab-pane active" id="a">--}}
                                        {{--<table id="grid" class="table table-hover table-mc-light-blue">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th data-type="number" style="width: 10%"><input type="text"--}}
                                                                                                 {{--id="myInput0"--}}
                                                                                                 {{--style="color: black"--}}
                                                                                                 {{--onkeyup="myFunction()"--}}
                                                                                                 {{--placeholder="Пошук по ID.."--}}
                                                                                                 {{--title="Введіть ID"> №--}}
                                                {{--</th>--}}
                                                {{--<th data-type="string" style="width: 80%"><input type="text"--}}
                                                                                                 {{--id="myInput1"--}}
                                                                                                 {{--style="color: black"--}}
                                                                                                 {{--onkeyup="myFunction1()"--}}
                                                                                                 {{--placeholder="Пошук по ПІБ.."--}}
                                                                                                 {{--title="Введіть ПІБ студента">ПІБ--}}
                                                {{--</th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                            {{--@foreach($students as $student)--}}
                                                {{--<tr>--}}
                                                    {{--<td></td>--}}
                                                    {{--<td>--}}
                                                        {{--{{$student->lastname}} {{$student->name}} {{$student->surname}}--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}
                                            {{--</tbody>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}


                                    {{--</table>--}}
                                    {{--</div>--}}
                                    {{--////////////////////////////////////////--}}
                                    {{--<div class="tab-pane active" id="a">--}}
                                    {{--<table id="grid" class="table table-hover table-mc-light-blue">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                    {{--<th data-type="number" style="width: 10%"><input type="text" id="myInput0" style="color: black" onkeyup="myFunction()" placeholder="Пошук по ID.." title="Введіть ID"> ID </th>--}}
                                    {{--<th data-type="string" style="width: 80%"><input type="text" id="myInput1" style="color: black" onkeyup="myFunction1()" placeholder="Пошук по ПІБ.." title="Введіть ПІБ студента">ПІБ</th>--}}
                                    {{--<th data-type="string" style="width: 5%"><input type="text" id="myInput1" style="color: black" onkeyup="myFunction1()" placeholder="Пошук по успішності.." title="Введіть успішність">Успішність</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@if($user->group_id == $group->id)--}}
                                    {{--<tr>--}}
                                    {{--<td>{{$user->id}}</td>--}}
                                    {{--<td>{{$user->lastname}} {{$user->name}} {{$user->surname}}</td>--}}
                                    {{--<td>{{$avg}}</td>--}}
                                    {{--<td><i class="fa fa-times" aria-hidden="true"></i></td>--}}
                                    {{--</tr>--}}
                                    {{--@endif--}}
                                    {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--</div>--}}

                                    {{--@if($user->group->disciplines != NULL)--}}
                                        {{--@foreach($user->group->disciplines as $discipline)--}}
                                            {{--<div class="tab-pane" id="{{$discipline->id}}">--}}
                                                {{--<div class="fb fb__1"--}}
                                                     {{--style="display: flex; justify-content: space-between;">--}}
                                                    {{--<div class="fb fb__1_2">--}}
                                                        {{--<h3>{{$discipline->discipline_title}}</h3>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="fb fb__1_3">--}}
                                                        {{--<p>Кількість годин: {{$discipline->hours}}</p>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="fb fb__1_4">--}}
                                                        {{--@if($discipline->teacher_id)--}}
                                                            {{--<p>--}}
                                                                {{--Викладач: {{$discipline->teacher->lastname}} {{$discipline->teacher->name}} {{$discipline->teacher->surname}}</p>--}}
                                                        {{--@endif--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--@foreach($marks as $mark)--}}
                                                    {{--@if($mark->discipline_id == $discipline->id)--}}
                                                        {{--@if($mark->user_id == $user->id)--}}
                                                            {{--<div class="col-md-3 date"--}}
                                                                 {{--style="margin: 1%; {{ ($mark->mark == 5) ? 'background-color: #56a921' : '' }}--}}
                                                                 {{--{{ ($mark->mark == 4) ? 'background-color: #8dd220' : '' }} {{ ($mark->mark == 3) ? 'background-color: #dbde22' : '' }}--}}
                                                                 {{--{{ ($mark->mark == 2) ? 'background-color: #de9b06' : '' }} {{ ($mark->mark == 1) ? 'background-color: #de0606' : '' }}--}}
                                                                 {{--{{ ($mark->role_id == 3 || $mark->role_id == 4) ? 'background-color: #2B2B2B' : '' }}"--}}
                                                                 {{--title="{{ $mark->marks_roles->role_name }}. {{$mark->comment}}">--}}
                                                                {{--<p>{{$mark->mark}}</p>--}}
                                                                {{--<span style="margin-bottom: 10%">{{$mark->date->format('d')}}</span>--}}
                                                                {{--<span>{{$month[ $mark->date->format('m') ]}}</span>--}}
                                                            {{--</div>--}}
                                                        {{--@endif--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--<table id="grid" class="table table-hover table-mc-light-blue subject-table responsive-table">--}}
                                                {{--<thead>--}}
                                                {{--<tr>--}}
                                                {{--<th data-type="number" class="number"> ID </th>--}}
                                                {{--<th data-type="string" class="name"> ПІБ</th>--}}
                                                {{--<th data-type="string" style="padding-left: 330px !important"></th>--}}
                                                {{--@foreach($marks as $mark)--}}
                                                {{--@if($mark->user_id == $user->id)--}}
                                                {{--@if($mark->discipline_id == $discipline->id)--}}
                                                {{--<th data-type="number"> {{$mark->date->format('d')}}--}}
                                                {{--<div class="rotate-line"></div>--}}
                                                {{--{{$mark->date->format('m')}}--}}
                                                {{--</th>--}}
                                                {{--@endif--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--<th data-type="number" class="vertical-text"> Date</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--<tr>--}}
                                                {{--<td class="number">{{$user->id}}</td>--}}
                                                {{--<td class="name">{{$user->lastname}} {{$user->name}}</td>--}}
                                                {{--<td style="padding-left: 330px !important;"></td>--}}
                                                {{--@foreach($marks as $mark)--}}
                                                {{--@if($mark->discipline_id == $discipline->id)--}}
                                                {{--@if($mark->user_id == $user->id)--}}
                                                {{--<td class="center-text" title="{{$mark->comment}}">{{$mark->mark}}</td>--}}
                                                {{--@else--}}
                                                {{--<td></td>--}}
                                                {{--@endif--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--<td><i class="fa fa-times" aria-hidden="true"></i></td>--}}
                                                {{--</tr>--}}
                                                {{--</tbody>--}}
                                                {{--</table>--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                {{--</div><!-- /tab-content -->--}}
                            {{--</div><!-- /tabbable -->--}}
                        {{--</div><!-- /col -->--}}
                    {{--</div><!-- /row -->--}}
                {{--</div>--}}
            {{--@endif--}}


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


        </div>
    </div>

@endsection



