<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

// Check if the 'id' parameter is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer to prevent SQL injection

    // Fetch the image details from the database before deleting
    $query = "SELECT * FROM gallery WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageFilePath = "images/gallery/" . $row['image_url']; // Correct image path

        // Delete the image file from the server
        if (file_exists($imageFilePath)) {
            unlink($imageFilePath); // Delete the file
        }

        // Delete the image record from the database
        $deleteQuery = "DELETE FROM gallery WHERE id = ?";
        $deleteStmt = $con->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);
        if ($deleteStmt->execute()) {
            // Success message
            header("Location: view-gallery.php?message=Image deleted successfully");
            exit;
        } else {
            // Error message
            echo "Error deleting record: " . $con->error;
        }
    } else {
        echo "No image found with that ID.";
    }
} else {
    echo "Invalid request.";
}

$stmt->close();
$con->close();
?>
