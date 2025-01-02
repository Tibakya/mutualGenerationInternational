<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "admin/conn.php";

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $org_name = $_POST['org_name'];
    $contact = $_POST['contact'];
    $collaboration_type = $_POST['collaboration_type'];
    $collab_areas = $_POST['collab_areas'];
    $address = $_POST['address'];

    // Check for duplicate submission
    $checkStmt = $con->prepare("SELECT * FROM collaborations WHERE org_name = ? AND contact = ? AND collaboration_type = ? AND collab_areas = ? AND address = ?");
    $checkStmt->bind_param("sssss", $org_name, $contact, $collaboration_type, $collab_areas, $address);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Display notification for duplicate submission
        $message = "You have already submitted this collaboration request.";
    } else {
        // Prepare and bind for insertion
        $stmt = $con->prepare("INSERT INTO collaborations (org_name, contact, collaboration_type, collab_areas, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $org_name, $contact, $collaboration_type, $collab_areas, $address);

        // Execute the statement
        if ($stmt->execute()) {
            // Send notification email (commented out)
            // $to = "mutualgeneration@gmail.com, onesmoalexander@gmail.com";
            // $subject = "New Donation/Collaboration Submission";
            // $message = "A new collaboration request has been submitted:\n\nOrganisation: $org_name\nContact: $contact\nType: $collaboration_type\nAreas of Collaboration: $collab_areas\nAddress: $address";
            // $headers = "From: no-reply@mutualgenerationinternational.or.tz";
            // mail($to, $subject, $message, $headers);

            // Redirect to the thank you page
            header("Location: thank_you.php"); // Make sure to create a thank_you.php file.
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the check statement and connection
    $checkStmt->close();
    $con->close();
} else {
    header("Location: index.php"); // Redirect to home if accessed directly
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Collaboration Submission</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .notification-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 300px;
        }
        .notification-card h2 {
            margin-bottom: 20px;
            color: #28a745; /* Color for success message */
        }
        .notification-card p {
            margin-bottom: 20px;
            color: #555;
        }
        .btn-home {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="notification-card">
    <h2>Notification</h2>
    <p><?php echo isset($message) ? $message : "Something went wrong!"; ?></p>
    <a href="index.php" class="btn-home">Go to Home</a>
</div>

</body>
</html>
