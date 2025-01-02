<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include 'conn.php';

// Check if ID and status are received via POST
if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = intval($_POST['status']);

    // Update query to set moving_text_display status
    $query = "UPDATE taarifa SET moving_text_display = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'ii', $status, $id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "Status updated successfully!";
        } else {
            echo "Failed to update status: " . mysqli_error($con);
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement: " . mysqli_error($con);
    }
} else {
    echo "Invalid request. Missing parameters.";
}

// Close database connection
mysqli_close($con);
?>
