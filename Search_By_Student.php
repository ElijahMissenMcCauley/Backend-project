<?php
    include "db_connect.php";
    $query = "SELECT studentID, first_name, surname FROM student";
    $result = $conn->query($query);
    $all_classes = $result->fetch_all(MYSQLI_ASSOC);
?>
<html>
    <head>
        <title> Search by student: </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="POST"> 
            <label for="student">Search by student:</label> 
            <select name="student" style="width:auto;">
            <option></option> 
            <?php
                foreach ($all_classes as $row) {
                    echo '<option value="' . $row["studentID"] . '">' . $row["first_name"] . ' ' . $row["surname"] . '</option>';
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
                    <th>Parent's Forename</th>
                    <th>Parent's Surname</th>
                </tr>   
            </thead>
            <tbody>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $studentID = $_POST["student"];
                        $query = "SELECT student.first_name AS student_fname, student.surname AS student_sname, 
                        parent.pName AS parent_fname, parent.pSurname AS parent_sname
                        FROM student INNER JOIN student_parent ON student.studentID = student_parent.studentID
                        INNER JOIN parent ON student_parent.parentID = parent.parentID
                        WHERE student.studentID = '$studentID'";
                        
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