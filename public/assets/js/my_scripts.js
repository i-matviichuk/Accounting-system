/**
 * Created by illia on 30.10.17.
 */
function form1()
{
    document.getElementById("form1").style.display="block";
    document.getElementById("form2").style.display="none";
}

function form2()
{
    document.getElementById("form1").style.display="none";
    document.getElementById("form2").style.display="block";
}

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

// search
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