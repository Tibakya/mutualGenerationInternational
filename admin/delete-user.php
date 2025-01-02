<?php
session_start();
if (!isset($_SESSION['ad_id']) || $_SESSION['role'] != 'super_admin') {
    header('Location: login.php');
    exit();
}

include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM admin WHERE ad_id = ?";
    $stmt = $con->prepare($delete_sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('Location: manage-users.php');
        exit();
    } else {
        echo "Error deleting user.";
    }
} else {
    header('Location: manage-users.php');
}
?>
