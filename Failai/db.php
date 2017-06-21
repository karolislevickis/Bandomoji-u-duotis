<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "duomenys";

// mysqli prisijungimas
$conn = new mysqli($servername, $username, $password, $dbname);
 mysqli_set_charset($conn,'utf8');
// Tikrinam prisijungima prie DB
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>