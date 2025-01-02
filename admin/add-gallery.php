<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

// Initialize any required variables
$today = date("Y-m-d H:i:s"); // Set today's date
$edit = isset($_GET['edit']) ? $_GET['edit'] : ''; // Get the edit ID if available

// Fetch data if editing an existing gallery item
if ($edit != '') {
    $result = mysqli_query($con, "SELECT * FROM gallery WHERE id=" . $edit);
    $row = mysqli_fetch_array($result);
}

// Initialize status message
$statusMsg = "";

// Handle form submission
if (isset($_POST['submit'])) {
    $targetDir = "images/gallery/"; // Path to gallery folder
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $fileNames = array_filter($_FILES['files']['name']); // Filter out empty filenames

    // Process multiple file uploads
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            $fileName = rand() . basename($_FILES['files']['name'][$key]); // Generate unique name
            $targetFilePath = $targetDir . $fileName;

            // Check file type validity
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to the server
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Insert file information into the database
                    $altText = mysqli_real_escape_string($con, $_POST['alt_text']);
                    $insert = mysqli_query($con, "INSERT INTO gallery (image_url, alt_text, uploaded_on) VALUES ('$fileName', '$altText', '$today')");
                    if ($insert) {
                        $statusMsg .= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Success!</strong> $fileName uploaded successfully.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                    } else {
                        $statusMsg .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Error!</strong> Failed to insert $fileName into the database.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                    }
                } else {
                    $statusMsg .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Error!</strong> Failed to upload $fileName.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                }
            } else {
                $statusMsg .= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>Warning!</strong> $fileName has an invalid file type.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                               </div>";
            }
        }
    } else {
        $statusMsg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> Please select at least one file to upload.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
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
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Add Gallery</title>
    <style>
        .custom-card {
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #17a2b8;
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #138496;
        }
        .alert {
            margin-top: 20px;
        }
        .custom-upload {
            border: 2px dashed #ddd;
            padding: 40px 20px;
            text-align: center;
            border-radius: 10px;
            position: relative;
            margin-top: 20px;
        }
        .custom-upload:hover {
            border-color: #17a2b8;
        }
        .custom-upload input[type="file"] {
            opacity: 0;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            cursor: pointer;
        }
        .custom-upload-label {
            font-size: 18px;
            font-weight: 500;
            color: #888;
        }
        .form-group {
            margin-bottom: 30px;
        }
        .card-footer {
            margin-top: 20px;
        }
        .file-list {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
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
                        <h1 class="display-4">Add Gallery</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="view-gallery.php" class="btn btn-success"><i class="fa fa-eye"></i> View Gallery</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Show status messages here -->
                    <?php if (!empty($statusMsg)) { echo $statusMsg; } ?>
                    
                    <!-- Form to upload images -->
                    <form action="add-gallery.php" method="post" enctype="multipart/form-data">
                        <div class="card custom-card">
                            <div class="card-header bg-info text-white">
                                <h3 class="card-title">Upload Gallery Images</h3>
                            </div>
                            <div class="card-body">
                                <!-- Alt text field -->
                                <div class="form-group mb-3">
                                    <label for="altText">Alt Text (for SEO & accessibility)</label>
                                    <input type="text" name="alt_text" id="altText" class="form-control" placeholder="Enter alt text for images" required>
                                </div>

                                <!-- File input field -->
                                <div class="custom-upload">
                                    <label class="custom-upload-label">Select Images (Compressed, 500px x 500px)</label>
                                    <input type="file" name="files[]" multiple required id="fileInput">
                                </div>
                                <!-- Display selected file names -->
                                <div class="file-list" id="fileList"></div>
                            </div>
                            <!-- Upload button -->
                            <div class="card-footer text-end">
                                <button type="submit" name="submit" class="btn btn-custom btn-lg"><i class="fa fa-upload"></i> Upload</button>
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
<script>
    // JavaScript to display selected file names
    document.getElementById('fileInput').addEventListener('change', function() {
        const fileList = document.getElementById('fileList');
        const files = this.files;
        fileList.innerHTML = ''; // Clear existing file names

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                fileList.innerHTML += '<div>' + files[i].name + '</div>';
            }
        }
    });
</script>
</body>
</html>
