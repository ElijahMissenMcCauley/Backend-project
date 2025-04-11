<?php
    include("db_connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Parent information</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>

    <body>
        <h1>Update Teacher info</h1>
        <form method = "post">
            <?php
                $query = "SELECT parentID, pName, pSurname FROM parent";
                $result = $conn->query($query);
                $all_parents = $result -> fetch_all(MYSQLI_ASSOC);

            ?>

            <label for = "chooseParent">Choose Teacher to update: </label>
            <select name = "chooseParent" style = "width:auto;">
                <?php
                foreach($all_parents as $row)
                {
                    ?>
                    <option value="<?php echo($row["parentID"]); ?>"> <?php echo($row["pName"]." ".$row["pSurname"]); ?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            <label for = "upName">First Name:</label>
            <input type = "text" name = "upName">
            <br>
            <label for = "upSurname">Last Name:</label>
            <input type = "text" name = "upSurname">
            <br>
            <label for = "upAddress">Address:</label>
            <input type = "text" name = "upAddress">
            <br>
            <label for = "upEmail">Email Address:</label>
            <input type = "text" name = "upEmail">
            <br>
            <label for = "upPhone"> Phone Number:</label>
            <input type = "text" name = "upPhone">
            <br>
            <label for = "uNumChildren">Number of children:</label>
            <input type = "number" name = "uNumChildren" min = "1">
            <br>
            <input type = "submit" value = "Update">

            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["chooseParent"]))
                {
                    $fname_set = false;
                    $lname_set = false;
                    $address_set = false;
                    $email_set = false;
                    $phone_set = false;
                    $numchildren_set = false;

                    if(!empty($_POST["upName"]))
                    {
                        $fname_set = true;
                    }

                    if(!empty($_POST["upSurname"]))
                    {
                        $lname_set = true;
                    }

                    if(!empty($_POST["upAddress"]))
                    {
                        $address_set = true;
                    }

                    if (!empty($_POST["upEmail"]))
                    {
                        if(strlen($_POST["upEmail"]) > 100 || !str_contains($_POST["upEmail"], "@") || !str_contains($_POST["upEmail"], "."))
                        {
                            echo("Must enter valid email");
                            die();
                        }
                        else
                        {
                            $email_set = true;
                        }
                    }

                    if(!empty($_POST["upPhone"]))
                    {
                        $phone_set = true;
                    }

                    if(!empty($_POST["uNumChildren"]))
                    {
                        $numchildren_set = true;
                    }
                    
                    if(!$fname_set && !$lname_set && !$address_set && !$email_set && !$phone_set && 
                    !$numchildren_set)
                    {
                        echo("At least one field needs to be filled in");
                        die();
                    }

                    $query = "UPDATE parent SET ";
                    $first = true;
                    
                    if($fname_set) {
                        $fname = $_POST["upName"];
                        $query .= ($first ? "" : ", ") . "pName = '$fname'";
                        $first = false;
                    }
                    
                    if($lname_set) {
                        $lname = $_POST["upSurname"];
                        $query .= ($first ? "" : ", ") . "pSurname = '$lname'";
                        $first = false;
                    }
                    
                    if($address_set) {
                        $address = $_POST["upAddress"];
                        $query .= ($first ? "" : ", ") . "pAddress = '$address'";
                        $first = false;
                    }
                    
                    if($email_set) {
                        $email = $_POST["upEmail"];
                        $query .= ($first ? "" : ", ") . "pEmail = '$email'";
                        $first = false;
                    }
                    
                    if($phone_set) {
                        $phone = $_POST["upPhone"];
                        $query .= ($first ? "" : ", ") . "pTelephone = '$phone'";
                        $first = false;
                    }
                    
                    if($numchildren_set) {
                        $numchildren = $_POST["uNumChildren"];
                        $query .= ($first ? "" : ", ") . "numChildren = '$numchildren'";
                        $first = false;
                    }

                    $tID = $_POST["chooseParent"];
                    $query .= " WHERE parentID = '$tID'";

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