<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "admin/conn.php";

// Fetch settings
$settings = mysqli_query($con, "SELECT * FROM settings");
$setting  = mysqli_fetch_array($settings);

// Fetch moving text items where moving_text_display is enabled
$result2 = mysqli_query($con, "SELECT title_details FROM taarifa WHERE moving_text_display = 1 ORDER BY id DESC LIMIT 2");
?>

<!-- Main Header -->
<header class="main-header header-style-one">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BH1P71JTGV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BH1P71JTGV');
</script>

    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container">
                <div class="left-column">
                    <ul class="social-icon">
                        <li><a target="_blank" href="<?php echo $setting['facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?php echo $setting['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php echo $setting['instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php echo $setting['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="become-member.php" id="top-btn" class="btn btn-warning btn-sm">Join</a></li>
                        <li><a href="donation-sponsorship.php" class="btn btn-secondary btn-sm">Collaborate</a></li>
                    </ul>
                </div>
                <div class="right-column">
                    <div class="phone-number"><i class="flaticon-calling"></i><a href="tel:<?php echo $setting['phone']; ?>"><?php echo $setting['phone']; ?></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Marquee Section -->
    <?php if (mysqli_num_rows($result2) > 0) : // Check if there are messages to display ?>
        <div class="col-lg-12" style="background-color:deepskyblue; height: 50px;">
            <marquee behavior="scroll" direction="left" style="color:white; padding-top:13px; font-size:18px;" onmouseover="this.stop();" onmouseout="this.start();">
                <span style="color: red; background-color: Yellow; border-radius:5px;">Alert!</span>
                <?php
                while ($row = mysqli_fetch_array($result2)) {
                    echo htmlspecialchars($row['title_details']) . ' &nbsp;&nbsp;&nbsp; ';
                }
                ?>
            </marquee>
        </div>
    <?php endif; ?>

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo"><a href="index"><img src="assets/images/logowhite1.png" alt=""></a></div>
                </div>
                <div class="right-column">
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar-2.png" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li class="dropdown"><a href="index.php">Home</a></li>
                                    <li class="dropdown"><a href="about.php">About Us <i class="fa fa-angle-down ml-1"></i></a>
                                        <ul>
                                            <li><a href="about.php">Organization Profile</a></li>
                                            <li><a href="global-networks.php">Our Partners</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="events.php">Events</a></li>
                                    <li><a href="blog.php">Blog News</a></li>
                                    <li><a href="team.php">Our Team</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Header -->
    <div class="sticky-header">
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="index.php"><img src="assets/images/logowhite1.png" alt=""></a></div>
                    </div>
                    <div class="right-column">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <div class="mobile-nav-toggler"><img src="assets/images/logowhite1.png" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light"></nav>
                        </div>
                        <div class="sticky-buttons">
                            <a href="become-member.php" class="btn btn-warning btn-sm">Become Member</a>
                            <a href="donation-sponsorship.php" class="btn btn-secondary btn-sm">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-remove"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.php"><img src="assets/images/logowhite1.png" alt="" title=""></a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="button-container-mobile">
                <a href="become-member.php" class="btn btn-warning btn-sm">Become MGI Member</a>
                <a href="donation-sponsorship.php" class="btn btn-secondary btn-sm">Collaborate With Us</a>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="https://www.instagram.com/mutualgenerationintl2023?igsh=enN6emZ0ZjhzdjV1"><span class="fab fa-instagram"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

    <div class="nav-overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>
</header>
<!-- End Main Header -->
