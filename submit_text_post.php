<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "admin/conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $postContent = mysqli_real_escape_string($con, $_POST['postContent']);
    
    // Validate phone number exists in members table
    $memberQuery = "SELECT id FROM members WHERE phone = '$phone'";
    $memberResult = mysqli_query($con, $memberQuery);
    
    if (mysqli_num_rows($memberResult) == 0) {
        echo '<div class="alert alert-danger" role="alert">
                Phone number not found. Please use the Registered Phone Number or <a href="become-member.php" class="alert-link">register here</a> to become an MGI member first.
              </div>';
        exit;
    }
    
    $member = mysqli_fetch_assoc($memberResult);
    $memberId = $member['id'];
    
    // Validate text content length
    if (strlen($postContent) > 1000) {
        echo '<div class="alert alert-danger" role="alert">Your story is too long. Maximum allowed is 1000 characters.</div>';
        exit;
    }
    
    // Insert into shared_experiences table
    $insertQuery = "INSERT INTO shared_experiences (member_id, post_content, post_type) VALUES ('$memberId', '$postContent', 'text')";
    if (mysqli_query($con, $insertQuery)) {
        // Redirect to the shared_experiences.php page with a success message
        header("Location: shared_experiences.php?status=success");
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">Error submitting your post. Please try again later.</div>';
    }
}
?>
