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

<head>
    <meta charset="utf-8">
    <title>Contact Us - <?php echo $setting['site_name']; ?></title>
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
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- Main Header -->
        <?php  include "header.php"; ?>

        <!-- End Main Header -->

   <!-- Hidden Sidebar -->
   <?php include "hidden_folder/hidden_sideBar.php" ?>
        <!-- Hidden Sidebar End -->

        <!-- Map Section -->
        <section class="map-section">
            <div class="contact-map">
                <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7924.199845566186!2d39.24219490136359!3d-6.757668466196675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4dd2ea6903b9%3A0x2ea6fefe6420d3b!2speakperformance!5e0!3m2!1sen!2stz!4v1727047496314!5m2!1sen!2stz"
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php echo $setting['map'];  ?>
            </div>
        </section>


        <!-- Contact Info section two -->
        <section class="contact-info-section-two">
            <div class="auto-container">
                <div class="nav-tabs-wrapper">
                    <div class="nav nav-tabs tab-btn-style-two">
                        <div class="theme_carousel owl-theme owl-carousel"
                            data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                            <ul class="item">
                                <li><a class="active" data-toggle="tab" href="#tab-one">
                                        <h4>Dar es Salaam - HQ</h4>
                                    </a></li>
                            </ul>
                            <ul class="item">
                                <li><a data-toggle="tab" href="#tab-two">
                                        <h4>Dodoma - Branch</h4>
                                    </a></li>
                            </ul>
                            <ul class="item">
                                <li><a data-toggle="tab" href="#tab-three">
                                        <h4>Mwanza - Branch</h4>
                                    </a></li>
                            </ul>
                            <ul class="item">
                                <li><a class="active" data-toggle="tab" href="#tab-four">
                                        <h4>Mbeya - Branch</h4>
                                    </a></li>
                            </ul>
                            <ul class="item">
                                <li><a data-toggle="tab" href="#tab-five">
                                        <h4>Arusha - Branch</h4>
                                    </a></li>
                            </ul>
                            <ul class="item">
                                <li><a data-toggle="tab" href="#tab-six">
                                        <h4>Kagera - Branch</h4>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fadeInUp animated" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">
                                    <h4><span class="flaticon-cursor"></span> Mikocheki B, Daima Street, <br>Kinodondoni, Dar es Salaam. 
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wrapper-box">
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-calling"></span></div>
                                                    <div class="text-area">
                                                        <div class="text"><strong>Phone</strong><a
                                                                href="tel:+255 752 032 985">+255 752 032 985</a></div>
                                                    </div>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-mail"></span></div>
                                                    <div class="text-area">
                                                        <div class="text"><strong>Email</strong><a
                                                                href="tel:+255 752 032 985">info@mutualgenerationinternational.or.tz </a></div>
                                                         </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="icon-box">
                                                <div class="icon"><span class="flaticon-mail"></span></div>
                                                <div class="text-area">
                                                    <div class="text"><strong>Mon - Friday</strong>08.00 am to 9.00pm
                                                    </div>
                                                    <div class="text"><strong>Saturday</strong>10.00 am to 4.00pm</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <div class="sub-title">Get a Quote</div>
                                    <h2>Join Our Team</h2>
                                </div>
                                <div class="text">Be Responsible! Participate in empowering th Society</div>
                                <div class="link">
                                    <a href="#" class="theme-btn btn-style-one"><span><i
                                                class="flaticon-up-arrow"></i>Get A Quote</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated active" id="tab-two" role="tabpanel"
                        aria-labelledby="tab-two">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">
                                    <h4><span class="flaticon-cursor"></span>Ebeneza Destefanos Building, <br> Swaswa Dodoma City</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wrapper-box">
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-calling"></span></div>
                                                    <div class="text-area">
                                                        <div class="text"><strong>Phone</strong><a
                                                                href="tel:255 752 032 985">+255 752 032 985</a></div>
                                                    </div>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-mail"></span></div>
                                                    <div class="text-area">
                                                        <div class="text"><strong>Email</strong><a
                                                                href="tel:+255 752 032 985">info@mutualgenerationinternational.or.t</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
    
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                   
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">
                                     <h4><span class="flaticon-cursor"></span>Coming Soon</h4>
                                  
                                </div>
                            </div>
                            <div class="col-lg-6">
     
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">
                   
                                </div>
                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-five" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="tab-six" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">
                                <h4><span class="flaticon-cursor"></span>Coming Soon</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contact Info section two -->
        <section class="contact-info-section-two">
            <div class="auto-container">
                <!-- <div class="nav-tabs-wrapper">
                <div class="nav nav-tabs tab-btn-style-two">
                    <div class="theme_carousel owl-theme owl-carousel" >
                    
                    </div>
                </div>
            </div> -->

<?php echo $setting['address']; ?></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="wrapper-box">
                                            <div class="icon-box">
                                                <div class="icon"><span class="flaticon-calling"></span></div>
                                                <div class="text-area">
                                                    <div class="text"><strong>Phone</strong><a href="tel:<?php echo $setting['phone']; ?>"><?php echo $setting['phone']; ?></a></div>
                                                </div>
                                            </div>
                                            <div class="icon-box">
                                                <div class="icon"><span class="flaticon-mail"></span></div>
                                                <div class="text-area">
                                                    <div class="text"><strong>Email</strong><a style="" href="mail:<?php echo $setting['email']; ?>"><?php echo $setting['email']; ?></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-box">
                                            <div class="icon"><span class="flaticon-mail"></span></div>
                                            <div class="text-area">
                                                <div class="text"><strong>Mon - Friday</strong>08.00 am to 9.00pm</div>
                                                
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-lg-6">
                            <div class="sec-title">
                                <div class="sub-title">Get a Quote</div>
                                <h2>Join Our Mission</h2>
                            </div>
                            <div class="text">Indignation and dislike men who are so beguiled & demoralized by <br> the charms of pleasure of the moment.</div>
                            <div class="link">
                                <a href="#cform" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i>Get A Quote</span></a>
                            </div>
                        </div>
                    </div>
                </div> -->




            </div>
    </div>
    </section>

    <!-- Contact form section -->
    <section class="contact-form-section" id="cform">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Drop a line</div>
                <h2>We’re Always Here for You</h2>
                <div class="text">Please do not hesitate to contact us if you require further information about our
                    logisitc service.</div>
            </div>
            <!--Contact Form-->
            <div class="contact-form">
                <form method="post" action="send-mail.php" id="contact-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" value="" placeholder="Your Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="phone" value="" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="email" value="" placeholder="Your Email" required>
                        </div>


                        <div class="form-group col-md-12">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group text-center col-md-12">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                            <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."
                                name="submit"><span><i class="flaticon-up-arrow"></i>Send Message</span></button>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Contact Form-->
        </div>
    </section>


    <!--Main Footer-->
    <?php include "footer.php"; ?>



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