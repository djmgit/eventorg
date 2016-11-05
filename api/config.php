<?php
/*$conn = mysql_connect("localhost", "root", "deep123");
mysql_select_db('tuts_rest', $conn);*/
$servername = "localhost";
$username = "root";
$password = "deep123";
$dbname = "MasterClub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>