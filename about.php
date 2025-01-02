<?php
    include "admin/conn.php";

    //fetch settings
    $settings = mysqli_query($con,"SELECT * FROM settings");
    $setting  = mysqli_fetch_array($settings);
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BH1P71JTGV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BH1P71JTGV');
</script>
    <meta charset="utf-8">
    <title>About Us - <?php echo $setting['site_name']; ?></title>
    <meta name="description"
        content="We Offer Import & Export assistance foreign businesses in transporting and selling their products in China, India and USA. We connect domestic companies to the international shipping services most suited for their business.">

    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Responsive File -->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- Color File -->
    <link href="assets/css/color.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <!-- <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=601e75803d01430011c105c8&product=image-share-buttons'
        async='async'></script> -->

</head>

<body>

    <div class="page-wrapper">
       <!-- Preloader -->
        <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div> -->



        <!-- End Main Header -->
        <?php include "header.php"; ?>
     <!-- Hidden Sidebar -->
     <?php include "hidden_folder/hidden_sideBar.php" ?>
        <!-- Hidden Sidebar End -->

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/bg22.jpg);">
            <div class="background-text">
                <div data-parallax='{"x": 100}'>
                    <div class="text-1">Mgi Mgi</div>
                    <div class="text-2">Mgi Mgi</div>
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content-wrapper">
                        <div class="title">
                            <h1>About MGI</h1>
                        </div>

                        <ul class="bread-crumb clearfix">
                            <li><a href="index.php">Home</a></li>
                            <li>About Us</li>
                        </ul>
                        <ul class="bread-crumb style-two">
                            <li class="active"><a href="about.php">About Company <i class="flaticon-up-arrow"></i></a>
                            </li>
                            
                            <li><a href="team.php">Leadership Team<i class="flaticon-up-arrow"></i></a></li>
                            <li><a href="global-networks.php">Global Network <i class="flaticon-up-arrow"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Who we are -->
        <section class="who-we-are-section">
            <div class="overview">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <div class="sub-title">About MGI</div>
                        <h2>INTRODUCTION</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text">

                                    <p>Mutual Generation International is a non-governmental organization which strives
                                        to promote
                                        community development through enhancing self-reliance education,
                                        self-employability skills, children
                                        sponsorship, climate change advocacy, technical scholarship, talents and career
                                        development, extending
                                        the social services provisions, policies awareness and diplomatic opportunities
                                        analysis.</p>

                                    <p>
                                        MGI was established in 02/03/2023 with the registration number 00NGO/R/4456 as a
                                        result of mutual
                                        agreement and commitment of the passionate members highly ready to join the
                                        efforts of the Government
                                        and other Development stakeholders in reaching sustainable development goals.
                                    </p>

                                    <p>
                                        MGI is a nonprofit, non-governmental organization, autonomous,
                                        non-religious, non-partisan, non political organization and social organization.
                                    </p>

                                </div>
                                <div class="author-info wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="video-btn">
                                        <a href="404.html"
                                            class="overlay-link lightbox-image video-fancybox"><i
                                                class="flaticon-play-arrow"></i></a>
                                    </div>
                                    <div class="signature"><img src="assets/images/sign.PNG" alt=""></div>
                                    <div>
                                        <div class="author-title">Elia Mwigah </div>
                                        <div class="designation">CEO & Founder of Mutual Generation International</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"
                                style="background-image: url(assets/images/resource/eliah_mwiga.jpg);">
                                <div class="row m-10">
                                    <!--Column-->
                                    <!-- <div class="column counter-column col-md-3">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="3000" data-stop="2023">0</span><span> Year</span>
                                            </div><br>
                                            <h4>launching<br> q</h4>
                                            <h5>Total</h5>
                                        </div>
                                    </div>
                                </div> -->
                                    <!--Column-->
                                    <!-- <div class="column counter-column col-md-3">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="3000" data-stop="3.4">0</span><span>k</span>
                                            </div>
                                            <h5>Air</h5>
                                            <div class="icon"><span class="flaticon-airplane"></span></div>
                                        </div>
                                    </div>
                                </div> -->
                                    <!--Column-->
                                    <!-- <div class="column counter-column col-md-3">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="icon"><span class="flaticon-cargo-ship-1"></span></div>
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="3000" data-stop="1.7">0</span><span>k</span>
                                            </div>
                                            <h5>Ocean</h5>
                                        </div>
                                    </div>
                                </div> -->
                                    <!--Column-->
                                    <!-- <div class="column counter-column col-md-3">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="3000" data-stop="1.4">0</span><span>k</span>
                                            </div>
                                            <h5>Road</h5>
                                            <div class="icon"><span class="flaticon-box-1"></span></div>
                                        </div>
                                    </div>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Whychooseus section four -->
        <!-- <section class="whychooseus-section-four" style="background-image: url(assets/images/background/bg-23.jpg);">
        <div class="auto-container">
            <div class="sec-title light text-center">
                <div class="sub-title">Why Choose Us</div>
                <h2> Reasons Why to Choose Our <br> Freight Services</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 whychooseus-block-four">
                    <div class="inner-box wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        <div class="icon"><span class="flaticon-shield"></span><i class="fas fa-check"></i><a href="#"><i class="fas fa-check"></i>Read More</a></div>
                        <h4>Trasparent Pricing</h4>
                     
                        <div class="count">01</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 whychooseus-block-four">
                    <div class="inner-box wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        <div class="icon"><span class="flaticon-delivery"></span><i class="fas fa-check"></i><a href="#"><i class="fas fa-check"></i>Read More</a></div>
                        <h4>On - Time Delivery</h4>
                        
                        <div class="count">02</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 whychooseus-block-four">
                    <div class="inner-box wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        <div class="icon"><span class="flaticon-box"></span><i class="fas fa-check"></i><a href="#"><i class="fas fa-check"></i>Read More</a></div>
                        <h4>Real Time Tracking</h4>
                     
                        <div class="count">03</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 whychooseus-block-four">
                    <div class="inner-box wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        <div class="icon"><span class="flaticon-24-hours"></span><i class="fas fa-check"></i><a href="#"><i class="fas fa-check"></i>Read More</a></div>
                        <h4>24/7 Online Support</h4>
                       
                        <div class="count">04</div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


        <!-- Statement -->
        <section class="statement-section pt-0">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image"><img src="assets/images/resource/MGI_IMAGES/image-2.png" alt=""></div>
                        <div class="image"><img src="assets/images/resource/MGI_IMAGES/image-2.jpg" alt=""></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <div class="badge"><img src="assets/images/resource/MGI_IMAGES/image-2.png" alt=""></div>
                            <!-- Tab panes -->
                            <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                <div class="tab-pane fadeInUp animated active" id="tab-one" role="tabpanel"
                                    aria-labelledby="tab-one">
                                    <div class="text-block">
                                        <div class="sec-title mb-30">
                                            <div class="sub-title">Mission</div>
                                            <h2>Mission Statement</h2>
                                        </div>
                                        <div class="text">
                                            <ul>
                                                <p>Our Organization will achieve the goals through capacity building,
                                                    advocacy, community mobilization,
                                                    learning clubs establishment and empowerment.</p>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fadeInUp animated" id="tab-two" role="tabpanel"
                                    aria-labelledby="tab-two">
                                    <div class="text-block">
                                        <div class="sec-title mb-30">
                                            <div class="sub-title">Vision</div>
                                            <h2>Vision Statement</h2>
                                        </div>
                                        <div class="text">Leading Organization in youth’s life skills and self-reliance
                                            education enhancement</div>
                                    </div>
                                </div>
                                <div class="tab-pane fadeInUp animated" id="tab-three" role="tabpanel"
                                    aria-labelledby="tab-three">
                                    <div class="text-block">
                                        <div class="sec-title mb-30">
                                            <div class="sub-title">Values</div>
                                            <h2>Our Value</h2>
                                        </div>
                                        <div class="text">MGI Core Values and Philosophy are Transparency, Curiosity,
                                            Legal bound, Integrity, Accountability, Innovativeness and Patriotism</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-one-area" data-toggle="tab" href="#tab-one"
                                        role="tab" aria-controls="tab-one" aria-selected="true">
                                        <h4><i class="flaticon-up-arrow"></i>Mission</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-two-area" data-toggle="tab" href="#tab-two" role="tab"
                                        aria-controls="tab-two" aria-selected="false">
                                        <h4><i class="flaticon-up-arrow"></i>Vision</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-three-area" data-toggle="tab" href="#tab-three"
                                        role="tab" aria-controls="tab-three" aria-selected="false">
                                        <h4><i class="flaticon-up-arrow"></i>Value</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <!--Main Footer-->
        <?php include "footer.php"; ?>
        <!--End pagewrapper-->

        <!--Scroll to top-->
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


</body>


</html>