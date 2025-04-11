
<?php
    include "db_connect.php";
?>
<html>

    <h1>Remove Student</h1>
    <form method = "Post" >
        <?php
            $query = "SELECT studentID, first_name, surname FROM student";
            $result = $conn->query($query);
            $all_parents = $result -> fetch_all(MYSQLI_ASSOC);
        ?>

        <label for="dsID">Choose student to remove:</label>
        <select name="dsID" style = "width:auto;">
            <?php
                foreach ($all_parents as $row)
                {
                    ?>
                    <option value="<?php echo($row["studentID"]); ?>"> <?php echo($row["first_name"]." ".$row["surname"]); ?> </option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" value="Delete">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dsID"]))
            {
                $sID = $_POST["dsID"];
                $temp = explode(" ",$sID);
                $sID = $temp[0];
                $query = "DELETE FROM student WHERE studentID = '$sID'";
                if ($conn->query($query))
                {
                    echo("Class deleted");
                }
                else
                {
                    echo("Delete failed");
                }
            }
            ?>
    </form>


    <?php
        $conn->close();        
    ?>

     
    <br>
    <br>
    <br>
</html>