<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "admin/conn.php";

// Fetch id from the URL
$id = $_GET['id'];

// Fetch taarifa details
$taarifa = mysqli_query($con, "SELECT * FROM taarifa WHERE id=$id");
$fetch = mysqli_fetch_array($taarifa);

// Fetch recent posts
$recent = mysqli_query($con, "SELECT * FROM blog LIMIT 4");

// Fetch categories
$cat = mysqli_query($con, "SELECT * FROM category ORDER BY id DESC");

// Fetch settings
$settings = mysqli_query($con, "SELECT * FROM settings");
$setting  = mysqli_fetch_array($settings);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $setting['site_name']; ?> - <?php echo $fetch['title']; ?></title>
    <meta name="description" content="Mutual Generation International is a non-governmental organization which strives to promote community development through enhancing self-reliance education, self-employability skills, children sponsorship, climate change advocacy, technical scholarship.">
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <!-- Main Header -->
    <?php include "header.php"; ?>
    <!-- End Main Header -->

    <!-- Hidden Sidebar -->
    <?php include "hidden_folder/hidden_sideBar.php" ?>
    <!-- Hidden Sidebar End -->

    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/bg-20.jpg);">
        <div class="background-text">
            <div data-parallax='{"x": 100}'>
                <div class="text-1">mgimgi</div>
                <div class="text-2">mgimgi</div>
            </div>                
        </div>
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Taarifa Muhimu</a></li>
                        <li><?php echo $fetch['title']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news-block-four-taarifa blog-single-post">
                        <div class="inner-box">
                            <div class="lower-content">
                                <div class="top-content">
                                    <div class="date mb-30"><?php echo date('d M Y', strtotime($fetch['date'])); ?></div>
                                    <h3 style="font-weight: 700;"><?php echo $fetch['title']; ?></h3>
                                    <p>Posted Time: <?php echo $fetch['time']; ?></p>
                                </div>                            
                                <div class="text mt-5">
                                <p><?php echo $fetch['title_details']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Footer -->
    <?php include "footer.php"; ?>
    <!-- End Main Footer -->

    <!-- Scroll to top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span></div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/lazyload.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
    <script src="assets/js/jquery.polyglot.language.switcher.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
