<?php
function __autoload($class_name)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
}

$db = new db();
$db_connect = sqlsrv_connect("ATTO\SQLEXPRESS", array("CharacterSet" => "UTF-8"));
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Hosts</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='/design/roboto.min.css' rel='stylesheet'>
    <link href='/design/material.min.css' rel='stylesheet'>
    <link href='/design/material-fullpalette.min.css' rel='stylesheet'>
    <link href='/design/ripples.min.css' rel='stylesheet'>
    <link href='//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css' rel='stylesheet'>
    <link href='/design/style.css' rel='stylesheet'>
    <script src='//code.jquery.com/jquery-1.10.2.min.js'></script>
</head>
<body>
<div class='navbar navbar-inverse'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-responsive-collapse'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
    </button>
    <div class='navbar-header'>
        <a class='navbar-brand' href='/'>Больница</a>
    </div>
    <div class='navbar-collapse collapse navbar-responsive-collapse'>
        <ul class='nav navbar-nav'>
            <li><a href='/index.php?table=class'>Кабинеты</a></li>
            <li><a href='/index.php?table=department'>Отделения</a></li>
            <li><a href='/index.php?table=roles'>Должности</a></li>
            <li><a href='/index.php?table=diagnosis'>Диагнозы</a></li>
            <li><a href='/index.php?table=drugs'>Лекарства</a></li>
            <li><a href='/index.php?table=procedure'>Процедуры</a></li>
            <li><a href='/index.php?table=employees'>Работники</a></li>
            <li><a href='/index.php?table=patients'>Пациенты</a></li>
            <li><a href='/index.php?table=card'>Карты пациентов</a></li>
        </ul>
    </div>
</div>";

if ($_GET['table'] == "class") {
    $query = "SELECT * FROM [Hospital].[dbo].[Class]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=class' method='post'>
    <input type='text' placeholder='Кабинет' name='class'/><input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Кабинет</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Number']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "department") {
    $query = "SELECT * FROM [Hospital].[dbo].[Department]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=department' method='post'>
    <input type='text' placeholder='Отделение' name='department'/><input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Отделение</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "roles") {
    $query = "SELECT * FROM [Hospital].[dbo].[Roles]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=roles' method='post'>
    <input type='text' placeholder='Должность' name='name'/>
    <input type='text' placeholder='Зарплата' name='salary'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Должность</th>
            <th>Зарплата</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Salary']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
}


