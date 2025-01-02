<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
    include "admin/conn.php";

    //fet id
    $id = $_GET['id'];

    //fetch blogs 
    $service = mysqli_query($con,"SELECT * FROM services WHERE id=$id");
    $fetch = mysqli_fetch_array($service);


    //fetch recent post
    $recent = mysqli_query($con,"SELECT * FROM services ORDER BY id DESC");

      //fetch category

    $cat = mysqli_query($con,"SELECT * FROM category ORDER BY id DESC");
    
    
       //fetch settings
    $settings = mysqli_query($con,"SELECT * FROM settings");
    $setting  = mysqli_fetch_array($settings);

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title><?php echo $fetch['title']; ?> - <?php echo $setting['site_name']; ?></title>
<meta name="description" content="Mutual Generation International is a non-governmental organization which strives to promote 
community development through enhancing self-reliance education, self-employability skills, children 
sponsorship, climate change advocacy, technical scholarship.">
<!-- Stylesheets -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<!-- Responsive File -->
<link href="assets/css/responsive.css" rel="stylesheet">
<!-- Color File -->
<link href="assets/css/color.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">

<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=601e75803d01430011c105c8&product=image-share-buttons" async="async"></script>
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
   

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
                        <li><a href="#">Blog</a></li>
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
                <div class="col-lg-8">
                    <div class="news-block-four blog-single-post">
                        <div class="inner-box">
                            <div class="image mb-5"><img src="admin/images/services/<?php echo $fetch['img'];  ?>" alt=""></div>
                            <div class="lower-content">
                                <div class="top-content">
                                    <h3><?php echo $fetch['title'];  ?></h3>
                                </div>                                
                                <div class="text mb-5">
                                    <p><?php echo $fetch['descrip'];  ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                    <div class="blog-sidebar style-two">
                        <div class="widget widget_categories">
                            <h4 class="widget_title">Services</h4>
                            <div class="widget-content">
                                <ul class="categories-list clearfix">

                                  <?php
                                    while($row=mysqli_fetch_array($recent)){
                                ?>
                                    <li><a href="single-service.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?> <i class="flaticon-right-arrow-6"></i> <span><?php echo $counti; ?></span></a></li>
                                 <?php  } ?>
                                </ul>
                            </div>
                        </div>
                  
                        <!-- Tag-cloud Widget -->
                        <div class="widget tag-cloud-widget">
                            <h4 class="widget_title">Tags</h4>
                            <ul class="clearfix">
                                <li><a href="https://www.google.com/search">Youth</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="index.php">Mgi</a></li>
                                <li><a href="#">Self-reliance Eduaction</a></li>
                                <li><a href="#">Meza ya Duara</a></li>
                                <li><a href="#">Youth</a></li>
                                <li><a href="#">Opportunities</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Empowering</a></li>
                            </ul>
                        </div>
                        <!-- Advertisement Widget -->
                   
                    </div>
                </aside>
            </div>
        </div>
    </section>

  <!--Main Footer-->
   <?php include "footer.php"; ?>
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