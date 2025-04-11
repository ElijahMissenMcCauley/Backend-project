
<?php
    include "db_connect.php";
?>
<html>

    <h1>Remove Class</h1>
    <form method = "Post" >
        <?php
            $query = "SELECT classID, classGroup FROM class";
            $result = $conn->query($query);
            $all_classes = $result -> fetch_all(MYSQLI_ASSOC);
        ?>

        <label for="dcID">Choose class to remove:</label>
        <select name="dcID" style = "width:auto;">
            <?php
                foreach ($all_classes as $row)
                {
                    ?>
                    <option value="<?php echo($row["classID"]); ?>"> <?php echo($row["classGroup"]); ?> </option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" value="Delete">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dcID"]))
            {
                $cID = $_POST["dcID"];
                $temp = explode(" ",$cID);
                $cID = $temp[0];
                $conn->query("UPDATE student SET classID = NULL WHERE classID = '$cID'");
                $query = "DELETE FROM class WHERE classID = '$cID'";
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