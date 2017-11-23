@extends('blocks.layout')

@section('groups') class="active" @endsection

@section('content')

    <div class="container" style="padding-top: 5%; padding-bottom: 8%; width: 70%">
        <div id="demo">
            <h1 style="float: left;"><i class="fa fa-users" aria-hidden="true"></i> Групи</h1>
            <a style="float: right;" href="/groups/add"><i class="fa fa-plus" aria-hidden="true"></i> Додати групу</a>
            <!-- Responsive table starts here -->
            <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
            <div class="table-responsive-vertical shadow-z-1">
                <!-- Table starts here -->
                <table id="grid" class="table table-hover table-mc-light-blue">
                    <thead>
                    <tr>
                        <th data-type="number" style="width: 7%"><input type="text" id="myInput0" style="color: black" onkeyup="myFunction()" placeholder="Пошук по ID.." title="Введіть ID"> № </th>
                        <th data-type="string" style="width: 15%"><input type="text" id="myInput1" style="color: black" onkeyup="myFunction1()" placeholder="Пошук по номеру групи.." title="Введіть номер групи">Номер групи</th>
                        <th data-type="string" style="width: 10%" title="Кількість студентів у групі"><input type="text" id="myInput2" style="color: black" onkeyup="myFunction2()" placeholder="Пошук по кількості.." title="Введіть кількість">К-сть студ.</th>
                        <th data-type="string" style="width: 25%"><input type="text" id="myInput3" style="color: black" onkeyup="myFunction3()" placeholder="Пошук по імені куратора.." title="Введіть ім'я куратора">Куратор</th>
                        <th data-type="string" style="width: 35%"><input type="text" id="myInput4" style="color: black" onkeyup="myFunction4()" placeholder="Пошук по назві спеціальності.." title="Введіть назву спеціальності">Спеціальність</th>
                        <th data-type="string" style="width: 9%" title="Середня успішність групи"><input type="text" id="myInput4" style="color: black" onkeyup="myFunction4()" placeholder="Пошук по оцінці.." title="Введіть оцінку">Сер. усп.</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($groups as $group)
                            <tr>
                                <td></td>
                                <td><a style="color: #999" href="{{route('showGroupProfile', $group->id)}}">{{$group->group_number}}</a></td>
                                <td>{{count($users->where('group_id', '==', $group->id))}}</td>

                                <td>{{$group->curator->lastname}} {{$group->curator->name}} {{$group->curator->surname}}</td>
                                <td>{{$group->profession->specialty_title}}</td>
                                <td></td>
                                {{--@if($user->group != NULL)--}}
                                    {{--<td><a href="/">{{$user->group->group_number}}</a></td>--}}
                                {{--@else--}}
                                    {{--<td></td>--}}
                                {{--@endif--}}

                                {{--<td>{{str_limit($user->note, 15)}}</td>--}}
                                <td class="dropdown w3-agile">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <span class="fa fa-cog dropdown-toggle" ></span>
                                    </a>
                                    <ul class="dropdown-menu" style="top: auto;">
                                        <li><a href="{{ route('showGroupProfile', $group->id) }}"><i class="fa fa-users" aria-hidden="true" style="font-size: 16px"> Докладніше</i></a></li>
                                        <li><a href="{{route('showEdit', $group->id)}}"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 16px"> Редагувати групу</i></a></li>
                                        <li><a href="{{route('showDiscipline', $group->id)}}"><i class="fa fa-plus" aria-hidden="true" style="font-size: 16px"> Додати предмет</i></a></li>
                                        <li><a href="{{route('showAddMark', $group->id)}}"><i class="fa fa-table" aria-hidden="true" style="font-size: 16px"> Додати оцінки</i></a></li>
                                        {{--<li>--}}
                                            {{--<form id="loginForm" action="{{ route('deleteGroup', $group->id) }}" onclick="return (confirm('Дійсно видалити?'))" method="post">--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--<input style="font-size: 14px" type="submit" id="login" value="Видалити групу">--}}
                                            {{--</form>--}}
                                        {{--</li>--}}
                                    </ul>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection