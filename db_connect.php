<?php
$servername = "localhost";  // Change if using a remote server
$username = "root";
$password = "";
$database = "class";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo("Connected successfully!");
}
?>
