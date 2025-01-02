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
    // Collect form inputs
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $reason = $_POST['reason'];

    // Handle profile picture
    $fileName = '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $targetDir = "admin/profilePics/"; // Ensure this folder exists
        $fileName = time() . "_" . basename($_FILES["profile_pic"]["name"]); // Add timestamp to make the filename unique
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Validate file type and size
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $allowedTypes)) {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }
        if ($_FILES["profile_pic"]["size"] > 2 * 1024 * 1024) { // 2MB limit
            die("File size exceeds 2MB.");
        }

        // Move file to target directory
        if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFilePath)) {
            die("Failed to upload profile picture.");
        }
    } else {
        die("Profile picture is required.");
    }

    // Check for duplicate submission
    $checkStmt = $con->prepare("SELECT * FROM members WHERE name = ? AND phone = ? AND gender = ? AND status = ? AND country = ? AND region = ? AND city = ? AND reason = ?");
    $checkStmt->bind_param("ssssssss", $name, $phone, $gender, $status, $country, $region, $city, $reason);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Display notification for duplicate submission
        $message = "You have already submitted this membership request.";
    } else {
        // Prepare and bind for insertion
        $stmt = $con->prepare("INSERT INTO members (name, gender, status, phone, country, region, city, reason, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $gender, $status, $phone, $country, $region, $city, $reason, $fileName);

        // Execute the statement
        if ($stmt->execute()) {
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
    <title>Membership Submission</title>
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
