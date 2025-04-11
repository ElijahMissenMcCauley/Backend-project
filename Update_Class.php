<?php
    include("db_connect.php");
    $query = "SELECT teacherID, tName, tSurname FROM teacher";
    $result = $conn->query($query);
    $all_teachers = $result -> fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Class information</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>

    <body>
        <h1>Update Class info</h1>
        <form method = "post">
            <?php
                $query = "SELECT classID, classGroup FROM class";
                $result = $conn->query($query);
                $all_classes = $result -> fetch_all(MYSQLI_ASSOC);

            ?>

            <label for = "chooseclass">Choose Class to update:</label>
            <select name="chooseclass" style = "width:auto;">
            <?php
                foreach($all_classes as $row)
                {
                    ?>
                    <option value="<?php echo $row["classID"]; ?>"> <?php echo $row["classGroup"]; ?> </option>
            <?php
                }
            ?>
            </select>
            <br>
            <label for = "ucGroup">Year Group:</label>
            <input type = "text" name = "ucGroup">
            <br>
            <label for = "uCapacity">Class Capacity:</label>
            <input type = "number" name = "uCapacity">
            <br>
            <label for = "uTeacher">Class Teacher:</label>
            <select name = "uTeacher" style = "width:auto;">
                <option value="">Select Teacher</option>
                <?php
                    foreach($all_teachers as $row) {
                        ?>
                        <option value="<?php echo $row["teacherID"]; ?>"><?php echo $row["tName"] . " " . $row["tSurname"]; ?></option>
                    <?php
                    }
                ?>
            </select>
            <input type = "submit" value = "Update">

            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["chooseclass"]))
                {
                    $cCapacity_set = false;
                    $cGroup_set = false;
                    $cTeacher_set = false;
                    if(!empty($_POST["ucGroup"]))
                    {
                        $cGroup_set = true;
                    }

                    if(!empty($_POST["uCapacity"]))
                    {
                        $cCapacity_set = true;
                    }

                    if(!empty($_POST["uTeacher"]))
                    {
                        $cTeacher_set = true;
                    }

                    if(!$cCapacity_set && !$cGroup_set && !$cTeacher_set)
                    {
                        echo("At least one field needs to be filled in");
                        die();
                    }

                    $query = "UPDATE class SET ";
                    $first = true;
                    
                    if($cTeacher_set) {
                        $teacherID = $_POST["uTeacher"];
                        $query .= ($first ? "" : ", ") . "teacherID = '$teacherID'";
                        $first = false;
                    }
                    
                    if($cGroup_set) {
                        $classname = $_POST["ucGroup"];
                        $query .= ($first ? "" : ", ") . "classGroup = '$classname'";
                        $first = false;
                    }
                    
                    if($cCapacity_set) {
                        $classcapacity = $_POST["uCapacity"];
                        $query .= ($first ? "" : ", ") . "classCapacity = '$classcapacity'";
                        $first = false;
                    }
                    
                    $cID = $_POST["chooseclass"];
                    $query .= " WHERE classID = '$cID'";
                    
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