@extends('blocks.layout')

@section('users') class="active" @endsection

@section('content')
<div class="container" style="padding-top: 5%; padding-bottom: 8%; width: 80%">
<div id="demo">
  <h1 style="float: left;"><i class="fa fa-users" aria-hidden="true"></i> Користувачі</h1>
  <a style="float: right;" href="/new"><i class="fa fa-user-plus" aria-hidden="true"></i> Додати користувача</a>
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="grid" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th> № </th>
          <th data-type="string" style="width: 22%"><input type="text" id="myInput1" style="color: black" onkeyup="myFunction1()" placeholder="Пошук по ПІБ.." title="Введіть ім'я">Ім'я</th>
          <th data-type="string"><input type="text" id="myInput2" style="color: black" onkeyup="myFunction2()" placeholder="Пошук по ролях.." title="Введіть роль">Роль</th>
          <th data-type="string"><input type="text" id="myInput3" style="color: black" onkeyup="myFunction3()" placeholder="Пошук по логіну.." title="Введіть логін">Login</th>
          <th data-type="string"><input type="text" id="myInput4" style="color: black" onkeyup="myFunction4()" placeholder="Пошук по E-mail.." title="Введіть E-mail">E-mail</th>
          <th data-type="string"><input type="text" id="myInput5" style="color: black" onkeyup="myFunction5()" placeholder="Пошук по групах.." title="Введіть гомер групи">Група</th>
          <th data-type="string"><input type="text" id="myInput6" style="color: black" onkeyup="myFunction6()" placeholder="Пошук по студентському.." title="Введіть номер студентського">Студентський</th>
          <th data-type="string" style="width: 12%"><input type="text" id="myInput7" style="color: black" onkeyup="myFunction7()" placeholder="Пошук по даті народження.." title="Введіть дату народження">День народження</th>
          <th style="width: 14%"><input type="text" id="myInput8" style="color: black" onkeyup="myFunction8()" placeholder="Пошук по нотатках.." title="Введіть нотатку">Нотатка</th>
        </tr>
      </thead>
      <tbody>

        @foreach($users as $user)
        @foreach($user->roles as $role)
        <tr>
          <td></td>
          <td><a style="color: #999" href="{{ route('profile', $user->id) }}">{{$user->lastname}} {{$user->name}} {{$user->surname}}</a></td>
          
          <td>{{$role->name}}</td>
          
          <td>{{$user->login}}</td>
          <td>{{$user->email}}</td>
          @if($user->group != NULL)
            <td><a style="color: #999" href="/">{{$user->group->group_number}}</a></td>
          @else
            <td></td>
          @endif
          @if($user->stud_number != NULL)
            <td>{{$user->stud_number}}</td>
          @else
            <td></td>
          @endif
          @if($user->birthday != NULL)
          <td>{{$user->birthday->format('d.m.Y')}}</td>
          @else
          <td></td>
          @endif
          <td>{{str_limit($user->note, 15)}}</td>
          <td class="dropdown w3-agile">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>  
              <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                  <span class="fa fa-cog dropdown-toggle" ></span>
                </a>
            <ul class="dropdown-menu" style="top: auto;">
                <li><a href="{{ route('profile', $user->id) }}"><i class="fa fa-user" aria-hidden="true" style="font-size: 16px"> Профіль користувача</i></a></li>
              @role('admin')
                <li><a href="{{ route('edit', $user->id) }}"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 16px"> Редагувати користувача</i></a></li>
              @endrole
              @role('teacher')
              <li><a href="{{ route('edit', $user->id) }}"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 16px"> Редагувати користувача</i></a></li>
              @endrole
              <li> 
                <form id="loginForm" action="{{ route('delete', $user->id) }}" onclick="return (confirm('Дійсно видалити?'))" method="post">
                   {{ csrf_field() }}
                  <input style="font-size: 14px" type="submit" id="login" value="Видалити користувача">
                </form>
              </li>
            </ul>
          </td>
        </tr>
        @endforeach
       @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection