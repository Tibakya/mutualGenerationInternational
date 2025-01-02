<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

// Fetch gallery images from the database

$query = "SELECT * FROM gallery ORDER BY uploaded_on DESC";
$result = mysqli_query($con, $query);

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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>View Gallery</title>
    <style>
        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
        }

        .btn-custom {
            background-color: #dc3545;
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #c82333;
        }

        .fade-out {
            transition: opacity 1s ease-out;
            opacity: 0;
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
                        <h1 class="display-4">Gallery</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="add-gallery.php" class="btn btn-info"><i class="fa fa-plus"></i> Add New Image</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-success text-center" id="success-message">
                        <?php echo htmlspecialchars($_GET['message']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="row">
                    <?php
                    // Check if there are any images
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the images and display them
                        while ($row = mysqli_fetch_assoc($result)) {
                            $imageURL = "images/gallery/" . $row['image_url']; // Correct image path
                            $uploadDate = date('d M Y', strtotime($row['uploaded_on']));
                            $id = $row['id'];
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card gallery-item shadow-sm">
                                    <img src="<?php echo $imageURL; ?>" alt="Gallery Image"
                                         class="card-img-top gallery-img" data-bs-toggle="modal"
                                         data-bs-target="#imageModal<?php echo $id; ?>">
                                    <div class="card-body">
                                        <p class="card-text text-muted">Uploaded on: <?php echo $uploadDate; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-custom btn-sm" 
                                           onclick="confirmDelete(<?php echo $id; ?>)"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Modal -->
                            <div class="modal fade" id="imageModal<?php echo $id; ?>" tabindex="-1"
                                 aria-labelledby="imageModalLabel<?php echo $id; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel<?php echo $id; ?>">Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="<?php echo $imageURL; ?>" alt="Gallery Image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    } else { ?>
                        <div class="col-md-12">
                            <div class="alert alert-warning text-center">No images found in the gallery.</div>
                        </div>
                    <?php } ?>
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
<script>
    function confirmDelete(id) {
        if (confirm("Do you want to delete?")) {
            window.location.href = "delete-gallery.php?id=" + id;
        }
    }

    // Hide the success message after 5 seconds
    setTimeout(function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.classList.add('fade-out');
            setTimeout(() => successMessage.remove(), 1000); // Remove after fade out
        }
    }, 5000);
</script>
</body>
</html>
