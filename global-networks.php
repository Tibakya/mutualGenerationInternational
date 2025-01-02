<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "admin/conn.php";

// Fetch services
$services = mysqli_query($con, "SELECT * FROM services ORDER BY id DESC");

// Fetch settings
$settings = mysqli_query($con, "SELECT * FROM settings");
$setting = mysqli_fetch_array($settings);

// Fetch posters (only img, title, and short columns)
$posters = mysqli_query($con, "SELECT img, title, short FROM posters ORDER BY id DESC");

// Fetch partners logos
$partners = mysqli_query($con, "SELECT image_url, alt_text FROM partners ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Partners</title>
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Responsive File -->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- Color File -->
    <link href="assets/css/color.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

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
        <section class="page-title" style="background-image: url(assets/images/background/bg-19.jpg);">
            <div class="background-text">
                <div data-parallax='{"x": 100}'>
                    <div class="text-1">mgimgi</div>
                    <div class="text-2">mgimgi</div>
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content-wrapper">
                        <div class="title">
                            <h1>Partners</h1>
                        </div>
                        <ul class="bread-crumb style-two">
                            <li class="active"><a href="global-networks.php">Partners <i
                                    class="flaticon-up-arrow"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Accredited Partners Section -->
        <section id="accredited-partners-section" class="accredited-partners">
            <div class="container">
                <div class="section-title mb-30 mt-50">
                    <h2>Our Accredited Partners</h2>
                </div>
                <div class="row">
                    <div class="theme_carousel owl-theme owl-carousel"
                        data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                        
                        <?php while ($partner = mysqli_fetch_assoc($partners)) : ?>
                            <!-- Accredited Partner -->
                            <div class="col-lg-12 partner-block">
                                <div class="content-box">
                                    <div class="image">
                                        <img src="admin/partners/<?php echo $partner['image_url']; ?>" alt="<?php echo $partner['alt_text']; ?>" class="partner-img">
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        
                    </div> <!-- Carousel -->
                </div> <!-- Row -->
            </div> <!-- Container -->
        </section> <!-- End of Section -->

        <!-- Main Footer -->
        <?php include "footer.php"; ?>
        <!-- End page wrapper -->

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
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
