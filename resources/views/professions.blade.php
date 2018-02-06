@extends('blocks.layout')

@section('professions') class="active" @endsection

@section('content')
    <div class="container" style="padding-top: 5%; padding-bottom: 8%; width: 60%">
        <div id="demo">
            <h1 style="float: left;"><i class="fa fa-mortar-board" aria-hidden="true"></i> Спеціальності</h1>
            <a style="float: right;" href="/professions/add"><i class="fa fa-plus" aria-hidden="true"></i> Додати
                спеціальність</a>
            <div class="table-responsive-vertical shadow-z-1">
                <table id="grid" class="table table-hover table-mc-light-blue increment">
                    <thead>
                    <tr>
                        <th data-type="number" style="width: 15%"><input type="text" id="myInput0" style="color: black"
                                                                         onkeyup="myFunction()"
                                                                         placeholder="Пошук по ID.." title="Введіть ID">
                            №
                        </th>
                        <th data-type="string" style="width: 80%"><input type="text" id="myInput1" style="color: black"
                                                                         onkeyup="myFunction1()"
                                                                         placeholder="Пошук по назві спеціальності.."
                                                                         title="Введіть назву">Назва спеціальності
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($professions as $profession)
                        <tr>
                            <td></td>
                            <td>{{$profession->specialty_title}}</td>
                            <td class="dropdown w3-agile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"></a>
                                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="true">
                                    <span class="fa fa-cog dropdown-toggle"></span>
                                </a>
                                <ul class="dropdown-menu" style="top: auto;">
                                    <li><a href="{{ route('editProfession', $profession->id) }}"><i class="fa fa-pencil"
                                                                                                    aria-hidden="true"
                                                                                                    style="font-size: 16px">
                                                Редагувати спеціальність</i></a></li>
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
