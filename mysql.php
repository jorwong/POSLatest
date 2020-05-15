<?php
$servername = "127.0.0.1";
$username = "root";
$password = "dummy";
$Db = "POS";

// Create connection
$conn = new mysqli($servername, $username, $password,$Db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>