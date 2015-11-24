<?php
function __autoload($class_name)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
}

$db = new db();
$db_connect = sqlsrv_connect("ATTO\SQLEXPRESS", array("CharacterSet" => "UTF-8"));

if ((isset($_GET['insert'])) && ($_GET['insert'] == 1)) {
    if ($_GET['table'] == 'class') {
        $query = "INSERT INTO  [Hospital].[dbo].[Class] VALUES ('{$_POST['class']}')";
        $sql = sqlsrv_query($db_connect, $query);
       // print_r(sqlsrv_errors());
        header('Location: /index.php?table=class');
        exit();
    }

    if ($_GET['table'] == 'department') {
        $query = "INSERT INTO  [Hospital].[dbo].[Department] VALUES ('{$_POST['department']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=department');
        exit();
    }

    if ($_GET['table'] == 'roles') {
        $query = "INSERT INTO  [Hospital].[dbo].[Roles] VALUES ('{$_POST['name']}', '{$_POST['salary']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=roles');
        exit();
    }

    if ($_GET['table'] == 'diagnosis') {
        $query = "INSERT INTO  [Hospital].[dbo].[Diagnosis] VALUES ('{$_POST['name']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=diagnosis');
        exit();
    }

    if ($_GET['table'] == 'drugs') {
        $query = "INSERT INTO  [Hospital].[dbo].[Drugs] VALUES ('{$_POST['name']}', '{$_POST['duration']}',
        '{$_POST['dailydose']}', '{$_POST['singledose']}', '{$_POST['price']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=drugs');
        exit();
    }

    if ($_GET['table'] == 'procedure') {
        $query = "INSERT INTO  [Hospital].[dbo].[Procedure] VALUES ('{$_POST['name']}', '{$_POST['price']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=procedure');
        exit();
    }

    if ($_GET['table'] == 'employees') {
        $query = "INSERT INTO  [Hospital].[dbo].[Employees] VALUES ('{$_POST['fio']}', '{$_POST['birthday']}',
        '{$_POST['role']}', '{$_POST['department']}', '{$_POST['class']}', '{$_POST['specialization']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=employees');
        exit();
    }

    if ($_GET['table'] == 'patients') {
        $query = "INSERT INTO  [Hospital].[dbo].[Patients] VALUES ('{$_POST['fio']}', '{$_POST['birthday']}',
        '{$_POST['bloodgroup']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=patients');
        exit();
    }

    if ($_GET['table'] == 'card') {
        $query = "INSERT INTO  [Hospital].[dbo].[Card] VALUES ('{$_POST['patients']}', '{$_POST['employees']}',
        '{$_POST['diagnosis']}', '{$_POST['drugs']}', '{$_POST['procedure']}', '{$_POST['DateIn']}',
        '{$_POST['DateOut']}')";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=card');
        exit();
    }
}

if ((isset($_GET['update'])) && ($_GET['update'] == 1)) {
    if ($_GET['table'] == 'class') {
        $query = "UPDATE [Hospital].[dbo].[Class] SET Number = {$_POST['class']} WHERE ID={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        print_r(sqlsrv_errors());
        header('Location: /index.php?table=class');
        exit();
    }
    if ($_GET['table'] == 'department') {
        $query = "UPDATE [Hospital].[dbo].[Department] SET Name = '{$_POST['department']}' WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        print_r(sqlsrv_errors());
        header('Location: /index.php?table=department');
        exit();
    }

    if ($_GET['table'] == 'roles') {
        $query = "UPDATE  [Hospital].[dbo].[Roles] SET Name = '{$_POST['name']}', Salary = '{$_POST['salary']}' WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=roles');
        exit();
    }

    if ($_GET['table'] == 'diagnosis') {
        $query = "UPDATE [Hospital].[dbo].[Diagnosis] SET Name = '{$_POST['name']}' WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=diagnosis');
        exit();
    }

    if ($_GET['table'] == 'drugs') {
        $query = "UPDATE [Hospital].[dbo].[Drugs] SET Name = '{$_POST['name']}', Duration = '{$_POST['duration']}',
        DailyDose = '{$_POST['dailydose']}', SingleDose = '{$_POST['singledose']}', Price = '{$_POST['price']}'
        WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=drugs');
        exit();
    }

    if ($_GET['table'] == 'procedure') {
        $query = "UPDATE  [Hospital].[dbo].[Procedure] SET Name = '{$_POST['name']}', Price = '{$_POST['price']}' WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=procedure');
        exit();
    }

    if ($_GET['table'] == 'employees') {
        $query = "UPDATE [Hospital].[dbo].[Employees] SET FullName = '{$_POST['fio']}', DateOfBirth = '{$_POST['birthday']}',
        RoleID = '{$_POST['role']}', DepartmentID = '{$_POST['department']}', ClassID = '{$_POST['class']}', Specialization = '{$_POST['specialization']}'
        WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=employees');
        exit();
    }

    if ($_GET['table'] == 'patients') {
        $query = "UPDATE [Hospital].[dbo].[Patients] SET FullName ='{$_POST['fio']}', DateOfBirth = '{$_POST['birthday']}',
        BloodGroup = '{$_POST['bloodgroup']}' WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=patients');
        exit();
    }

    if ($_GET['table'] == 'card') {
        $query = "UPDATE [Hospital].[dbo].[Card] SET PatientID = '{$_POST['patients']}', EmployeesID = '{$_POST['employees']}',
        DiagnosisID = '{$_POST['diagnosis']}', DrugsID = '{$_POST['drugs']}', ProcedureID = '{$_POST['procedure']}',
        DateIn = '{$_POST['DateIn']}', DateOut = '{$_POST['DateOut']}' WHERE ID='{$_GET['id']}'";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=card');
        exit();
    }
}

if ((isset($_GET['delete'])) && ($_GET['delete'] == 1)) {
    if ($_GET['table'] == 'class') {
        $query = "DELETE FROM [Hospital].[dbo].[Class] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=class');
        exit();
    }
    if ($_GET['table'] == 'department') {
        $query = "DELETE FROM [Hospital].[dbo].[Department] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=department');
        exit();
    }

    if ($_GET['table'] == 'roles') {
        $query = "DELETE FROM [Hospital].[dbo].[Roles] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=roles');
        exit();
    }

    if ($_GET['table'] == 'diagnosis') {
        $query = "DELETE FROM [Hospital].[dbo].[Diagnosis] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=diagnosis');
        exit();
    }

    if ($_GET['table'] == 'drugs') {
        $query = "DELETE FROM [Hospital].[dbo].[Drugs] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=drugs');
        exit();
    }

    if ($_GET['table'] == 'procedure') {
        $query = "DELETE FROM [Hospital].[dbo].[Procedure] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=procedure');
        exit();
    }

    if ($_GET['table'] == 'employees') {
        $query = "DELETE FROM [Hospital].[dbo].[Employees] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=employees');
        exit();
    }

    if ($_GET['table'] == 'patients') {
        $query = "DELETE FROM [Hospital].[dbo].[Patients] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=patients');
        exit();
    }

    if ($_GET['table'] == 'card') {
        $query = "DELETE FROM [Hospital].[dbo].[Card] WHERE ID ={$_GET['id']}";
        $sql = sqlsrv_query($db_connect, $query);
        header('Location: /index.php?table=card');
        exit();
    }
}