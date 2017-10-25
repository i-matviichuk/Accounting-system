@extends('blocks.layout')

@section('groups') class="active" @endsection

@section('content')

    @role('admin')
    <div class="container" style="padding-top: 5%; padding-bottom: 8%; width: 70%">
        <div id="demo">
            <h1 style="float: left;"><i class="fa fa-users" aria-hidden="true"></i> Групи</h1>
            <a style="float: right;" href="/groups/add"><i class="fa fa-plus" aria-hidden="true"></i> Додати групу</a>
            <!-- Responsive table starts here -->
            <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
            <div class="table-responsive-vertical shadow-z-1">
                <style>
                    th {
                        cursor: pointer;
                        /*text-align: center;*/
                    }

                    th:hover {
                        background: #00C8BE;
                        color: #FFFFFF !important;
                        /* text-align: center;*/
                    }

                    #myInput0, #myInput1, #myInput2, #myInput3, #myInput4, #myInput5, #myInput6, #myInput7, #myInput8 {
                        background-image: url('/css/searchicon.png');
                        width: 100%;
                        font-size: 14px;
                        padding: 5px 5px 5px 10px;
                        border: 1px solid #ddd;
                        margin-bottom: 12px;
                    }
                </style>

                <!-- Table starts here -->
                <table id="grid" class="table table-hover table-mc-light-blue">
                    <thead>
                    <tr>
                        <th data-type="number" style="width: 7%"><input type="text" id="myInput0" style="color: black" onkeyup="myFunction()" placeholder="Пошук по ID.." title="Введіть ID"> ID </th>
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
                                <td>{{$group->id}}</td>
                                <td>{{$group->group_number}}</td>
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
                                        <li><a href=""><i class="fa fa-users" aria-hidden="true" style="font-size: 16px"> Докладніше</i></a></li>
                                        <li><a href=""><i class="fa fa-pencil" aria-hidden="true" style="font-size: 16px"> Редагувати групу</i></a></li>
                                        <li>
                                            <form id="loginForm" action="{{ route('deleteGroup', $group->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input style="font-size: 14px" type="submit" id="login" value="Видалити групу">
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <script>
                // сортировка таблицы
                // использовать делегирование!
                // должно быть масштабируемо:
                // код работает без изменений при добавлении новых столбцов и строк

                var grid = document.getElementById('grid');
                grid.onclick = function(e) {
                    if (e.target.tagName != 'TH') return;
                    // Если TH -- сортируем
                    sortGrid(e.target.cellIndex, e.target.getAttribute('data-type'));
                };

                function sortGrid(colNum, type) {
                    var tbody = grid.getElementsByTagName('tbody')[0];
                    // Составить массив из TR
                    var rowsArray = [].slice.call(tbody.rows);
                    // определить функцию сравнения, в зависимости от типа
                    var compare;
                    switch (type) {
                        case 'number':
                            compare = function(rowA, rowB) {
                                return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
                            };
                            break;
                        case 'string':
                            compare = function(rowA, rowB) {
                                return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML;
                            };
                            break;
                    }
                    // сортировать
                    rowsArray.sort(compare);
                    // Убрать tbody из большого DOM документа для лучшей производительности
                    grid.removeChild(tbody);
                    // добавить результат в нужном порядке в TBODY
                    // они автоматически будут убраны со старых мест и вставлены в правильном порядке
                    for (var i = 0; i < rowsArray.length; i++) {
                        tbody.appendChild(rowsArray[i]);
                    }
                    grid.appendChild(tbody);
                }
            </script>

            <!-- Пошук по таблиці -->
            <script>
                function myFunction() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput0");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction1() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput1");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction2() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput2");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[2];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction3() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput3");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[3];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction4() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput4");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[4];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction5() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput5");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[5];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction6() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput6");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[6];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction7() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput7");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[7];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function myFunction8() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("myInput8");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("grid");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[8];
                        if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>

        </div>
    </div>





    {{----}}
    {{--<div class="container">--}}
    {{--<div class="page-container">--}}
        {{--<div style="text-align: right"><a href="/groups/add"><i class="fa fa-plus" aria-hidden="true"></i> Додати групу</a></div>--}}

        {{--@foreach($groups as $group)--}}
            {{--@foreach($users as $user)--}}
            {{--<div class="pricing-table">--}}
                {{--<div class="pricing-table-header">--}}
                    {{--<h2>{{$group->group_number}}</h2>--}}
                {{--</div>--}}
                {{--<div class="pricing-table-space"></div>--}}
                {{--<div class="pricing-table-features">--}}
{{--                    {{dd($group->id)}}--}}
                    {{--{{dd(count($users->where('group_id', '==', $group->id)))}}--}}
                    {{--<p>Кількість студентів: <strong>{{count($users->where('group_id', '==', $group->id))}}</strong></p>--}}
                    {{--<p>Куратор: <br/><strong>{{$group->curator->lastname}} {{$group->curator->name}} {{$group->curator->surname}}</strong></p>--}}
                    {{--{{dd($group->profession->specialty_title)}}--}}
                    {{--<p><strong>{{$group->profession->specialty_title}}</strong> Specialty title</p>--}}
                    {{--<p><strong>10</strong> Середня успішність</p>--}}
                    {{--<p><strong>24/7 Unlimited</strong> Support</p>--}}
                {{--</div>--}}
                {{--<div class="pricing-table-sign-up">--}}
                    {{--<p><a>Sign Up Now</a></p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
        {{--@endforeach--}}

    {{--</div>--}}
{{--</div>--}}


    {{--<style>--}}
        {{--.page-container {--}}
            {{--color: #fff;--}}
            {{--text-align: center;--}}
            {{--overflow: hidden;--}}
            {{--width: 100%;--}}
            {{--margin: 60px auto 0 auto;--}}
            {{--padding-bottom: 60px;--}}
        {{--}--}}

        {{--.pricing-table {--}}
            {{--float: left;--}}
            {{--width: 30%;--}}
            {{--margin: 20px 14px 0 14px;--}}
            {{--background: #f8f8f8;--}}
            {{---moz-border-radius: 6px;--}}
            {{---webkit-border-radius: 6px;--}}
            {{--border-radius: 6px;--}}
            {{---moz-box-shadow: 0 2px 15px 0 rgba(0,0,0,.2);--}}
            {{---webkit-box-shadow: 0 2px 15px 0 rgba(0,0,0,.2);--}}
            {{--box-shadow: 0 2px 15px 0 rgba(0,0,0,.2);--}}

        {{--}--}}

          {{--.pricing-table strong { font-weight: 700; color: #3d3d3d; }--}}

        {{--.pricing-table-header {--}}
            {{--padding: 30px 0 25px 0;--}}
            {{--background: #3d3d3d;--}}
            {{---moz-border-radius-topleft: 6px;--}}
            {{---moz-border-radius-topright: 6px;--}}
            {{---webkit-border-top-left-radius: 6px;--}}
            {{---webkit-border-top-right-radius: 6px;--}}
            {{--border-top-left-radius: 6px;--}}
            {{--border-top-right-radius: 6px;--}}
            {{--background-image: -webkit-gradient(linear, left top, left bottom, from(#494949), to(#3e3e3e));--}}
            {{--background-image: -webkit-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: -moz-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: -o-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: -ms-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: linear-gradient(to bottom, #494949, #3e3e3e);--}}
        {{--}--}}

          {{--.pricing-table-header h2 { font-size: 30px; font-weight: 700; text-shadow: 0 -2px 0 rgba(0,0,0,.25); }--}}
          {{--.pricing-table-header h3 { margin-top: 20px; font-size: 24px; font-weight: 400; text-shadow: 0 -2px 0 rgba(0,0,0,.25); }--}}

          {{--.pricing-table-space { height: 10px; }--}}


        {{--.pricing-table-features {--}}
            {{--margin: 15px 30px 0 30px;--}}
            {{--padding: 0 10px 15px 10px;--}}
            {{--border-bottom: 1px solid #ddd;--}}
            {{--text-align: left;--}}
            {{--line-height: 30px;--}}
            {{--font-size: 16px;--}}
            {{--color: #888;--}}
        {{--}--}}

        {{--.pricing-table-sign-up {--}}
            {{--margin-top: 25px;--}}
            {{--padding-bottom: 30px;--}}
        {{--}--}}

        {{--.pricing-table-sign-up a {--}}
            {{--display: inline-block;--}}
            {{--width: 180px;--}}
            {{--height: 40px;--}}
            {{--background: #3d3d3d;--}}
            {{---moz-border-radius: 6px;--}}
            {{---webkit-border-radius: 6px;--}}
            {{--border-radius: 6px;--}}
            {{--background-image: -webkit-gradient(linear, left top, left bottom, from(#494949), to(#3e3e3e));--}}
            {{--background-image: -webkit-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: -moz-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: -o-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: -ms-linear-gradient(top, #494949, #3e3e3e);--}}
            {{--background-image: linear-gradient(to bottom, #494949, #3e3e3e);--}}
            {{--line-height: 40px;--}}
            {{--font-size: 20px;--}}
            {{--color: #fff;--}}
            {{--text-decoration: none;--}}
            {{--text-transform: uppercase;--}}
            {{--text-shadow: 0 -2px 0 rgba(0,0,0,.25);--}}
            {{---o-transition: all .2s;--}}
            {{---moz-transition: all .2s;--}}
            {{---webkit-transition: all .2s;--}}
            {{---ms-transition: all .2s;--}}
        {{--}--}}

        {{--.pricing-table-sign-up a:hover {--}}
            {{--text-decoration: none;--}}
            {{---moz-box-shadow: 0 -5px 10px 0 rgba(0,0,0,.2) inset;--}}
            {{---webkit-box-shadow: 0 -5px 10px 0 rgba(0,0,0,.2) inset;--}}
            {{--box-shadow: 0 -5px 10px 0 rgba(0,0,0,.2) inset;--}}
        {{--}--}}

        {{--.pricing-table-sign-up a:active {--}}
            {{---moz-box-shadow: 0 3px 8px 0 rgba(0,0,0,.2) inset;--}}
            {{---webkit-box-shadow: 0 3px 8px 0 rgba(0,0,0,.2) inset;--}}
            {{--box-shadow: 0 3px 8px 0 rgba(0,0,0,.2) inset;--}}
        {{--}--}}


        {{--/* Highlighted table */--}}

        {{--.pricing-table-highlighted {--}}
            {{--margin-top: 0;--}}
        {{--}--}}

        {{--.pricing-table-highlighted .pricing-table-header {--}}
            {{--background: #628842;--}}
            {{--background-image: -webkit-gradient(linear, left top, left bottom, from(#76a04f), to(#648a43));--}}
            {{--background-image: -webkit-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: -moz-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: -o-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: -ms-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: linear-gradient(to bottom, #76a04f, #648a43);--}}
        {{--}--}}

        {{--.pricing-table-highlighted .pricing-table-sign-up a {--}}
            {{--background: #628842;--}}
            {{--background-image: -webkit-gradient(linear, left top, left bottom, from(#76a04f), to(#648a43));--}}
            {{--background-image: -webkit-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: -moz-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: -o-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: -ms-linear-gradient(top, #76a04f, #648a43);--}}
            {{--background-image: linear-gradient(to bottom, #76a04f, #648a43);--}}
        {{--}--}}


    {{--</style>--}}
    @endrole

@endsection