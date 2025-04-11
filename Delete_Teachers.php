
<?php
    include "db_connect.php";
?>
<html>

    <h1>Remove Teacher</h1>
    <form method = "Post" >
        <?php
            $query = "SELECT teacherID, tName, tSurname FROM teacher";
            $result = $conn->query($query);
            $all_teachers = $result -> fetch_all(MYSQLI_ASSOC);
        ?>

        <label for="dtID">Choose teacher to remove:</label>
        <select name="dtID" style = "width:auto;">
            <?php
                foreach ($all_teachers as $row)
                {
                    ?>
                    <option value="<?php echo($row["teacherID"]); ?>"> <?php echo($row["tName"]." ".$row["tSurname"]); ?> </option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" value="Delete">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dtID"]))
            {
                $tID = $_POST["dtID"];
                $temp = explode(" ",$tID);
                $tID = $temp[0];
                $conn->query("UPDATE class SET teacherID = NULL WHERE classID = '$tID'");
                $query = "DELETE FROM teacher WHERE teacherID = '$tID'";
                if ($conn->query($query))
                {
                    echo("Teacher deleted");
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