<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

$message = "";

// If the form is submitted, insert the new team member
if (isset($_POST['submit'])) {
    $title_level = mysqli_real_escape_string($con, $_POST['title_level']);
    $member_name = mysqli_real_escape_string($con, $_POST['member_name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $facebook_link = mysqli_real_escape_string($con, $_POST['facebook_link']);
    $twitter_link = mysqli_real_escape_string($con, $_POST['twitter_link']);
    $instagram_link = mysqli_real_escape_string($con, $_POST['instagram_link']);
    $alt_text = mysqli_real_escape_string($con, $_POST['alt_text']);
    
    // Check if the image is uploaded
    if (!empty($_FILES['team_member_image']['name'])) {
        $image_name = basename($_FILES['team_member_image']['name']);
        $target_path = "images/team/" . $image_name;

        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES['team_member_image']['tmp_name'], $target_path)) {
            // Insert the team member info into the database
            $insertQuery = "INSERT INTO team (title_level, member_name, designation, image_url, alt_text, facebook_link, twitter_link, instagram_link) VALUES ('$title_level', '$member_name', '$designation', '$image_name', '$alt_text', '$facebook_link', '$twitter_link', '$instagram_link')";

            if (mysqli_query($con, $insertQuery)) {
                $message = "<div class='alert alert-success'>Team member added successfully!</div>";
            } else {
                $message = "<div class='alert alert-danger'>Failed to add team member.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>Failed to upload the image.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>Please upload an image.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <!-- Navbar -->
    <?php include 'topbar.php'; ?>
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h1>Add Team Member</h1>
                <a href="view-team.php" class="btn btn-primary"><i class="fa fa-eye"></i> View Team Members</a> <!-- View Team Members button -->
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php echo $message; ?> <!-- Display message -->
                    <form action="add-team.php" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h3 class="card-title">Upload Team Member Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title_level" class="form-label">Title Level</label>
                                    <input type="number" name="title_level" id="title_level" class="form-control" placeholder="Enter the title level" required min="0" step="1">
                                </div>
                                <div class="mb-3">
                                    <label for="team_member_image" class="form-label">Select Team Member Image (JPEG, PNG, GIF)</label>
                                    <input type="file" name="team_member_image" id="team_member_image" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="member_name" class="form-label">Member Name</label>
                                    <input type="text" name="member_name" id="member_name" class="form-control" placeholder="Enter the team member's name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter the designation" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alt_text" class="form-label">Alternative Text</label>
                                    <input type="text" name="alt_text" id="alt_text" class="form-control" placeholder="Describe the team member" required>
                                </div>
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">Facebook Link</label>
                                    <input type="url" name="facebook_link" id="facebook_link" class="form-control" placeholder="Enter Facebook profile link">
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">Twitter Link</label>
                                    <input type="url" name="twitter_link" id="twitter_link" class="form-control" placeholder="Enter Twitter profile link">
                                </div>
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">Instagram Link</label>
                                    <input type="url" name="instagram_link" id="instagram_link" class="form-control" placeholder="Enter Instagram profile link">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-upload"></i> Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