if ($_GET['table'] == "diagnosis") {
    $query = "SELECT * FROM [Hospital].[dbo].[Diagnosis]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=diagnosis' method='post'>
    <input type='text' placeholder='Название диагноза' name='name'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Диагноз</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "drugs") {
    $query = "SELECT * FROM [Hospital].[dbo].[Drugs]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=drugs' method='post'>
    <input type='text' placeholder='Название лекарства' name='name'/>
    <input type='text' placeholder='Продолжительность приема' name='duration'/> дней
    <input type='text' placeholder='Дневная доза' name='dailydose'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Продолжительность приема</th>
            <th>Дневная доза</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Duration']}</td>
            <td>{$row['DailyDose']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "procedure") {
    $query = "SELECT * FROM [Hospital].[dbo].[Procedure]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=procedure' method='post'>
    <input type='text' placeholder='Название процедуры' name='name'/>
    <input type='text' placeholder='Стоимость' name='price'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Название процедуры</th>
            <th>Стоимость</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Price']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "employees") {
    $query = "SELECT * FROM [Hospital].[dbo].[Employees]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=employees' method='post'>
    <input type='text' placeholder='ФИО' name='fio'/>
    <input type='text' placeholder='Дата рождения' name='birthday'/>
    <select name='role'>";
    $query21 = "SELECT * FROM [Hospital].[dbo].[Roles]";
    $sql21 = sqlsrv_query($db_connect, $query21);
    while ($row21 = sqlsrv_fetch_array($sql21, SQLSRV_FETCH_ASSOC)) {
        echo "<option value ='{$row21['ID']}'> {$row21['Name']}</option>";
    }
    echo "</select><input type='text' placeholder='Отделение' name='department'/>
    <input type='text' placeholder='Кабинет' name='class'/>
    <input type='text' placeholder='Специализация' name='specialization'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th>Должность</th>
            <th>Отделение</th>
            <th>Кабинет</th>
            <th>Специализация</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        $query2 = "SELECT * FROM [Hospital].[dbo].[Roles] WHERE ID = '{$row['RoleID']}'";
        $sql2 = sqlsrv_query($db_connect, $query2);
        $row2 = sqlsrv_fetch_array($sql2);

        $query3 = "SELECT * FROM [Hospital].[dbo].[Department] WHERE ID = '{$row['DepartmentID']}'";
        $sql3 = sqlsrv_query($db_connect, $query3);
        $row3 = sqlsrv_fetch_array($sql3);

        $query4 = "SELECT * FROM [Hospital].[dbo].[Class] WHERE ID = '{$row['ClassID']}'";
        $sql4 = sqlsrv_query($db_connect, $query4);
        $row4 = sqlsrv_fetch_array($sql4);
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['FullName']}</td>
            <td>". $row['DateOfBirth']->format('Y-m-d') ."</td>
            <td>{$row2['Name']}</td>
            <td>{$row3['Name']}</td>
            <td>{$row4['Number']}</td>
            <td>{$row['Specialization']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "patients") {
    $query = "SELECT * FROM [Hospital].[dbo].[Patients]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=patients' method='post'>
    <input type='text' placeholder='ФИО' name='fio'/>
    <input type='text' placeholder='Дата рождения' name='birthday'/>
    <input type='text' placeholder='Группа крови' name='bloodgroup'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th>Группа крови</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['FullName']}</td>
            <td>". $row['DateOfBirth']->format('Y-m-d') ."</td>
            <td>{$row['BloodGroup']}</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

if ($_GET['table'] == "card") {
    $query = "SELECT * FROM [Hospital].[dbo].[Card]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=card' method='post'>
    <input type='text' placeholder='Id пациента' name='PatientID'/>
    <input type='text' placeholder='Id врача' name='EmployeesID'/>
    <input type='text' placeholder='Id диагноза' name='DiagnosisID'/>
    <input type='text' placeholder='Id лекарства' name='DrugsID'/>
    <input type='text' placeholder='Id процедуры' name='ProcedureID'/>
    <input type='text' placeholder='Дата поступления' name='DateIn'/>
    <input type='text' placeholder='Дата выписки' name='DateOut'/>
    <input type='submit' value='добавить'></form><br>";
    echo "<table class='table table-striped table-hover '>
    <thead>
        <tr>
            <th>Id</th>
            <th>Id пациента</th>
            <th>Id врача</th>
            <th>Id диагноза</th>
            <th>Id лекарства</th>
            <th>Id процедуры</th>
            <th>Дата поступления</th>
            <th>Дата выписки</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        $query2 = "SELECT * FROM [Hospital].[dbo].[Patients] WHERE ID = '{$row['PatientID']}'";
        $sql2 = sqlsrv_query($db_connect, $query2);
        $row2 = sqlsrv_fetch_array($sql2);

        $query3 = "SELECT * FROM [Hospital].[dbo].[Employees] WHERE ID = '{$row['EmployeesID']}'";
        $sql3 = sqlsrv_query($db_connect, $query3);
        $row3 = sqlsrv_fetch_array($sql3);

        $query4 = "SELECT * FROM [Hospital].[dbo].[Diagnosis] WHERE ID = '{$row['DiagnosisID']}'";
        $sql4 = sqlsrv_query($db_connect, $query4);
        $row4 = sqlsrv_fetch_array($sql4);

        $query5 = "SELECT * FROM [Hospital].[dbo].[Drugs] WHERE ID = '{$row['DrugsID']}'";
        $sql5 = sqlsrv_query($db_connect, $query5);
        $row5 = sqlsrv_fetch_array($sql5);

        $query6 = "SELECT * FROM [Hospital].[dbo].[Procedure] WHERE ID = '{$row['ProcedureID']}'";
        $sql6 = sqlsrv_query($db_connect, $query6);
        $row6 = sqlsrv_fetch_array($sql6);

        echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['PatientID']}</td>
            <td>{$row2['Name']}</td>
            <td>{$row3['Name']}</td>
            <td>{$row4['Number']}</td>
            <td>{$row5['Number']}</td>
            <td>{$row6['Number']}</td>
            <td>". $row['DateIn']->format('Y-m-d') ."</td>
            <td>". $row['DateOut']->format('Y-m-d') ."</td>
            <td style = 'text-align: center'><a href='javascript:void(0)' class='btn btn-flat btn-primary btn-xs delete_button'>Редактировать</a>
            <a href='javascript:void(0)' class='btn btn-flat btn-danger btn-xs delete_button'>Удалить</a></td>
        </tr>";
    }
    echo "</tbody></table>";
}

echo "<script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js'></script>
<script src='/js/material.min.js'></script>
<script src='/js/ripples.min.js'></script>
<script>
    $.material.init();
</script>
<script src='//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js'></script>
</body>
</html>";