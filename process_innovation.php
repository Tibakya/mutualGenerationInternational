<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "admin/conn.php";

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $region = mysqli_real_escape_string($con, $_POST['region']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $project_description = mysqli_real_escape_string($con, $_POST['comment']);
    $exhibition_date = mysqli_real_escape_string($con, $_POST['date']);

    // Validate required fields
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($region) && !empty($district) && !empty($project_description) && !empty($exhibition_date)) {
        // Validate email format
        if (!validateEmail($email)) {
            echo "<div class='alert alert-warning'>Please provide a valid email address.</div>";
        } else {
            // Prepare the SQL query
            $sql = "INSERT INTO innovations (first_name, last_name, email, phone, region, district, project_description, exhibition_date) 
                    VALUES ('$first_name', '$last_name', '$email', '$phone', '$region', '$district', '$project_description', '$exhibition_date')";

            // Execute the query
            if (mysqli_query($con, $sql)) {
                // Success message and redirect after a short delay
                echo "<script>
                        alert('Registration successful!');
                        window.location.href = 'thank_you.php';
                      </script>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill in all the fields.</div>";
    }
}
?>

<script>
    // Reset form fields after successful submission
document.getElementById("contact_form").reset();

</script>