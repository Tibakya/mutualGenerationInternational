<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "admin/conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $videoFile = $_FILES['videoFile'];
    
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
    
    // Validate video file
    $allowedTypes = ['video/mp4', 'video/avi', 'video/mkv'];
    $maxSize = 50 * 1024 * 1024; // 50MB
    
    if (!in_array($videoFile['type'], $allowedTypes)) {
        echo '<div class="alert alert-danger" role="alert">Invalid video format. Only MP4, AVI, and MKV are allowed.</div>';
        exit;
    }
    
    if ($videoFile['size'] > $maxSize) {
        echo '<div class="alert alert-danger" role="alert">Video file size exceeds the maximum limit of 50MB.</div>';
        exit;
    }
    
    // Save video
    $uploadDir = 'admin/videoClips/';
    $videoName = time() . "_" . basename($videoFile['name']);
    $targetFile = $uploadDir . $videoName;
    
    if (move_uploaded_file($videoFile['tmp_name'], $targetFile)) {
        // Insert into shared_experiences table
        $insertQuery = "INSERT INTO shared_experiences (member_id, video_url, post_type) VALUES ('$memberId', '$targetFile', 'video')";
        if (mysqli_query($con, $insertQuery)) {
            // Redirect to the shared_experiences.php page with a success message
            header("Location: shared_experiences.php?status=success");
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Error saving your video. Please try again later.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error uploading the video. Please try again.</div>';
    }
}
?>
