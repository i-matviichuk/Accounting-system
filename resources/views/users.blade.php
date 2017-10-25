@extends('blocks.layout')

@section('users') class="active" @endsection

@section('content')

@role('admin')
<div class="container" style="padding-top: 5%; padding-bottom: 8%; width: 80%">
<div id="demo">
  <h1 style="float: left;"><i class="fa fa-users" aria-hidden="true"></i> Users</h1>
  <a style="float: right;" href="/new"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new user</a>
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
          <th data-type="number"><input type="text" id="myInput0" style="color: black" onkeyup="myFunction()" placeholder="Пошук по ID.." title="Введіть ID"> ID </th>
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
          <td>{{$user->id}}</td>
          <td>{{$user->lastname}} {{$user->name}} {{$user->surname}}</td>
          
          <td>{{$role->name}}</td>
          
          <td>{{$user->login}}</td>
          <td>{{$user->email}}</td>
          @if($user->group != NULL)
            <td><a href="/">{{$user->group->group_number}}</a></td>
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
                <li><a href="{{ route('edit', $user->id) }}"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 16px"> Редагувати користувача</i></a></li>
              <li> 
                <form id="loginForm" action="{{ route('delete', $user->id) }}" method="post">
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
@endrole

@endsection