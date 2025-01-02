<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

// Check if the ID is passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing team member data based on the ID
    $query = "SELECT * FROM team WHERE id = $id";
    $result = mysqli_query($con, $query);
    $team_member = mysqli_fetch_assoc($result);

    // If the form is submitted, update the team member info
    if (isset($_POST['update'])) {
        $title_level = mysqli_real_escape_string($con, $_POST['title_level']);
        $member_name = mysqli_real_escape_string($con, $_POST['member_name']);
        $designation = mysqli_real_escape_string($con, $_POST['designation']);
        $facebook_link = mysqli_real_escape_string($con, $_POST['facebook_link']);
        $twitter_link = mysqli_real_escape_string($con, $_POST['twitter_link']);
        $instagram_link = mysqli_real_escape_string($con, $_POST['instagram_link']);
        $alt_text = mysqli_real_escape_string($con, $_POST['alt_text']);

        // Check if a new file is uploaded
        if (!empty($_FILES['image']['name'])) {
            $image_name = basename($_FILES['image']['name']);
            $target_path = "images/team/" . $image_name;

            // Move the uploaded file to the server directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                // Update the team member details including the new image URL
                $updateQuery = "UPDATE team SET title_level = '$title_level', image_url = '$image_name', alt_text = '$alt_text', member_name = '$member_name', designation = '$designation', facebook_link = '$facebook_link', twitter_link = '$twitter_link', instagram_link = '$instagram_link' WHERE id = $id";
            } else {
                $error = "Failed to upload the image.";
            }
        } else {
            // Update only the details (no new image uploaded)
            $updateQuery = "UPDATE team SET title_level = '$title_level', alt_text = '$alt_text', member_name = '$member_name', designation = '$designation', facebook_link = '$facebook_link', twitter_link = '$twitter_link', instagram_link = '$instagram_link' WHERE id = $id";
        }

        // Execute the update query
        if (mysqli_query($con, $updateQuery)) {
            $success = "Team member details updated successfully!";
        } else {
            $error = "Failed to update team member details.";
        }
    }
} else {
    // If no ID is passed, redirect to view team page
    header('Location: view-team.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team Member</title>
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
            <div class="container-fluid">
                <h1>Edit Team Member</h1>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php if (isset($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
                    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Edit Team Member Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title_level" class="form-label">Title Level</label>
                                    <input type="number" class="form-control" id="title_level" name="title_level" value="<?php echo htmlspecialchars($team_member['title_level']); ?>" required min="0" step="1">
                                </div>
                                <div class="mb-3">
                                    <label for="member_name" class="form-label">Member Name</label>
                                    <input type="text" class="form-control" id="member_name" name="member_name" value="<?php echo htmlspecialchars($team_member['member_name']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo htmlspecialchars($team_member['designation']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alt_text" class="form-label">Alt Text</label>
                                    <input type="text" class="form-control" id="alt_text" name="alt_text" value="<?php echo htmlspecialchars($team_member['alt_text']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">Facebook Link</label>
                                    <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo htmlspecialchars($team_member['facebook_link']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">Twitter Link</label>
                                    <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="<?php echo htmlspecialchars($team_member['twitter_link']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">Instagram Link</label>
                                    <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="<?php echo htmlspecialchars($team_member['instagram_link']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Team Member Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <small class="text-muted">Leave this empty if you don't want to change the image.</small>
                                </div>
                                <div class="mb-3">
                                    <img src="images/team/<?php echo htmlspecialchars($team_member['image_url']); ?>" alt="<?php echo htmlspecialchars($team_member['alt_text']); ?>" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" name="update" class="btn btn-success"><i class="fa fa-save"></i> Update Team Member</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
