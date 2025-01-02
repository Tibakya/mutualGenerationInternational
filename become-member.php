<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Become a Member</title>

    <style>
        body {
            background-image: url('assets/images/background/bg24.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .form-section {
            padding: 30px 0;
        }
        .form-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
        }
        .form-card h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #28a745;
        }
        .form-control {
            border-radius: 20px;
            padding: 15px;
            transition: border-color 0.3s;
            min-height: 50px;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: none;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 15px 0;
            border-radius: 50px;
            transition: all 0.3s;
            font-size: 18px;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <?php include "header.php"; ?>
    <?php include "hidden_folder/hidden_sideBar.php"; ?>

    <section class="page-title" style="background-image: url(assets/images/gallery/bg-5.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Join MGI Community</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index">Home</a></li>
                        <li>MGI Members</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-card">
                        <h2 class="text-center">Become an MGI Member</h2>
                        <p class="text-center"><strong>Fill out the form below to join our community.</strong></p>
                        <form action="process_membership.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Are you a Student, Graduate, or Neither?</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="" disabled selected>Select your status</option>
                                    <option value="student">Mwanafunzi (Student)</option>
                                    <option value="graduate">Mhitimu (Graduate)</option>
                                    <option value="neither">Siyo Mwanafunzi (Neither)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="region">Region</label>
                                <input type="text" id="region" name="region" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="reason">Why do you want to be a member of MGI?</label>
                                <textarea id="reason" name="reason" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="profile_pic">Upload Profile Picture</label>
                                <input type="file" id="profile_pic" name="profile_pic" class="form-control-file" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-custom btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
