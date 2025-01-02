<?php
session_start();
if (!isset($_SESSION['ad_id']) || $_SESSION['role'] != 'super_admin') {
    header('Location: login.php');
    exit();
}

include 'conn.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $user_id = intval($_GET['id']);
    $new_status = intval($_GET['status']);
    
    // Update the status in the database
    $sql = "UPDATE admin SET status = ? WHERE ad_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ii', $new_status, $user_id);
    if ($stmt->execute()) {
        header('Location: manage-users.php');
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
} else {
    echo "Invalid request.";
}
?>
