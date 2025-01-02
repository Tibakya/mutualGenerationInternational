<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "admin/conn.php";
// Fetch settings
$settings = mysqli_query($con, "SELECT * FROM settings");
$setting = mysqli_fetch_array($settings);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MGI Clubs - <?php echo htmlspecialchars($setting['site_name']); ?></title>
    <meta name="description" content="MGI is a nonprofit, non-governmental organization, autonomous, non-religious, non-partisan, non-political organization and social organization.">

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
    <style>
        .clubs-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .clubs-section h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        .club-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .club-card img {
            width: 100%;
            height: auto;
        }

        .club-card h5 {
            font-size: 20px;
            font-weight: bold;
            margin: 15px;
            color: #444;
        }

        .club-card p {
            font-size: 14px;
            color: #666;
            margin: 0 15px 15px 15px;
        }

        .club-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .clubs-column {
            padding: 15px;
        }

        @media (max-width: 767px) {
            .clubs-section {
                padding: 30px 15px;
            }

            .clubs-section h2 {
                font-size: 24px;
            }
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

        <!-- Main Header -->
        <?php include "header.php"; ?>

        <!-- Hidden Sidebar -->
        <?php include "hidden_folder/hidden_sideBar.php"; ?>
        <!-- Hidden Sidebar End -->

        <!-- Page Title -->
      
        <section class="page-title" style="background-image: url(assets/images/clubs/sec1.jpg);">
            <div class="background-text">
                <div data-parallax='{"x": 100}' class="text-layer">
                    <div class="text-1">MGI</div>
                    <div class="text-2">Clubs</div>
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content-wrapper">
                        <div class="title">
                            <h1>Self Reliance Clubs</h1>
                        </div>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.php">Home</a></li>
                            <li>Clubs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clubs Section -->
        <section class="clubs-section">
            <div class="auto-container">
                <div class="row">
                    <!-- Primary Schools Clubs -->
                    <div class="col-lg-6 col-md-12 clubs-column">
                        <h2>Primary Schools Clubs</h2>
                        <div class="accordion" id="primaryClubsAccordion">
                            <!-- Creative Arts Club -->
                            <div class="card">
                                <div class="card-header" id="headingCreativeArts">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCreativeArts" aria-expanded="false" aria-controls="collapseCreativeArts">
                                            Creative Arts Club
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseCreativeArts" class="collapse" aria-labelledby="headingCreativeArts" data-parent="#primaryClubsAccordion">
                                    <div class="card-body">

                                        <img src="assets/images/clubs/pr1.jpg" alt="Creative Arts Club" class="img-fluid">
                                        <p>Enhancing creativity and imagination through art and craft activities.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Young Scientists Club -->
                            <div class="card">
                                <div class="card-header" id="headingYoungScientists">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseYoungScientists" aria-expanded="false" aria-controls="collapseYoungScientists">
                                            Young Scientists Club
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseYoungScientists" class="collapse" aria-labelledby="headingYoungScientists" data-parent="#primaryClubsAccordion">
                                    <div class="card-body">
                                        <img src="assets/images/clubs/sec1.jpg" alt="Young Scientists Club" class="img-fluid">
                                        <p>Introducing basic science concepts through fun and interactive experiments.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Storytelling Club -->
                            <div class="card">
                                <div class="card-header" id="headingStorytelling">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseStorytelling" aria-expanded="false" aria-controls="collapseStorytelling">
                                            Storytelling Club
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseStorytelling" class="collapse" aria-labelledby="headingStorytelling" data-parent="#primaryClubsAccordion">
                                    <div class="card-body">
                                        <img src="assets/images/clubs/sec1.jpg" alt="Storytelling Club" class="img-fluid">
                                        <p>Fostering language skills and creativity through engaging storytelling sessions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Secondary Schools Clubs -->
                    <div class="col-lg-6 col-md-12 clubs-column">
                        <h2>Secondary Schools Clubs</h2>
                        <div class="accordion" id="secondaryClubsAccordion">
                            <!-- Entrepreneurship Club -->
                            <div class="card">
                                <div class="card-header" id="headingEntrepreneurship">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEntrepreneurship" aria-expanded="false" aria-controls="collapseEntrepreneurship">
                                            Entrepreneurship Club
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseEntrepreneurship" class="collapse" aria-labelledby="headingEntrepreneurship" data-parent="#secondaryClubsAccordion">
                                    <div class="card-body">
                                        <img src="assets/images/clubs/sec1.jpg" alt="Entrepreneurship Club" class="img-fluid">
                                        <p>Developing business acumen and entrepreneurial skills among students.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Debate and Public Speaking Club -->
                            <div class="card">
                                <div class="card-header" id="headingDebatePublicSpeaking">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDebatePublicSpeaking" aria-expanded="false" aria-controls="collapseDebatePublicSpeaking">
                                            Debate and Public Speaking Club
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseDebatePublicSpeaking" class="collapse" aria-labelledby="headingDebatePublicSpeaking" data-parent="#secondaryClubsAccordion">
                                    <div class="card-body">
                                        <img src="assets/images/clubs/pr1.jpg" alt="Debate and Public Speaking Club" class="img-fluid">
                                        <p>Enhancing communication and critical thinking through structured debates.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Tech and Innovation Club -->
                            <div class="card">
                                <div class="card-header" id="headingTechInnovation">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTechInnovation" aria-expanded="false" aria-controls="collapseTechInnovation">
                                            Tech and Innovation Club
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTechInnovation" class="collapse" aria-labelledby="headingTechInnovation" data-parent="#secondaryClubsAccordion">
                                    <div class="card-body">
                                        <img src="assets/images/background/success.jpg" alt="Tech and Innovation Club" class="img-fluid">
                                        <p>Promoting technological innovation and coding skills for the future.</p>
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
    </div>

    <!-- Scroll to top -->
    <div class="scroll-to-top scroll-to-target" data-target="html">
        <span class="flaticon-right-arrow-6"></span>
    </div>

    <!-- Scripts -->
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
