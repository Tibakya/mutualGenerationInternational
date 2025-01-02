<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

$message = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define the directory where the logos will be stored
    $uploadDir = 'partners/';
    $fileName = basename($_FILES['partner_logo']['name']);
    $targetFilePath = $uploadDir . $fileName;

    // Get the alt text from the form
    $altText = $_POST['alt_text'];

    // Full path for saving the new logo on the server
    $fullFilePath = 'C:/xampp82/htdocs/MGI-PHP/admin/' . $targetFilePath;

    // Check if the file was uploaded successfully
    if (move_uploaded_file($_FILES['partner_logo']['tmp_name'], $fullFilePath)) {
        // Insert into the database, including alt text
        $query = "INSERT INTO partners (image_url, alt_text, uploaded_on) VALUES ('$fileName', '$altText', NOW())";
        if (mysqli_query($con, $query)) {
            $message = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            Partner logo uploaded successfully!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
        } else {
            $message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Error: Could not save to the database.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
        }
    } else {
        $message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Error: Could not upload the logo file.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "title.php"; ?>
    <!-- Include Bootstrap 5 and Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <title>Add Partner Logo</title>
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
                        <h1 class="display-4">Add Partner Logo</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="view-partner.php" class="btn btn-info"><i class="fa fa-eye"></i> View Partner Logos</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php echo $message; ?>
                    <!-- Form to upload a new partner logo -->
                    <form action="add-partner.php" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h3 class="card-title">Upload Partner Logo</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="partner_logo" class="form-label">Select Partner Logo (JPEG, PNG, GIF)</label>
                                    <input type="file" name="partner_logo" id="partner_logo" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alt_text" class="form-label">Alternative Text</label>
                                    <input type="text" name="alt_text" id="alt_text" class="form-control" placeholder="Describe the logo" required>
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

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
