<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the image URL from the database
    $query = "SELECT image_url FROM partners WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $imagePath = 'images/partners/' . $row['image_url'];

    // Delete the image file
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the record from the database
    $deleteQuery = "DELETE FROM partners WHERE id = $id";
    if (mysqli_query($con, $deleteQuery)) {
        header("Location: view-partners.php?message=Partner logo deleted successfully");
        exit;
    } else {
        echo "Error: Could not delete partner logo.";
    }
} else {
    echo "Error: Invalid partner ID.";
}
?>
