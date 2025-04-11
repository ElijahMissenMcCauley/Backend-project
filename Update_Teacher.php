<?php
    include("db_connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Teacher information</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>

    <body>
        <h1>Update Teacher info</h1>
        <form method = "post">
            <?php
                $query = "SELECT teacherID, tName, tSurname FROM teacher";
                $result = $conn->query($query);
                $all_teachers = $result -> fetch_all(MYSQLI_ASSOC);

            ?>

            <label for = "chooseTeacher">Choose Teacher to update: </label>
            <select name = "chooseTeacher" style = "width:auto;">
                <?php
                foreach($all_teachers as $row)
                {
                    ?>
                    <option value="<?php echo($row["teacherID"]); ?>"> <?php echo($row["tName"]." ".$row["tSurname"]); ?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            <label for = "utName">First Name:</label>
            <input type = "text" name = "utName">
            <br>
            <label for = "utSurname">Last Name:</label>
            <input type = "text" name = "utSurname">
            <br>
            <label for = "utAddress">Address:</label>
            <input type = "text" name = "utAddress">
            <br>
            <label for = "utEmail">Email Address:</label>
            <input type = "text" name = "utEmail">
            <br>
            <label for = "utSalary">Annaul Salary:</label>
            <input type = "number" name = "utSalary" min = "28000" max = "35000">
            <br>
            <label for = "ubgCheck">Background check:</label>
            <input type = "radio" name = "uCapacity">
            <br>
            <input type = "submit" value = "Update">

            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["chooseTeacher"]))
                {
                    $fname_set = false;
                    $lname_set = false;
                    $address_set = false;
                    $email_set = false;
                    $salary_set = false;
                    $bgCheck_set = false;

                    if(!empty($_POST["utName"]))
                    {
                        $fname_set = true;
                    }

                    if(!empty($_POST["utSurname"]))
                    {
                        $lname_set = true;
                    }

                    if(!empty($_POST["utAddress"]))
                    {
                        $address_set = true;
                    }

                    if (!empty($_POST["utEmail"]))
                    {
                        if(strlen($_POST["utEmail"]) > 100 || !str_contains($_POST["utEmail"], "@") || !str_contains($_POST["utEmail"], "."))
                        {
                            echo("Must enter valid email");
                            die();
                        }
                        else
                        {
                            $email_set = true;
                        }
                    }

                    if(!empty($_POST["utSalary"]))
                    {
                        $salary_set = true;
                    }

                    if(!empty($_POST["ubgCheck"]))
                    {
                        $bgCheck_set = true;
                    }
                    
                    if(!$fname_set && !$lname_set && !$address_set && !$email_set && !$salary_set && 
                    !$bgCheck_set)
                    {
                        echo("At least one field needs to be filled in");
                        die();
                    }

                    $query = "UPDATE teacher SET ";
                    $first = true;
                    
                    if($fname_set) {
                        $fname = $_POST["utName"];
                        $query .= ($first ? "" : ", ") . "tName = '$fname'";
                        $first = false;
                    }
                    
                    if($lname_set) {
                        $lname = $_POST["utSurname"];
                        $query .= ($first ? "" : ", ") . "tSurname = '$lname'";
                        $first = false;
                    }
                    
                    if($address_set) {
                        $address = $_POST["utAddress"];
                        $query .= ($first ? "" : ", ") . "tAddress = '$address'";
                        $first = false;
                    }
                    
                    if($email_set) {
                        $email = $_POST["utEmail"];
                        $query .= ($first ? "" : ", ") . "tEmail = '$email'";
                        $first = false;
                    }
                    
                    if($salary_set) {
                        $salary = $_POST["utSalary"];
                        $query .= ($first ? "" : ", ") . "tSalary = '$salary'";
                        $first = false;
                    }
                    
                    if($bgCheck_set) {
                        $bgCheck = $_POST["ubgCheck"];
                        $query .= ($first ? "" : ", ") . "bgCheck = '$bgCheck'";
                        $first = false;
                    }

                    $tID = $_POST["chooseTeacher"];
                    $query .= " WHERE teacherID = '$tID'";

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