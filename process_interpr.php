<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include "admin/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $region = htmlspecialchars(trim($_POST['region']));
    $district = htmlspecialchars(trim($_POST['district']));
    $ward = htmlspecialchars(trim($_POST['ward']));

    // Validate the form data
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($region) || empty($district) || empty($ward)) {
        echo '<script type="text/javascript">alert("All fields are required."); window.location.href = "process_interpr.php";</script>';
        exit;
    }

    // Check if the email already exists in the database
    $check_sql = "SELECT email FROM entrepreneurship_club_members WHERE email = ?";
    $check_stmt = mysqli_prepare($con, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    // If the email already exists, display an error message
    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        echo '<script type="text/javascript">
                alert("The email address is already in use. Please choose another one.");
                window.location.href = "process_interpr.php"; 
              </script>';
        mysqli_stmt_close($check_stmt);
    } else {
        // Prepare the SQL query to insert the new record
        $sql = "INSERT INTO entrepreneurship_club_members (first_name, last_name, email, phone, region, district, ward) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $first_name, $last_name, $email, $phone, $region, $district, $ward);

            if (mysqli_stmt_execute($stmt)) {
                // Display success message with alert and store form submission flag
                echo '<script type="text/javascript">
                        alert("Your details have been submitted successfully!");
                        localStorage.setItem("formSubmitted", "true");  // Set flag for successful submission
                        window.location.href = "thank_you.php"; 
                      </script>';
            } else {
                // Display error message with alert
                echo '<script type="text/javascript">
                        alert("There was an error submitting your details. Please try again.");
                        window.location.href = "process_interpr.php"; 
                      </script>';
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Error preparing the statement
            echo '<script type="text/javascript">
                    alert("Error preparing the statement: ' . mysqli_error($con) . '");
                    window.location.href = "process_interpr.php"; 
                  </script>';
        }
    }

    // Close the check statement
    mysqli_stmt_close($check_stmt);

} else {
    echo '<script type="text/javascript">
            alert("Invalid request method.");
            window.location.href = "process_interpr.php"; 
          </script>';
}
?>