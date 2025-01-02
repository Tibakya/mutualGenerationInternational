<?php
include "admin/conn.php";

// Fetch gallery images
$gallery_images = mysqli_query($con, "SELECT * FROM gallery ORDER BY ID DESC LIMIT 21");

// Fetch sponsor images
$sponsor_images = mysqli_query($con, "SELECT * FROM partners");

// Fetch settings
$settings = mysqli_query($con, "SELECT * FROM settings");
$setting  = mysqli_fetch_array($settings);
?>


<style>
    .sponsors-widget .wrapper-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 5px;                    /* Default gap for larger screens */
    margin-top: 10px;
}

.sponsors-widget .sponsor-image {
    flex: 0 1 120px;
    text-align: center;
    max-width: 100%;
}

.sponsors-widget .sponsor-image img {
    max-width: 100px;
    height: auto;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.sponsors-widget .sponsor-image img:hover {
    transform: scale(4.00);
}

/* Tighter Responsive Styling */
@media (max-width: 768px) {
    .sponsors-widget .wrapper-box {
        gap: 7px;               /* Reduced gap for tablet screens */
    }

    .sponsors-widget .sponsor-image {
        flex: 0 1 80px;
    }

    .sponsors-widget .sponsor-image img {
        max-width: 70px;
    }
}

@media (max-width: 480px) {
    .sponsors-widget .wrapper-box {
        gap: 6px;               /* Minimal gap for small mobile screens */
    }

    .sponsors-widget .sponsor-image {
        flex: 0 1 60px;
    }

    .sponsors-widget .sponsor-image img {
        max-width: 60px;
    }
}

</style>

<!--Main Footer-->
<footer class="main-footer">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7924.199845566186!2d39.24219490136359!3d-6.757668466196675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4dd2ea6903b9%3A0x2ea6fefe6420d3b!2speakperformance!5e0!3m2!1sen!2stz!4v1727047496314!5m2!1sen!2stz"
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="upper-box">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget instagram-widget">
                        <h4 class="widget_title">Our Gallery</h4>
                        <div class="wrapper-box">
                            <?php while ($image = mysqli_fetch_assoc($gallery_images)) { ?>
                                <div class="image">
                                    <img src="admin/images/gallery/<?php echo $image['image_url']; ?>" alt="<?php echo htmlspecialchars($image['alt_text']); ?>">
                                    <div class="overlay-link">
                                        <a href="admin/images/gallery/<?php echo $image['image_url']; ?>" class="lightbox-image" data-fancybox="gallery">
                                            <span class="fa fa-plus"></span>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                     <div class="upper-box">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget contact-widget style-two">
                        <h4>Wasiliana Nasi</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="wrapper-box">
                                    <div class="icon-box">
                                        <div class="icon"><span class="flaticon-calling"></span></div>
                                        <div class="text"><strong>Phone</strong><a
                                                href="tel:<?php echo $setting['phone']; ?>"><?php echo $setting['phone']; ?></a>
                                        </div>
                                    </div>
                                    <div class="icon-box">
                                        <div class="icon"><span class="flaticon-mail"></span></div>
                                        <div class="text"><strong>Email</strong><a
                                                href="mailto:<?php echo $setting['email']; ?>"><?php echo $setting['email']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon-box">
                                    <h4 class="widget_title">Mitandao ya Kijamii</h4>
                                    <ul class="social-icon mt-2" style="font-size:40px;">
                                        <li><a href="https://www.instagram.com/mutualgenerationintl2023?igsh=enN6emZ0ZjhzdjV1"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget links-widget">
                                    <h4 class="widget_title">Useful Links</h4>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="https://www.kazi.go.tz">Wizara ya Kazi, Vijana, Ajira na Watu Wenye Ulemavu.</a></li>
                                            <li><a href="https://www.out.ac.tz/">Open University of Tanzania</a></li>
                                            <li><a href="events">Events</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 

                </div>
            </div>
        </div>
    </div>

                    <!-- Sponsors Section -->
                    <div class="widget sponsors-widget">
                        <h4 class="widget_title">Partners</h4>
                        <div class="wrapper-box">
                            <?php while ($sponsor = mysqli_fetch_assoc($sponsor_images)) { ?>
                                <div class="sponsor-image">
                                    <img src="admin/partners/<?php echo $sponsor['image_url']; ?>" alt="<?php echo htmlspecialchars($sponsor['alt_text']); ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Main Footer-->

<div class="footer-bottom">
    <div class="auto-container">
        <div class="row m-0 align-items-center justify-content-between">
            <div class="copyright-text">
                Copyright © <?php echo date('Y') ?> <?php echo $setting['site_name']; ?> |
                Designed By <a target="blank" href="tel:+255 787 491 555">Native Technology <span class="pr-2"> </span></a>
            </div>
            <div class="social-links-wrapper">
                <span class="pr-2"><a href="https://www.instagram.com/?utm_source=pwa_homescreen&__pwa=1"><span class="fab fa-instagram"></span></a></span>
                <span class="pr-2"><a href="https://web.facebook.com/profile.php?id=61555468395683"><span class="fab fa-facebook-f"></span></a></span>
            </div>
        </div>
    </div>
</div>
<!--End pagewrapper-->
