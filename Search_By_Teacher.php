<?php
    include "db_connect.php";
    $query = "SELECT teacherID, tName, tSurname FROM teacher";
    $result = $conn->query($query);
    $all_classes = $result->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <title> Search for teacher: </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="POST"> 
            <label for="teacher">Search for teacher:</label> 
            <select name="teacher" style="width:auto;">
            <option></option> 
            <?php
                foreach ($all_classes as $row) {
                    echo '<option value="' . $row["teacherID"] . '">' . $row["tName"] . ' ' . $row["tSurname"] . '</option>';
                    }
            ?>

            </select>
            <input type="submit" value="Search">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Annual Salary</th>
                    <th>Background Check</th>
                    <th>Class</th>
                </tr>   
            </thead>
            <tbody>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $teacher = $_POST["teacher"];
                        $query = "SELECT teacher.teacherID, teacher.tName, teacher.tSurname, teacher.tAddress, 
                        teacher.tEmail, teacher.tSalary, teacher.bgCheck, class.classGroup
                        FROM teacher INNER JOIN class ON teacher.teacherID = class.classID
                        WHERE teacher.teacherID = $teacher;";
                        
                        $result = $conn->query($query);
                        $all_details = $result->fetch_all(MYSQLI_ASSOC);
                        foreach ($all_details as $row) {
                            echo("<tr>");
                            foreach($row as $key => $el) {
                                // Convert bgCheck value to Yes/No
                                if ($key == 'bgCheck') {
                                    echo("<td>" . ($el == 1 ? "Yes" : "No") . "</td>");
                                } else {
                                    echo("<td>" . $el . "</td>");
                                }
                            }
                        }
                    }
                    $conn->close(); 
                ?>
            </tbody>
        </table>
    </body>
</html>