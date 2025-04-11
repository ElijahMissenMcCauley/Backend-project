<?php
include("db_connect.php");

$Name = $_POST["tName"]; 
$Surname = $_POST["tSurname"];
$Address = $_POST["tAddress"];
$email = $_POST["tEmail"];
$salary = $_POST["annualSalary"];
$bgCheck = $_POST["bgCheck"];

if ($Name == "" || $Surname == "" || $Address == "" || $email == "" || $salary == "" || $bgCheck == "") {
    header("Location: Form for primary school.php?result=invalid");
    die();
}

$query = "INSERT INTO `teacher` (`tName`, `tSurname`, `tAddress`, `tEmail`, `tSalary`, `bgCheck`)
                 VALUES ('$Name', '$Surname', '$Address', '$email', '$salary', '$bgCheck')";
                 
$result = mysqli_query($conn, $query);
if(mysqli_errno($conn)){
    header("Location: Form for primary school.php?result=duplicate");
    die();
}

    //echo("Failed to execute query: " . mysqli_error($conn));
    //die();

header("Location: Form for primary school.php?result=success");

die();
?>
