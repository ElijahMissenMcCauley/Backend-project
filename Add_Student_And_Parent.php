<?php
include("db_connect.php");

$studentName = $_POST["fname"]; 
$studentSurname = $_POST["surname"];
$address = $_POST["Address"];
$MedInfo = $_POST["MedInfo"];
$age = $_POST["age"];
$DoB = $_POST["birthday"];
$classID = $_POST["Year"];
$pName = $_POST["pName"];
$pSurname = $_POST["pSurname"];
$pAddress = $_POST["pAddress"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$numChildren = $_POST["numChildren"];

if ($studentName == "" || $studentSurname == "" || $address == "" || $MedInfo == "" || $age == "" || $DoB == "" || $classID == "" 
    || $pName == "" || $pSurname == "" || $pAddress == "" || $email == "" || $phone == "") {
    header("Location: Form for primary school.php?result=invalid");
    die();
}

// Insert student
$studentQuery = "INSERT INTO `student` (`classID`, `first_name`, `surname`, `age`, `address`, `medInfo`, `DateOfBirth`)
                 VALUES ('$classID', '$studentName', '$studentSurname', '$age', '$address', '$MedInfo', '$DoB')";
                 
if (mysqli_query($conn, $studentQuery)) {
    $studentID = mysqli_insert_id($conn); // Get student ID

    // Insert parent
    $parentQuery = "INSERT INTO `parent` (`pName`, `pSurname`, `pAddress`, `pEmail`, `pTelephone`, `numChildren`)
                    VALUES ('$pName', '$pSurname', '$pAddress', '$email', '$phone', '$numChildren')";

    if (mysqli_query($conn, $parentQuery)) {
        $parentID = mysqli_insert_id($conn); // Get parent ID

        // Link parent to student
        $linkQuery = "INSERT INTO `student_parent` (`studentID`, `parentID`) VALUES ('$studentID', '$parentID')";
        mysqli_query($conn, $linkQuery);

        header("Location: Form for primary school.php?result=success");
        exit();
    } else {
        echo "Error adding parent: " . mysqli_error($conn);
    }
} else {
    echo "Error adding student: " . mysqli_error($conn);
}
?>
