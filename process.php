<?php
function __autoload($class_name)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
}

$db = new db();
$db_connect = sqlsrv_connect("ATTO\SQLEXPRESS", array("CharacterSet" => "UTF-8"));

if ((isset($_GET['insert'])) && ($_GET['insert'] == 1)) {
    if ($_GET['table'] == 'class') {
        $query = "INSERT INTO  [Bolnica].[dbo].[Class] VALUES ('{$_POST['class']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=class');
        exit();
    }
    if ($_GET['table'] == 'department') {
        $query = "INSERT INTO  [Bolnica].[dbo].[Department] VALUES ('{$_POST['department']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=department');
        exit();
    }
    if ($_GET['table'] == 'roles') {
        $query = "INSERT INTO  [Bolnica].[dbo].[Roles] VALUES ('{$_POST['name']}', '{$_POST['salary']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=roles');
        exit();
    }

    if ($_GET['table'] == 'diagnosis') {
        $query = "INSERT INTO  [Bolnica].[dbo].[Diagnosis] VALUES ('{$_POST['name']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=diagnosis');
        exit();
    }

    if ($_GET['table'] == 'drugs') {
        $query = "INSERT INTO  [Bolnica].[dbo].[Diagnosis] VALUES ('{$_POST['name']}', '{$_POST['duration']}', '{$_POST['dailydose']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=drugs');
        exit();
    }
}