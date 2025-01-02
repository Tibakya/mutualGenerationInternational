<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['ad_id'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include 'conn.php'; 

// Fetch data from members and collaborations tables, ordered by submission_date (most recent first)
$members_sql = "SELECT * FROM members ORDER BY submission_date DESC LIMIT 10";
$members_result = $con->query($members_sql);

$collab_sql = "SELECT * FROM collaborations ORDER BY submitted_at DESC LIMIT 10";
$collab_result = $con->query($collab_sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "title.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include "topbar.php"; ?>
        <?php include "sidebar_admin.php"; ?>

        <div class="content-wrapper">
            
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <a href="add-blog.php" class="small-box-footer">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>Add Blog</h3>
                                        <p>Add</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="view-blog.php" class="small-box-footer">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>Blogs</h3>
                                        <p>130</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                       
                        <div></div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">

                    <!-- Members Table Card -->

                </div>
            </section>
        </div>

        <?php include "footer.php"; ?>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
</body>

</html>
