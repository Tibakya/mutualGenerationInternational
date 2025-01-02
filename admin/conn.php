<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mgi_backup";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Uncomment the line below only for debugging purposes
// echo "Successfully connected to the database.";
?>
