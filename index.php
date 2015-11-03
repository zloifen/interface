<?php
function __autoload($class_name)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
}

$db = new db();
$db_connect = sqlsrv_connect("ATTO\SQLEXPRESS", array("CharacterSet" => "UTF-8"));
echo "<a href='/index.php?table=class'>Кабинеты</a> ";
echo "<a href='/index.php?table=department'>Отделения</a> ";
echo "<a href='/index.php?table=roles'>Должности</a> ";
echo "<a href='/index.php?table=diagnosis'>Диагнозы</a> ";
echo "<a href='/index.php?table=drugs'>Лекарства</a> ";
echo "<a href='/index.php?table=procedure'>Процедуры</a> ";
echo "<a href='/index.php?table=employees'>Работники</a> ";
echo "<a href='/index.php?table=patients'>Пациенты</a>";
echo "<br/>";
if ($_GET['table'] == "class") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Class]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=class' method='post'>
    <input type='text' placeholder='Кабинет' name='class'/><input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "department") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Department]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=department' method='post'>
    <input type='text' placeholder='Отделение' name='department'/><input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "roles") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Roles]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=roles' method='post'>
    <input type='text' placeholder='Должность' name='name'/>
    <input type='text' placeholder='Зарплата' name='salary'/>
    <input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "diagnosis") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Diagnosis]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=diagnosis' method='post'>
    <input type='text' placeholder='Название диагноза' name='name'/>
    <input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "drugs") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Drugs]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=drugs' method='post'>
    <input type='text' placeholder='Название лекарства' name='name'/>
    <input type='text' placeholder='Продолжительность приема' name='duration'/> дней
    <input type='text' placeholder='Дневная доза' name='dailydose'/>
    <input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "procedure") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Procedure]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=procedure' method='post'>
    <input type='text' placeholder='Название процедуры' name='name'/>
    <input type='text' placeholder='Стоимость' name='price'/>
    <input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "employees") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Employees]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=employees' method='post'>
    <input type='text' placeholder='ФИО' name='fio'/>
    <input type='text' placeholder='Дата рождения' name='birthday'/>
    <input type='text' placeholder='Должность' name='role'/>
    <input type='text' placeholder='Отделение' name='department'/>
    <input type='text' placeholder='Кабинет' name='class'/>
    <input type='text' placeholder='Специализация' name='specialization'/>
    <input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}

if ($_GET['table'] == "patients") {
    $query = "SELECT * FROM [Bolnica].[dbo].[Patients]";
    $sql = sqlsrv_query($db_connect, $query);
    echo "<form action='/process.php?insert=1&table=patients' method='post'>
    <input type='text' placeholder='ФИО' name='fio'/>
    <input type='text' placeholder='Дата рождения' name='birthday'/>
    <input type='text' placeholder='Диагноз' name='diagnosis'/>
    <input type='text' placeholder='Дата поступления' name='datein'/>
    <input type='text' placeholder='Дата выписки' name='dateout'/>
    <input type='submit' value='добавить'></form>";
    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo "<br/>";
    }
}