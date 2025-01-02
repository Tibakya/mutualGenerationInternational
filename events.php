<?php

    include "admin/conn.php";
   
    // if (!$con) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // Fetch posters (only img, title, short, desrip, url, and date columns)
    $posters = mysqli_query($con, "SELECT img, location, title, short, '' AS url, DATE_FORMAT(date, '%d %b') as formatted_date FROM posters ORDER BY id DESC");
    
    // Fetch settings
    $settings = mysqli_query($con, "SELECT * FROM settings");
    $setting = mysqli_fetch_array($settings);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Events - <?php echo htmlspecialchars($setting['site_name']); ?></title>
    <meta name="description" content="MGI is a nonprofit, non-governmental organization, autonomous, non-religious, non-partisan, non-political organization and social organization.
.">

    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

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
        <!-- End Main Header -->
        <?php include "header.php"; ?>
        <!-- Hidden Sidebar -->
        <?php include "hidden_folder/hidden_sideBar.php" ?>
        <!-- Hidden Sidebar End -->

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/bg-20.jpg);">
            <div class="background-text">
                <div data-parallax='{"x": 100}'>
                    <div class="text-1">mutual</div>
                    <div class="text-2">mutual</div>
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content-wrapper">
                        <div class="title">
                            <h1>Events</h1>
                        </div>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.php">Home</a></li>
                            <li>Events in Posters </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section class="news-section" id="blog">
            <div class="auto-container">
                <h1 style="color: deepskyblue ;">Recent Posts</h1>
                <div class="icon-box">
                    <ul class="social-icon"
                        style="font-size:40px; display: flex;  gap: 30px; list-style: none; padding: 20px;">
                        <!-- justify-content: right; align-items: right; -->
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                        <li><a href="https://www.instagram.com/mutualgenerationintl2023?igsh=enN6emZ0ZjhzdjV1"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="row">
                    <?php while ($poster = mysqli_fetch_array($posters)) { ?>
                    <div class="news-block-one col-lg-4">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <div class="image">

                                <img src="admin/images/posters/<?php echo htmlspecialchars($poster['img']); ?>"
                                    alt="<?php echo htmlspecialchars($poster['title']); ?>">

                                <div class="date"><?php echo htmlspecialchars($poster['formatted_date']); ?></div>
                            </div>
                            <div class="lower-content">
                                <div class="category"><i class="fas fa-folder"></i>
                                    <?php echo htmlspecialchars($poster['title']); ?> -
                                    <?php echo htmlspecialchars($poster['location']); ?></div>
                                <h4>
                                    <?php echo htmlspecialchars($poster['url']); ?><?php echo htmlspecialchars($poster['short']); ?>
                                </h4>
                                <!-- <p><?php echo htmlspecialchars($poster['desrip']); ?></p> -->
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>

<div class=" row " >
<div class=" col-md-6 bottom-content">
                    <div class="link-box">
                        <a href="blog" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i>More
                                Details </span>
                        </a>
                    </div>
                </div>
                <div class=" col-md-6">
                    <h1 style="color: deepskyblue ;">Follow us</h1>
                    <div class="icon-box">
                        <ul class="social-icon"
                            style="font-size:40px; display: flex;  gap: 30px; list-style: none; padding: 20px;">
                            <!-- justify-content: right; align-items: right; -->
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                            <li><a href="https://www.instagram.com/mutualgenerationintl2023?igsh=enN6emZ0ZjhzdjV1"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
</div>


        </section>
        <!-- Main Footer -->
        <?php include "footer.php"; ?>
        <!-- End page wrapper -->

        <!-- Scroll to top -->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span>
        </div>
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

    </div>
</body>

</html>