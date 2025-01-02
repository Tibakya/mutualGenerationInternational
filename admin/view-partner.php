<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'conn.php';
include 'auth.php';

// Fetch team members from the database
$query = "SELECT * FROM team ORDER BY id DESC";
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
    <title>View Team Members</title>
    <style>
        .team-block {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .team-block:hover {
            transform: scale(1.05);
        }

        .team-img {
            width: 100%;
            height: 200px; /* Set height to control image size */
            object-fit: contain; /* Change to contain to avoid cut-off */
        }

        .card-body {
            padding: 1rem;
        }

        .designation {
            font-weight: bold;
            color: #666;
        }

        .social-icon {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex; /* Use flexbox for better alignment */
            justify-content: center; /* Center align the icons */
        }

        .social-icon li {
            margin: 0 10px; /* Space between icons */
        }

        .social-icon a {
            color: #555; /* Default color for social icons */
            transition: color 0.3s ease; /* Transition effect on hover */
        }

        .social-icon a:hover {
            color: #dc3545; /* Color change on hover */
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
                        <h1 class="display-4">Team Members</h1>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="add-team.php" class="btn btn-info"><i class="fa fa-plus"></i> Add Team Member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card team-block shadow-sm">
                                    <img src="images/team/<?php echo htmlspecialchars($row['image_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($row['alt_text']); ?>" 
                                         class="card-img-top team-img" 
                                         data-bs-toggle="modal" 
                                         data-bs-target="#imageModal<?php echo $row['id']; ?>">
                                    <div class="card-body">
                                        <h4><?php echo htmlspecialchars($row['member_name']); ?></h4>
                                        <div class="designation"><?php echo htmlspecialchars($row['designation']); ?></div>
                                        <ul class="social-icon">
                                            <li><a href="<?php echo htmlspecialchars($row['facebook_link']); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="<?php echo htmlspecialchars($row['twitter_link']); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo htmlspecialchars($row['instagram_link']); ?>"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Modal -->
                            <div class="modal fade" id="imageModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel<?php echo $row['id']; ?>">Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="images/team/<?php echo htmlspecialchars($row['image_url']); ?>" 
                                                 alt="<?php echo htmlspecialchars($row['alt_text']); ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <div class="alert alert-warning text-center">No team members found.</div>
                        </div>
                    <?php endif; ?>
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
