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

    // Fetch the existing partner data based on the ID
    $query = "SELECT * FROM partners WHERE id = $id";
    $result = mysqli_query($con, $query);
    $partner = mysqli_fetch_assoc($result);

    // If the form is submitted, update the partner info
    if (isset($_POST['update'])) {
        $alt_text = mysqli_real_escape_string($con, $_POST['alt_text']);
        
        // Check if a new file is uploaded
        if (!empty($_FILES['image']['name'])) {
            $image_name = basename($_FILES['image']['name']);
            $target_path = "partners/" . $image_name;

            // Move the uploaded file to the server directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                // Update the partner details including the new image URL
                $updateQuery = "UPDATE partners SET image_url = '$image_name', alt_text = '$alt_text' WHERE id = $id";
            } else {
                $error = "Failed to upload the image.";
            }
        } else {
            // Update only the alt text (no new image uploaded)
            $updateQuery = "UPDATE partners SET alt_text = '$alt_text' WHERE id = $id";
        }

        // Execute the update query
        if (mysqli_query($con, $updateQuery)) {
            $success = "Partner details updated successfully!";
        } else {
            $error = "Failed to update partner details.";
        }
    }
} else {
    // If no ID is passed, redirect to view partners page
    header('Location: view-partner.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "title.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Edit Partner</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include "topbar.php"; ?>
    <!-- Sidebar -->
    <?php include "sidebar.php"; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="display-4">Edit Partner</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="view-partner.php" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to Partners</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <?php if (isset($success)) { ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php } elseif (isset($error)) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="alt_text" class="form-label">Alt Text</label>
                                <input type="text" class="form-control" id="alt_text" name="alt_text" value="<?php echo $partner['alt_text']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Partner Logo</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <small class="text-muted">Leave this empty if you don't want to change the logo.</small>
                            </div>
                            <div class="mb-3">
                                <img src="partners/<?php echo $partner['image_url']; ?>" alt="<?php echo $partner['alt_text']; ?>" class="img-fluid" style="max-width: 200px;">
                            </div>
                            <button type="submit" name="update" class="btn btn-success"><i class="fa fa-save"></i> Update Partner</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
