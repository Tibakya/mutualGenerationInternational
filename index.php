<?php
include "admin/conn.php";
//fetch settings
$settings = mysqli_query($con,"SELECT * FROM settings");
$setting  = mysqli_fetch_array($settings);
// fetch testimonials
$testi = mysqli_query($con,"SELECT * FROM testimonials");
//fetch blog
$blog = mysqli_query($con,"SELECT * FROM blog");

//fetch services
$blog2 = mysqli_query($con,"SELECT * FROM blog ORDER BY id DESC LIMIT 5");

//fetch services
$services = mysqli_query($con,"SELECT * FROM services ORDER BY id DESC"); 
// Fetch posters (only img, title, short, desrip, url, and date columns)
$posters = mysqli_query($con, "SELECT img, title, location, short, '' AS url, DATE_FORMAT(date, '%d %b') as formatted_date FROM posters ORDER BY id desc LIMIT 6");
$result = mysqli_query($con, "SELECT * FROM taarifa ORDER BY id DESC LIMIT 2");
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <title><?php echo $setting['site_name']; ?> - Organization</title>
    <meta name="description" content="Mutual Generation International is a non-governmental organization which strives to promote 
        community development through enhancing self-reliance education, self-employability skills, children 
        sponsorship, climate change advocacy, technical scholarship.">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $setting['site_name']; ?> - Organization">
    <meta property="og:description" content="Mutual Generation International is a non-governmental organization which strives to promote community development through enhancing self-reliance education, self-employability skills, children sponsorship, climate change advocacy, technical scholarship.">
    <meta property="og:image" content="https://www.mutualgenerationinternational.or.tz/assets/images/logowhite.png">
    <meta property="og:url" content="https://www.mutualgenerationinternational.or.tz">
    <meta property="og:type" content="website">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $setting['site_name']; ?> - Organization">
    <meta name="twitter:description" content="Mutual Generation International is a non-governmental organization which strives to promote community development through enhancing self-reliance education, self-employability skills, children sponsorship, climate change advocacy, technical scholarship.">
    <meta name="twitter:image" content="https://www.mutualgenerationinternational.or.tz/assets/images/logowhite.png">

    <!-- Additional Meta Tags for Favicon and Mobile -->
    <link rel="apple-touch-icon" href="https://www.mutualgenerationinternational.or.tz/assets/images/logowhite.png">
    <meta name="image" content="https://www.mutualgenerationinternational.or.tz/assets/images/logowhite.png">

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

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <style>
    .announcement {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        opacity: 1;
        transition: transform 1s ease, opacity 1s ease;
        /* Transition effect */
    }

    .announcement-icon {
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }

    .announcement-date {
        display: block;
        font-size: 12px;
        color: white;
        margin-top: 5px;
    }

    .news-icon {
        width: 64px;
        height: 66px;
        margin-right: 10px;
        object-fit: cover;
    }

    .inner-box-news {
        height: 300px;
        /* Fixed height to control visibility */
        overflow-y: hidden;
        /* Hide scrollbar by default */
        position: relative;
        scrollbar-width: thin;
        /* For Firefox */
        scrollbar-color: #888 #f1f1f1;
        /* Custom scrollbar colors for Firefox */
    }

    /* Webkit-based browsers (Chrome, Safari) */
    .inner-box-news::-webkit-scrollbar {
        width: 8px;
        display: none;
        /* Hide scrollbar by default */
    }

    .inner-box-news::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .inner-box-news::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
    }

    /* Show scrollbar when hovered or focused */
    .inner-box-news:hover,
    .inner-box-news:focus-within {
        overflow-y: scroll;
        /* Show scrollbar on hover */
    }

    .inner-box-news:hover::-webkit-scrollbar,
    .inner-box-news:focus-within::-webkit-scrollbar {
        display: block;
        /* Show scrollbar for Webkit-based browsers */
    }

    /* On hover, make scrollbar more visible */
    .inner-box-news:hover::-webkit-scrollbar-thumb {
        background: #555;
    }


    
    /* Main CountDown section styling */

    #fh5co-register {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        position: relative;
    }

    /*#fh5co-register .overlay {*/
    /*    position: absolute;*/
    /*    top: 0;*/
    /*    left: 0;*/
    /*    right: 0;*/
    /*    bottom: 0;*/
    /*    content: '';*/
    /*    background: rgba(0, 0, 0, 0.1);*/
    /*}*/

    #fh5co-register h2 {
        color: #006680;
        font-size: 68px;
        font-weight:700;
        margin-top:98px;
    }
    
    #fh5co-register p {
        color: #006680;
        font-size: 30px;
    }

    #fh5co-register h3 {
        color: black ;
        margin-top: 20px;
     
    }
    
   #fh5co-register .btn-reg {
    position: relative;
    display: inline-block;
    margin-top:80px;
    font-size: 15px;
    line-height: 24px;
    color: #fff;
    padding: 17.5px 45px;
    font-weight: 700;
    border-radius: 0;
    overflow: hidden;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
    }

    /* Responsive styling for countdown on smaller screens */
    @media screen and (max-width: 768px) {

       #fh5co-register h2 {
        color: #006680;
        font-size: 36px;
        margin:10px;
        font-weight:700;
    }
    
    #fh5co-register p {
        color: #006680;
        font-size: 20px;
    }

    #fh5co-register h3 {
        color: black ;
        margin-top: 15px;
     
    }
    
   #fh5co-register .btn-reg {
    position: relative;
    display: inline-block;
    margin-top:0px;
    font-size: 15px;
    line-height: 24px;
    color: #fff;
    padding: 17.5px 45px;
    font-weight: 500;
    border-radius: 0;
    overflow: hidden;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
    }
    }


    .simply-countdown {
        /* The countdown */
        margin-top: 3em;
        margin-bottom: 3em;
    }

    /* Countdown Circles/blocks */
    .simply-countdown>.simply-section {
        display: inline-block;
        width: 130px;
        height: 130px;
        background: rgba(0, 0, 0, 0.4);
        margin: 0 30px;
        position: relative;
        border: 9px solid #fff;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
    }

    /* Responsive styling for countdown on smaller screens */
    @media screen and (max-width: 768px) {
        .simply-countdown>.simply-section {
            margin: 0 5px;
        }
    }

    .simply-countdown>.simply-section>div {
        /* countdown block inner div */
        display: table-cell;
        vertical-align: middle;
        height: 115px;
        width: 120px;
    }

    .simply-countdown>.simply-section .simply-amount,
    .simply-countdown>.simply-section .simply-word {
        display: block;
        color: white;
        /* amounts and words */
    }

    .simply-countdown>.simply-section .simply-amount {
        font-size: 40px;
        /* amounts */
    }

    .simply-countdown>.simply-section .simply-word {
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 2px;
        font-weight: 700;
        /* words */
    }

    .date-counter {
        margin-top: 50px;
    }
    .Whychooseus-section {
    background-image: url(assets/images/background/bg24.png);
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    position: relative;
    }
    </style>
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
        <?php include "header.php"; ?>
        <!-- Hidden Sidebar -->
        <?php include "hidden_folder/hidden_sideBar.php" ?>
        <!-- Hidden Sidebar End -->
        <!-- Bnner Section -->
        <section class="banner-section">
            <div class="swiper-container banner-slider">
                <div class="swiper-wrapper">
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/main-slider/image-9.jpg);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4>Promoting</h4>
                                    <h1>Community Development </h1>
                                    <div class="text">Transparency and Curiosity is Our Objective</div>
                                    <div class="link-box">
                                        <a href="about.php" class="theme-btn btn-style-one"><span><i
                                                    class="flaticon-up-arrow"></i>More </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/main-slider/image-2.jpg);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4>Our Motto </h4>
                                    <h1>Uzalendo Kwa Nchi,</h1>
                                    <div class="text">Amani Na Upendo Kwa Wote </div>
                                    <div class="link-box">
                                        <a href="become-member.php" class="theme-btn btn-style-one"><span><i
                                                    class="flaticon-up-arrow"></i>Register </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/main-slider/meza.jpg);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4>Our Motto </h4>
                                    <h1>Uzalendo Kwa Nchi,</h1>
                                    <div class="text">Amani Na Upendo Kwa Wote </div>
                                    <div class="link-box">
                                        <a href="become-member.php" class="theme-btn btn-style-one"><span><i
                                                    class="flaticon-up-arrow"></i>Register </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(assets/images/main-slider/image-3.jpg);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4> Innovativeness</h4>
                                    <h1>Patriotism and Legal bound</h1>
                                    <div class="text">Integrity and Accountability are Our Core Values</div>
                                    <div class="link-box">
                                        <a href="events" class="theme-btn btn-style-one"><span><i
                                                    class="flaticon-up-arrow"></i>More Details </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slider-nav style-two">
                <div class="banner-slider-control banner-slider-button-prev"><span><i
                            class="far fa-angle-left"></i>Prev</span></div>
                <div class="banner-slider-control banner-slider-button-next"><span>Next<i
                            class="far fa-angle-right"></i></span> </div>
            </div>
        </section>
        <!-- End Bnner Section -->

        <!-- Start latest-news-section  -->
        <section class="latest-news-section" style="background-image: url(assets/images/background/bg24.png); background-size: cover;  background-repeat: no-repeat;">
            <div class="auto-container">
                <div class="row ml-12">

                    <div class="col-md-6 taarifa-block">
                        <h2 style="color: rgba(8, 97, 231, 0.884);">Taarifa Muhimu</h2>
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">
                            <div class="scrolling-text">
                                <?php
                // Fetch all taarifa from the database
                // $result = mysqli_query($con, "SELECT * FROM taarifa ORDER BY date DESC");

                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each taarifa and display it
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                                <div class="announcement">
                                    <img src="assets/images/icons/flash.gif" alt="Icon" class="announcement-icon">
                                    <div class="announcement-content">
                                        <!-- Link to the detailed taarifa -->
                                        <a href="taarifa-details.php?id=<?php echo $row['id']; ?>"
                                            class="announcement-title">
                                            <?php echo htmlspecialchars($row['title']); ?>
                                        </a>
                                        <span class="announcement-date"><?php echo $row['date']; ?></span>
                                    </div>
                                </div>
                                <?php 
                    } 
                } else {
                    // If no taarifa found, display "No information" message
                    echo "<p style='color:grey;'>No information available at the moment.</p>";
                }
                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 latest-block">
                        <h2 style="color: rgba(8, 97, 231, 0.884);" >Habari Mpya</h2>
                        <div class="inner-box-news wow fadeInUp" data-wow-duration="2600ms">
                            <?php while($row = mysqli_fetch_array($blog2)) { ?>
                            <div class="announcement">
                                <img src="admin/images/blog/<?php echo htmlspecialchars($row['img']); ?>"
                                    alt="<?php echo htmlspecialchars($row['title']); ?>" class="news-icon">
                                <div class="announcement-content">
                                    <a href="blog.php?id=<?php echo $row['id']; ?>" class="announcement-title">
                                        <?php echo $row['title']; ?>
                                    </a>
                                    <span class="announcement-date"><?php echo $row['date']; ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
             <center> <p style="margin-top:40px;" ><a href="events" class="btn btn-primary btn-lg btn-reg">Ready More</a></p></center>
        </section>
        <!-- End latest-news-section  -->


<!-- Sliding Section -->
<div id="fh5co-register" style="background-image: url(assets/images/background/bg24.png); height:580px;">
    <div class="overlay"></div>
    <div id="register-carousel" class="carousel slide" data-ride="carousel" data-interval="6000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#register-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#register-carousel" data-slide-to="1"></li>
        </ol>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- Slide 1: MEZA YA DUARA -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2 animate-box">
                        <div class="date-counter text-center">
                            <h2>MEZA YA DUARA</h2>
                            <div class="card-body">
                                <p class="card-text">Kila mwisho wa mwezi kujadili changamoto na fursa mbalimbali.</p>
                            </div>
                            <h3><i>Mawazo chanya kwa maendeleo ya jamii!</i></h3>
                            <p style="margin-top:40px;">
                                <a href="events" class="btn btn-success btn-lg btn-reg">Read More</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: MGI YOUNG LADIES FORUM -->
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2 animate-box">
                        <div class="date-counter text-center">
                            <h2>MGI YOUNG LADIES FORUM</h2>
                            <div class="card-body">
                                <p class="card-text">Kila Jumamosi ya Mwisho wa Mwezi</p>
                            </div>
                            <h3><i>Empowering Young Ladies, Building Strong Future Nation...!</i></h3>
                            <p style="margin-top:40px;">
                                <a href="blog" class="btn btn-primary btn-lg btn-reg">Read More</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#register-carousel" role="button" data-slide="prev" style="color: #006680;">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#register-carousel" role="button" data-slide="next" style="color: #006680;">
            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- New Section with Links -->
<section class="member-sponsor-section"
    style="background-image: url(assets/images/background/bg24.png); padding: 60px 0;">
    <div class="container">
        <div class="row text-center">
            <!-- Section Header -->
            <div class="col-12 mb-5" style="background-color: #006680; padding: 20px;">
                <h2 class="text-white" style="font-size: 2.5rem; font-weight: bold;">Explore Our Opportunities</h2>
                <p class="text-light" style="font-size: 1.25rem;">Discover the various ways you can get involved with our mission and make a difference!</p>
            </div>

            <!-- Accordion -->
            <div class="col-12">
                <div id="accordion">

                    <!-- Row 1: Two Accordions per Row -->
                    <div class="row">
                        <!-- Accordion Item 1 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Become MGI Member
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-muted">By becoming a member of MGI, you join a dynamic community of change-makers and leaders. Together, we can drive meaningful change and inspire others to get involved.</p>
                                        <a href="become-member.php" class="btn btn-primary btn-lg w-100">Join MGI Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 2 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Partnership
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-muted">Partnering with MGI offers opportunities for collaboration, growth, and mutual support. Whether you're looking to sponsor, donate, or collaborate, your involvement helps drive our mission forward.</p>
                                        <a href="donation-sponsorship.php" class="btn btn-success btn-lg w-100">Get Involved</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Two Accordions per Row -->
                    <div class="row">
                        <!-- Accordion Item 3 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Successful Stories
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-muted">Explore inspiring stories of individuals who have made a real difference in their communities through their involvement with MGI. These success stories highlight the power of collective effort.</p>
                                        <a href="#" class="btn btn-warning btn-lg w-100">Read and Share Stories</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 4 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Innovations & Products
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-muted">Submit your innovative ideas and products to be featured and supported by MGI. We encourage creativity and ingenuity to solve problems and empower communities.</p>
                                        <a href="innovationSubmission.php" class="btn btn-info btn-lg w-100">Submit Your Innovation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Two Accordions per Row -->
                    <div class="row">
                        <!-- Accordion Item 5 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Entrepreneurship Club
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-muted">Join the Entrepreneurship Club to connect with like-minded individuals and get the support you need to start and grow your own business. Together, we can create the next generation of entrepreneurs.</p>
                                        <a href="entrepreneurshipClub.php" class="btn btn-danger btn-lg w-100">Join the Club</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item 6 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" id="headingSix">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Secondary & Primary School Clubs
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-muted">MGI encourages young minds to join our Secondary & Primary School Clubs, where we nurture creativity, critical thinking, and leadership. Get involved today to make a difference in the lives of children.</p>
                                        <a href="#" class="btn btn-dark btn-lg w-100">Explore Clubs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Whychooseus-section -->
        <section class="Whychooseus-section">
            <div class="auto-container">
                
        <h3 style="position: relative; font-weight: 700; text-align: center ; font-size: 40px; ">Our Main Objectives</h3>
                <div class="row ml-12">
                    <div class="col-md-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">
                            <div class="text"><i class="flaticon-tick mr-2"></i>Promoting Self-reliance education
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">
                            <div class="text"><i class="flaticon-tick mr-2"></i>Enhancing of Community, Social and
                                Economic Empowerment
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">

                            <div class="text"><i class="flaticon-tick mr-2"></i>Talents, Special skills Identification &
                                Development Advocation
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">

                            <div class="text"><i class="flaticon-tick mr-2"></i>Advocation on the Climate change
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">

                            <div class="text"><i class="flaticon-tick mr-2"></i>Promoting Employability Skills
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">
                            <div class="text"><i class="flaticon-tick mr-2"></i>To Enhance Sponsorship and Scholarship
                                programs
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">

                            <div class="text"><i class="flaticon-tick mr-2"></i>Establish Economic activities
                                Opening Diversified Solution to the Community.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 why-choose-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2600ms">
                            <div class="text"><i class="flaticon-tick mr-2"></i>Enhancing Diplomatic
                                & International Exchange development Programs</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- End Whychooseus-section -->

        <!-- Related Projects -->
        <section class="related-projects" style="background-image: url(assets/images/background/bg24.png); background-size: cover; background-repeat: no-repeat; ">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>What's in Today?</h2>
                    <div class="date"><i class="far fa-calendar"></i> <?php echo date('D, d M Y') ?> </div>
                </div>
                <div class="row">
                    <div class="theme_carousel owl-theme owl-carousel"
                        data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "autoplayHoverPause": true, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                        <?php while ($project = mysqli_fetch_assoc($posters)): ?>
                        <div class="col-lg-12 project-block-two">
                            <div class="inner-box">
                                <div class="image">
                                    <!-- Image path -->
                                    <img src="admin/images/posters/<?php echo htmlspecialchars($project['img']); ?>"
                                        alt="<?php echo htmlspecialchars($project['title']); ?>">
                                    <div class="overlay"><a
                                            href="admin/images/posters/<?php echo htmlspecialchars($project['img']); ?>"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-full-size"></span></a></div>
                                </div>
                                <div class="lower-content">
                                    <div class="category"><i
                                            class="far fa-map-marker mr-3"></i><?php echo htmlspecialchars($project['location']); ?>
                                    </div>
                                    <h4><?php echo htmlspecialchars($project['title']); ?></h4>
                                    <div class="link-btn"><a href="events"><span
                                                class="flaticon-right-arrow-6"></span></a></div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section -->
        <section class="about-section" style="background-image: url(assets/images/background/bg24.png); background-size: cover; background-repeat: no-repeat; ">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sec-title">
                            <div class="sub-title">Our Organization</div>
                            <h2>Established <br> Since 2023</h2>
                            <div class="text">MGI was established in 02/03/2023 with the registration number
                                00NGO/R/4456 as a result of mutual
                                agreement and commitment of the passionate members highly ready to join the efforts of
                                the Government
                                and other Development stakeholders in reaching sustainable development goals.
                            </div>
                            <a href="about" class="readmore-link"><i class="flaticon-up-arrow"></i>More Details</a>
                        </div>

                        <h4>THEMATIC AREAS</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="icon"><span class=" flaticon-binoculars"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4> Agriculture</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="icon"><span class="flaticon-goal"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Health</h4>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1700ms">
                                    <div class="icon"><span class="flaticon-architect "></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Education</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1900ms">
                                    <div class="icon"><span class=" flaticon-apple"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4> Industrialization</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1900ms">
                                    <div class="icon"><span class="flaticon-gold"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Environment</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image wow fadeInRight" data-wow-duration="1500ms"><img
                                src="assets/images/resource/image-1.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </section>

      <!-- serivice from here -->
        <section class="services-section"
            style="background-image: url(assets/images/background/bg24.png);  background-size: cover;  background-repeat: no-repeat;">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <!-- <div class="sub-title">Main Services</div> -->
                    <h2>Project Centers And Programmes</h2>
                </div>
            </div>
        <!-- boostrap -->
        <style>
        .zoom {}

        .zoom:hover {
            transform: scale(1.02);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        </style>

        <div class="container pb-5">
            <div class="row ">
                <?php
                        while($row=mysqli_fetch_array($services)){
                    ?>
                <div class="col-md-4 zoom pb-5">

                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" style="height:270px;"
                                src="admin/images/services/<?php echo $row['img']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><b><a
                                            href="single-service?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></b>
                                </h5>
                                <p class="card-text"><?php echo $row['short']; ?></p>
                            </div>
                            <div class="card-footer">

                                <div class="link"><a href="single-service?id=<?php echo $row['id']; ?>"
                                        class="readmore-link"><i class="flaticon-up-arrow"></i>More Details</a></div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php  } ?>
            </div>
        </div>
        </section>

        <!-- Work-process Section -->
        <section class="work-process-section" style="background-image: url(assets/images/background/bg24.png);  background-size: cover;  background-repeat: no-repeat;">
            <div class="bg" style="background-image: url(assets/images/background/bg-2.jpg);"></div>
            <div class="auto-container">
                <div class="sec-title text-center light" style"margin-top:0px; padding-top:0px;" >
                    <!--<div class="sub-title text-center">How We Work</div>-->
                    <h2> We Aim To enhance Diplomatic and International  Exchange development programs</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <div class="count">5000+</div>
                            <div class="icon"><span class=" flaticon-businessman"></span></div>
                            <h4>Members</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInDwon" data-wow-duration="1500ms">
                            <div class="count">10 +</div>
                            <div class="icon"><span class="flaticon-warehouse"></span></div>
                            <h4>Centers</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <div class="count">28 +</div>
                            <div class="icon"><span class="flaticon-packing-list"></span></div>
                            <h4>Partiners</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInDown" data-wow-duration="1500ms">
                            <div class="count">04 +</div>
                            <div class="icon"><span class="flaticon-delivery-1"></span></div>
                            <h4>Volunteers <br> Donors</h4>

                        </div>
                    </div>
                </div>
                <div style="font-size:35px; line-height:45px; text-align:center;" >
                <p  >Mutual Generation international believe in capacity building, advocacy,
                    community mobilization,
                    learning clubs establishment and empowerment in achieving our organization goals</p>
                    </div>
            </div>
            <center><p style="margin-top:120px;"><a href="contact" class="btn btn-primary btn-lg btn-reg">More Info Click</a></p></center>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section"  style="background-image: url(assets/images/background/bg24.png);  background-size: cover;  background-repeat: no-repeat;">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>What the Community Says</h2>
                </div>
                <div class="theme_carousel owl-theme owl-carousel"
                    data-options='{"loop": true, "margin": 30, "autoHeight": true, "lazyLoad": true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "autoplayHoverPause": true, "responsive":{ "0" :{ "items": 1 }, "600" :{ "items" : 1 }, "768" :{ "items" : 2 } ,"992":{ "items" : 2 }, "1200":{ "items" : 3 }}}'>
                    <?php
            // Assuming $testi is the result set from the database query
            while($row=mysqli_fetch_array($testi)){
            ?>
                    <div class="testimonial-block">
                    <div class="inner-box" style=" 
        background-color: rgba(255, 255, 255, 0.5); 
        padding: 20px; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        font-family: 'Roboto', sans-serif; 
    ">                      <!-- Image at the top -->
                            <div class="author-thumb">
                                <img src="admin/images/testimonial/<?php echo htmlspecialchars($row['img']); ?>" alt="">
                                <div class="quote"><span class="flaticon-right-quote"></span></div>
                            </div>
                            <!-- Text and other content below the image -->
                            <div class="text"><?php echo htmlspecialchars($row['descrip']); ?></div>
                            <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                            <div class="designation"><?php echo htmlspecialchars($row['designation']); ?></div>
                            <div class="rating">
                                <?php
                            for($i = 0; $i < 5; $i++) {
                                echo '<span class="flaticon-star-1"></span>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php include "footer.php"; ?>
        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span>
        </div>
        <!--Jquery.min.js-->
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


        <!-- Count Down -->
        <script src="assets/js/simplyCountdown.js"></script>

        <!-- jQuery Script to slide announcements -->
        <script>
        $(document).ready(function() {
    var autoSlide; // Store the interval so it can be cleared
    var isReversing = false; // Track the scrolling direction
    var currentIndex = 0; // Track the current announcement index
    var totalAnnouncements = $('.latest-block .announcement').length; // Total number of announcements

    function slideLatestBlock() {
        if (!isReversing) {
            // Forward scrolling
            var $firstAnnouncement = $('.latest-block .announcement:first');

            $firstAnnouncement.animate({
                opacity: 0,
                marginTop: '-=' + $firstAnnouncement.outerHeight(true)
            }, 1000, function() {
                $firstAnnouncement.css({
                    marginTop: 0,
                    opacity: 1
                }).appendTo('.latest-block .inner-box-news');

                // Update the current index
                currentIndex++;
                if (currentIndex >= totalAnnouncements) {
                    currentIndex = totalAnnouncements - 1; // Make sure the index does not exceed
                    isReversing = true; // Start reversing direction
                }
            });
        } else {
            // Reverse scrolling
            var $lastAnnouncement = $('.latest-block .announcement:last');

            $lastAnnouncement.prependTo('.latest-block .inner-box-news')
                .css({
                    marginTop: -$lastAnnouncement.outerHeight(true),
                    opacity: 0
                })
                .animate({
                    opacity: 1,
                    marginTop: 0
                }, 1000, function() {
                    // Update the current index
                    currentIndex--;
                    if (currentIndex <= 0) {
                        currentIndex = 0; // Make sure the index does not go below zero
                        isReversing = false; // Go back to forward scrolling
                    }
                });
        }
    }

    // Set interval for automatic sliding every 3 seconds
    autoSlide = setInterval(slideLatestBlock, 3000);

    // Pause sliding on hover and touch events
    function pauseSliding() {
        clearInterval(autoSlide); // Stop sliding when hovered or touched
    }

    // Resume sliding when mouse or touch leaves
    function resumeSliding() {
        autoSlide = setInterval(slideLatestBlock, 3000); // Resume sliding on mouse out or touch end
    }

    // Pause on mouse hover or touch
    $('.latest-block .inner-box-news').on('mouseenter touchstart', pauseSliding);

    // Resume on mouse leave or when touch ends
    $('.latest-block .inner-box-news').on('mouseleave touchend', resumeSliding);
});


        </script>

<script>
    // Set the target date and time for Saturday, October 12, 2024, at 9:00 AM (Tanzania Time)
    var targetDate = new Date('2024-10-12T09:00:00+03:00'); // Time in UTC+3 (Tanzania)

    // Initialize simplyCountdown with the target date
    simplyCountdown('.simply-countdown-one', {
        year: targetDate.getFullYear(),
        month: targetDate.getMonth() + 1, // JavaScript months are 0-based
        day: targetDate.getDate(),
        hours: targetDate.getHours(), // Set hours for the morning time
        minutes: targetDate.getMinutes(),
        seconds: targetDate.getSeconds()
    });

    // jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: targetDate.getFullYear(),
        month: targetDate.getMonth() + 1,
        day: targetDate.getDate(),
        hours: targetDate.getHours(), // Set hours for the morning time
        minutes: targetDate.getMinutes(),
        seconds: targetDate.getSeconds(),
        enableUtc: false
    });
</script>


</body>

</html>