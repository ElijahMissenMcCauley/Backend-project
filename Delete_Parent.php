
<?php
    include "db_connect.php";
?>
<html>

    <h1>Remove Parent</h1>
    <form method = "Post" >
        <?php
            $query = "SELECT parentID, pName, pSurname FROM parent";
            $result = $conn->query($query);
            $all_parents = $result -> fetch_all(MYSQLI_ASSOC);
        ?>

        <label for="DPid">Choose parent to remove:</label>
        <select name="dpID" style = "width:auto;">
            <?php
                foreach ($all_parents as $row)
                {
                    ?>
                    <option value="<?php echo($row["parentID"]); ?>"> <?php echo($row["pName"]." ".$row["pSurname"]); ?> </option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" value="Delete">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dpID"]))
            {
                $pID = $_POST["dpID"];
                $temp = explode(" ",$pID);
                $pID = $temp[0];
                $query = "DELETE FROM parent WHERE parentID = '$pID'";
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