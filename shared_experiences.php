<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "admin/conn.php";

// Fetch settings
$settings = mysqli_query($con, "SELECT * FROM settings");
$setting = mysqli_fetch_array($settings);

// Fetch member names from the database
$members = mysqli_query($con, "SELECT id, name FROM members");

// Fetch latest 6 posts
$stories = mysqli_query($con, "
    SELECT s.id, s.post_content, s.video_url, s.post_type, s.created_at, 
           m.name as author_name, m.profile_picture, m.region 
    FROM shared_experiences s 
    JOIN members m ON s.member_id = m.id 
    ORDER BY s.created_at DESC 
    LIMIT 6
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shared Experiences - <?php echo htmlspecialchars($setting['site_name']); ?></title>
    <meta name="description"
        content="MGI is a nonprofit, non-governmental organization, autonomous, non-religious, non-partisan, non-political organization and social organization.">

    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/experiences.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>
      <!-- Display success message if the post was successfully submitted -->
      <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
        <div class="alert alert-success" role="alert">
            Your post has been successfully submitted!
        </div>
    <?php } ?>

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
        <?php include "hidden_folder/hidden_sideBar.php"; ?>

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/success.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <h1>Success Stories</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Success Stories</li>
                    </ul>
                     <!-- Display success message if the post was successfully submitted -->
      <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
        <div class="alert alert-success" role="alert">
            Your post has been successfully submitted!
        </div>
    <?php } ?>

                </div>
            </div>
        </section>

        <div class="container">
            
            <header>
                <h1>Success Stories and Shared Experiences</h1>
                <p>Watch inspiring stories and read heartfelt messages from others.</p>

                <div class="actions">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#writePostModal">Write
                        Post</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadVideoModal">Upload
                        Video</button>
                </div>
            </header>

            <!-- Content Cards -->
            <section class="content-cards">
                <?php
    // Check if there are any stories
    if (mysqli_num_rows($stories) > 0) {
        while ($story = mysqli_fetch_assoc($stories)) {
            if ($story['post_type'] == 'text') { ?>
                <div class="content-card text-card">
                    <p><i><?php echo date('M d, Y, h:i A', strtotime($story['created_at'])); ?></i></p>
                    <p>"<?php echo nl2br(htmlspecialchars($story['post_content'] ?? 'No content available')); ?>"</p>
                    <div class="name-container">
                        <img src="admin/profilePics/<?php echo file_exists('admin/profilePics/' . $story['profile_picture']) ? htmlspecialchars($story['profile_picture']) : 'default.jpg'; ?>"
                            alt="Profile Picture">
                        <div>
                            <h3><?php echo htmlspecialchars($story['author_name']); ?></h3>
                            <h6><?php echo htmlspecialchars($story['region'] ?? 'Unknown Region'); ?></h6>
                        </div>
                    </div>
                </div>
                <?php } elseif ($story['post_type'] == 'video') { ?>
                <div class="content-card">
                    <video controls>
                        <source src="<?php echo htmlspecialchars($story['video_url'] ?? '#'); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="card-info">
                        <h3><?php echo htmlspecialchars($story['author_name']); ?></h3>
                        <p><?php echo htmlspecialchars($story['region'] ?? 'Unknown Region'); ?></p>
                        <p><i><?php echo date('M d, Y, h:i A', strtotime($story['created_at'])); ?></i></p>
                    </div>
                </div>
                <?php }
        }
    } else {
        // If no stories are found, display a message
        echo '<div class="no-stories-message" style="text-align: center; font-size: 18px; color: red; margin-top: 20px;">No success stories have been posted yet. Be the first to share your story!</div>';
    }
    ?>
            </section>

            <div class="text-center">
                <a href="show_more_stories.php" class="btn btn-secondary">Show More Stories</a>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <p class="text-center">
                    Designed and Developed by <a href="tel:+255743331626">Native Technology</a>
                </p>
            </div>
        </footer>

        <!-- Write Post Modal -->
        <div class="modal fade" id="writePostModal" tabindex="-1" aria-labelledby="writePostModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="writePostModalLabel">Write Your Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="submit_text_post.php" method="post">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="postContent" class="form-label">Your Story</label>
                                <textarea name="postContent" class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Video Modal -->
        <div class="modal fade" id="uploadVideoModal" tabindex="-1" aria-labelledby="uploadVideoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadVideoModalLabel">Upload Your Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="submit_video_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="videoFile" class="form-label">Video File</label>
                                <input type="file" name="videoFile" accept="video/*" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Video</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
        <!-- Bootstrap JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>