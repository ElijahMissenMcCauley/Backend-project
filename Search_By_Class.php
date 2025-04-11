<?php
    include "db_connect.php";
    $query = "SELECT classGroup FROM class";
    $result = $conn->query($query);
    $all_classes = $result->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <title>Search by class</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form method="POST"> 
            <label for="class">Search by year group:</label> 
            <select name="class" style="width:auto;">
            <option></option> 
                <?php
                    foreach ($all_classes as $row) { 
                        ?>
                        <option> <?php echo ($row["classGroup"]) ?> </option> 
                        <?php
                    }
                ?>
            </select>
            <input type="submit" value="Search">
        </form>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Medical Information</th>
                </tr>   
            </thead>
            <tbody>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $class = $_POST["class"];
                        $query = "SELECT first_name, surname, DateOfBirth, MedInfo
                        FROM class, student 
                        WHERE student.classID = class.classID
                        AND class.classGroup = '$class'";
                        
                        $result = $conn->query($query);
                            $all_details = $result->fetch_all(MYSQLI_ASSOC);
                            foreach ($all_details as $row) {
                                echo("<tr>");
                                foreach($row as $el) {
                                    echo("<td>" . $el . "</td>");
                                }
                                echo("</tr>");
                            }
                    }
                    $conn->close(); 
                ?>
            </tbody>
        </table>
    </body>
</html>
