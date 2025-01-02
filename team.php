<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "admin/conn.php";

// Fetch team members from the database
$team_query = mysqli_query($con, "SELECT * FROM team ORDER BY CAST(title_level AS UNSIGNED) ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Leadership Team</title>
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<div class="page-wrapper">
      <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>
    <!-- Main Header -->
    <?php include "header.php"; ?>
    <!-- End Main Header -->

    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/22.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Management Team</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li class="active"><a href="team.php">Management Team<i class="flaticon-up-arrow"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section style-three">
        <div class="auto-container">
            <div class="row">
                <?php while ($team = mysqli_fetch_array($team_query)) { ?>
                    <div class="col-lg-4 col-md-6 team-blcok">
                        <div class="inner-box wow fadeInDown" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="admin/images/team/<?php echo $team['image_url']; ?>" alt="<?php echo $team['alt_text']; ?>" class="img-fluid">
                            </div>
                            <div class="content">
                                <div class="designation"><?php echo $team['alt_text']; ?></div>
                                <h4><?php echo $team['member_name']; ?></h4>
                                <div class="hover-content">
                                <ul class="social-icon">
                                    <li><a href="<?php echo $team['facebook_link']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=<?php echo $team['twitter_link']; ?>><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $team['instagram_link']; ?>"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                    <div class="designation"><?php echo $team['designation']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Main Footer -->
    <?php include "footer.php"; ?>
</div>

<!--End pagewrapper-->

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

<!-- Mirrored from st.ourhtmldemo.com/new/Transida2/team.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jan 2021 08:06:49 GMT -->
</html>
