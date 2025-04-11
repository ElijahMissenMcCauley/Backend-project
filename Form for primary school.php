<!DOCTYPE html>
<html>
    <head>
        <title>
            Form for primary school parents
        </title>
    </head>

    <head>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
        <section>
        <?php
        include("db_connect.php");
        ?>
            <h1>Form for Primary School parents</h1>
        </section>

        <section>
            <fieldset>
                <form class = "styled-form" action = "Add_Student_And_Parent.php" method="post">
                    <p>If you are a Parent/Carer with children attending this primary school, please fill out this form</p>
                    <section>
                        <p>Child information:</p>
                        <fieldset>
                            <label for = "firstname"> Child's first name: </label>
                            <input type = "text" name = "fname" id = "firstname" required>
                            <br>
                            <label for = "surname"> Child's surname: </label>
                            <input type = "text" name = "surname" id = "surname" required>
                            <br>
                            <label for noParents>No. of Parents/Carers</label>
                            <input type = "number" name = "noParents" id = "noParents" max = "2" min = "1" required>
                            <br>
                            <label for = "Address"> Child's address: </label>
                            <input type = "text" name = "Address" id = "Address" required>
                            <br><br>
                            <textarea id = "MedInfo" name = "MedInfo" rows = "5" cols = 75>Please add any extra medical information here...</textarea>
                        </fieldset>
                    </section>
                    <br>
                    <p>Child's DoB and year group:</p>
                    <section>
                        <fieldset>
                            <label for = "age"> Age: </label>
                            <input type = "number" name = "age" id = "age" max = "11" min = "1" required>
                            <label for = "birthday"> Birthday: </label>
                            <input type = "date" id = "birthday" name = "birthday" required>
                            <br>
                            <label for = "Year"> Year Group:</label>
                            <select name = "Year" id = "Year" required>
                                <option></option>
                                <?php
                                    $query = "SELECT * FROM `class`";
                                    $result = mysqli_query($conn, $query);
                                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                    foreach($rows as $row){
                                        echo('<option value=' . $row['classID'] . '>');
                                        echo($row['classGroup']);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
                        </fieldset>
                    </section>
                    <p>Parent information:</p>
                    <section>
                        <fieldset>
                            <label for = "pName">Parent's first name</label>
                            <input type = "text" name = "pName" id = "pName" required>
                            <br>
                            <label for = "pSurname">Parent's surname</label>
                            <input type = "text" name = "pSurname" id = "pSurname" required>
                            <br>
                            <label for = "pAddress"> Parent's address: </label>
                            <input type = "text" name = "pAddress" id = "pAddress" required>
                            <label for = "email">Email Address: </label>
                            <input type = "email" name = "email" id = "email" required>
                            <br>
                            <label for = "phone">Mobile Number: +44</label>
                            <input type = "text" name = "phone" id = "phone" required>
                            <label for = "numChildren">Number of Children:</label>
                            <input type = "number" name = "numChildren" id = "numChildren" min = "1" required>
                        </fieldset>
                    </section>
                    <input type = "submit">
                </form>
            </fieldset>
        </section>

        <section>
            <h1>Form for School</h1>
        </section>

        <section>
            <fieldset>
                <form class = "styled-form">
                    <p>Form for the school to fill out for each class</p>
                    <section>
                        <p>Class information:</p>
                        <fieldset>
                        <label for = "class"> Class:</label>
                            <select name = "class" id = "class" required>
                                <option></option>
                                <?php
                                    $query = "SELECT * FROM `class`";
                                    $result = mysqli_query($conn, $query);
                                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                    foreach($rows as $row){
                                        echo('<option value=' . $row['classID'] . '>');
                                        echo($row['classGroup']);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
                            <br>
                            <label for = "capacity">Class capacity</label>
                            <input type = "number" name = "capacity" id = "capacity" max = "30" min = "1" required>
                            <br>
                            <label for = "classTeacher">Class Teacher:</label>
                            <select name = "classTeacher" id = "classTeacher" required>
                                <option></option>
                                <?php
                                    $query = "SELECT * FROM `teacher`";
                                    $result = mysqli_query($conn, $query);
                                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                    foreach($rows as $row){
                                        echo('<option value=' . $row['teacherID'] . '>');
                                        echo($row['tName']." ".$row['tSurname']);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
                        </fieldset>
                    </section>
                    <input type = "submit">
                </form>
            </fieldset>
        </section>

        <section>
            <h1>Form for teacher</h1>
        </section>

        <section>
            <fieldset>
                <form class = "styled-form" action = "Add_Teacher.php" method = "post">
                    <p>Form for teacher to fill in</p>
                    <section>
                        <p>Teacher information</p>
                        <fieldset>
                            <label for = "tName">First name:</label>
                            <input type = "text" name = "tName" id = "tName" required>
                            <br>
                            <label for = "tSurname">Surname</label>
                            <input type = "text" name = "tSurname" id = "tSurname" required>
                            <br>
                            <label for = "tAddress">Address:</label>
                            <input type = "text" name = "tAddress" id = "tAddress" required>
                            <br>
                            <label for = "tEmail">Email Address</label>
                            <input type = "email" name = "tEmail" id = "tEmail" required>
                            <br>
                            <label for = "annualSalary">Annual Salary</label>
                            <input type = "text" name = "annualSalary" id = "annualSalary" required>
                            <br>
                            <label for = "bgCheck">Background Check</label>
                            <input type = "radio" name = "bgCheck" id = "bgCheck">
                        </fieldset>
                    </section>
                    <input type = "submit">
                </form>
            </fieldset>
        </section>
    </body>
</html>