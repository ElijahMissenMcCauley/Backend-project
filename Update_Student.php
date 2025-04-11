<?php
    include("db_connect.php");
    $query = "SELECT classID, classGroup FROM class";
    $result = $conn->query($query);
    $all_classes = $result -> fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Student information</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>

    <body>
        <h1>Update Teacher info</h1>
        <form method = "post">
            <?php
                $query = "SELECT studentID, first_name, surname FROM student";
                $result = $conn->query($query);
                $all_students = $result -> fetch_all(MYSQLI_ASSOC);

            ?>

            <label for = "chooseStudent">Choose Student to update: </label>
            <select name = "chooseStudent" style = "width:auto;">
                <?php
                foreach($all_students as $row)
                {
                    ?>
                    <option value="<?php echo($row["studentID"]); ?>"> <?php echo($row["first_name"]." ".$row["surname"]); ?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            <label for = "usName">First Name:</label>
            <input type = "text" name = "usName">
            <br>
            <label for = "usSurname">Last Name:</label>
            <input type = "text" name = "usSurname">
            <br>
            <label for = "usAge">Age:</label>
            <input type = "number" name = "usAge">
            <label for = "usDoB">Date of birth:</label>
            <input type = "date" name = "usDoB">
            <br>
            <label for = "usAddress">Address:</label>
            <input type = "text" name = "usAddress">
            <br>
            <label for = "uClass">Class:</label>
            <select name = "uClass" style = "width:auto;">
                <?php
                foreach($all_classes as $row)
                {
                    ?>
                    <option value="<?php echo($row["classID"]); ?>"> <?php echo($row["classGroup"]); ?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            <textarea name = "usMed" rows = "5" cols = 75>Medical Information: None</textarea>
            <input type = "submit" value = "Update">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["chooseStudent"]))
                {
                    $fname_set = false;
                    $lname_set = false;
                    $address_set = false;
                    $age_set = false;
                    $class_set = false;
                    $dob_set = false;
                    $medinfo_set = false;

                    if(!empty($_POST["usName"]))
                    {
                        $fname_set = true;
                    }

                    if(!empty($_POST["usSurname"]))
                    {
                        $lname_set = true;
                    }

                    if(!empty($_POST["usAddress"]))
                    {
                        $address_set = true;
                    }

                    if (!empty($_POST["usAge"]))
                    {
                        $age_set = true;
                    }

                    if(!empty($_POST["usDoB"]))
                    {
                        $dob_set = true;
                    }

                    if(!empty($_POST["uClass"]))
                    {
                        $class_set = true;
                    }

                    if(!empty($_POST["usMed"]))
                    {
                        $medinfo_set = true;
                    }
                    
                    if(!$fname_set && !$lname_set && !$address_set && !$age_set && !$dob_set && 
                    !$class_set && $medinfo_set)
                    {
                        echo("At least one field needs to be filled in");
                        die();
                    }

                    $query = "UPDATE student SET ";
                    $first = true;
                    
                    if($fname_set) {
                        $fname = $_POST["usName"];
                        $query .= ($first ? "" : ", ") . "first_name = '$fname'";
                        $first = false;
                    }
                    
                    if($lname_set) {
                        $lname = $_POST["usSurname"];
                        $query .= ($first ? "" : ", ") . "surname = '$lname'";
                        $first = false;
                    }
                    
                    if($address_set) {
                        $address = $_POST["usAddress"];
                        $query .= ($first ? "" : ", ") . "address = '$address'";
                        $first = false;
                    }
                    
                    if($age_set) {
                        $age = $_POST["usAge"];
                        $query .= ($first ? "" : ", ") . "age = '$age'";
                        $first = false;
                    }
                    
                    if($dob_set) {
                        $dob = $_POST["usDoB"];
                        $query .= ($first ? "" : ", ") . "DateOfBirth = '$dob'";
                        $first = false;
                    }
                    
                    if($class_set) {
                        $classID = $_POST["uClass"];
                        $query .= ($first ? "" : ", ") . "classID = '$classID'";
                        $first = false;
                    }

                    if($medinfo_set)
                    {
                        $medinfo = $_POST["usMed"];
                        $query .= ($first ? "" : ", ") . "medInfo = '$medinfo'";
                        $first = false;
                    }

                    $sID = $_POST["chooseStudent"];
                    $query .= " WHERE studentID = '$sID'";

                    if ($conn->query($query)) {
                        echo("class amended");
                    } else {
                        echo("Update failed: " . $conn->error);
                    }
                }
            ?>
        </form>
    </body>
</html>