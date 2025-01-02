<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    include "admin/conn.php";

    //fetch settings
    $settings = mysqli_query($con,"SELECT * FROM settings");
    $setting  = mysqli_fetch_array($settings);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from st.ourhtmldemo.com/new/Transida2/history.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jan 2021 08:06:42 GMT -->

<head>
    <meta charset="utf-8">
    <title>Our History - <?php echo $setting['site_name']; ?></title>
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
        <!-- <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div> -->

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
                        <div class="title">
                            <h1>Our History</h1>
                        </div>
                        <ul class="bread-crumb style-two">
                            <li><a href="about.php">About Company <i class="flaticon-up-arrow"></i></a></li>
                            <li class="active"><a href="history.php">Our History <i class="flaticon-up-arrow"></i></a>
                            </li>
                            <li><a href="team.php">Leadership Team<i class="flaticon-up-arrow"></i></a></li>
                            <li><a href="global-networks.php">Taasisi Washiriki <i class="flaticon-up-arrow"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- History section -->
        <section class="history-section">
            <div class="auto-container">
                <div class="image"><img src="assets/images/resource/MGI_IMAGES/1.jpg" alt=""></div>
            </div>
            <div class="tab-area">
                <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-one-area" data-toggle="tab" href="#tab-one" role="tab"
                            aria-controls="tab-one" aria-selected="true">
                            <h4>1942</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-two-area" data-toggle="tab" href="#tab-two" role="tab"
                            aria-controls="tab-two" aria-selected="false">
                            <h4>1948</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-three-area" data-toggle="tab" href="#tab-three" role="tab"
                            aria-controls="tab-three" aria-selected="false">
                            <h4>1953</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-four-area" data-toggle="tab" href="#tab-four" role="tab"
                            aria-controls="tab-four" aria-selected="false">
                            <h4>1959</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-five-area" data-toggle="tab" href="#tab-five" role="tab"
                            aria-controls="tab-five" aria-selected="false">
                            <h4>1965</h4>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    <div class="tab-pane fadeInUp animated active" id="tab-one" role="tabpanel"
                        aria-labelledby="tab-one">
                        <div class="history-area row">
                            <div class="theme_carousel owl-theme owl-carousel"
                                data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" }, "992" :{ "items" : "3" } , "1200":{ "items" : "4" }, "1500":{ "items" : "5" }}}'>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br>with with...</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and empowerment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">24 <sup>st</sup><span> Aug</span></div>
                                        <h4>Journey Started With a <br>with with..</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and empowerment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">18 <sup>th</sup><span> Dec</span></div>
                                        <h4>Journey vphysical too a <br>with with...</h4>
                                        <div class="text">To take a trivial example, which of us
                                            ever undertakes laborious physical too
                                            some advantage Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">14 <sup>th</sup><span> Jan</span></div>
                                        <h4>Worldwide Operations With <br> 26 New Branches</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">21 <sup>st</sup><span> Mar</span></div>
                                        <h4>Introduce New Logo and <br>Brand Identity.</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br> Single Room.</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">24 <sup>st</sup><span> Aug</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">18 <sup>th</sup><span> Dec</span></div>
                                        <h4>Creating Powerful Logistics
                                            & Transport Network</h4>
                                        <div class="text">To take a trivial example, which of us
                                            ever undertakes laborious physical too
                                            some advantage.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">14 <sup>th</sup><span> Jan</span></div>
                                        <h4>Worldwide Operations With <br> 26 New Branches</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">21 <sup>st</sup><span> Mar</span></div>
                                        <h4>Introduce New Logo and <br>Brand Identity.</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="history-area row">
                            <div class="theme_carousel owl-theme owl-carousel"
                                data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" }, "992" :{ "items" : "3" } , "1200":{ "items" : "4" }, "1500":{ "items" : "5" }}}'>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">24 <sup>st</sup><span> Aug</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">18 <sup>th</sup><span> Dec</span></div>
                                        <h4>Creating Powerful Logistics
                                            & Transport Network</h4>
                                        <div class="text">To take a trivial example, which of us
                                            ever undertakes laborious physical too
                                            some advantage.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">14 <sup>th</sup><span> Jan</span></div>
                                        <h4>Worldwide Operations With <br> 26 New Branches</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">21 <sup>st</sup><span> Mar</span></div>
                                        <h4>Introduce New Logo and <br>Brand Identity.</h4>
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was
                                            born we will give you a complete account.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">24 <sup>st</sup><span> Aug</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">18 <sup>th</sup><span> Dec</span></div>
                                        <h4>Creating Powerful Logistics
                                            & Transport Network</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">14 <sup>th</sup><span> Jan</span></div>
                                        <h4>Worldwide Operations With <br> 26 New Branches</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">21 <sup>st</sup><span> Mar</span></div>
                                        <h4>Introduce New Logo and <br>Brand Identity.</h4>
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was
                                            born we will give you a complete account.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="history-area row">
                            <div class="theme_carousel owl-theme owl-carousel"
                                data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" }, "992" :{ "items" : "3" } , "1200":{ "items" : "4" }, "1500":{ "items" : "5" }}}'>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">24 <sup>st</sup><span> Aug</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">18 <sup>th</sup><span> Dec</span></div>
                                        <h4>Creating Powerful Logistics
                                            & Transport Network</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">14 <sup>th</sup><span> Jan</span></div>
                                        <h4>Worldwide Operations With <br> 26 New Branches</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">21 <sup>st</sup><span> Mar</span></div>
                                        <h4>Introduce New Logo and <br>Brand Identity.</h4>
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was
                                            born we will give you a complete account.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">24 <sup>st</sup><span> Aug</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">18 <sup>th</sup><span> Dec</span></div>
                                        <h4>Creating Powerful Logistics
                                            & Transport Network</h4>
                                        <div class="text">Our Organization will achieve the goals through capacity
                                            building, advocacy, community mobilization,
                                            learning clubs establishment and</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">14 <sup>th</sup><span> Jan</span></div>
                                        <h4>Worldwide Operations With <br> 26 New Branches</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">21 <sup>st</sup><span> Mar</span></div>
                                        <h4>Introduce New Logo and <br>Brand Identity.</h4>
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was
                                            born we will give you a complete account.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                        <div class="history-area row">
                            <div class="theme_carousel owl-theme owl-carousel"
                                data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" }, "992" :{ "items" : "3" } , "1200":{ "items" : "4" }, "1500":{ "items" : "5" }}}'>
                                <div class="history-block col-lg-12">
                                    <div class="inner-box">
                                        <div class="date">15 <sup>th</sup><span> Jun</span></div>
                                        <h4>Journey Started With a <br> Single Truck.</h4>
                                        <div class="text">Indignation & dislike men who are so beguiled demoralized by
                                            the charms of pleasure of the moment.</div>
                                    </div>
                                </div>
                            </div>
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