<?php 
$host = "localhost";
$user = "mutualge_generation";
$password = "mutual@generation";
$dbname = "mutualge_mgi";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Uncomment the line below only for debugging purposes
// echo "Successfully connected to the database.";
?>
