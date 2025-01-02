<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <style>
        body {
            background-image: url('assets/images/gallery/bg-5.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .form-section {
            padding: 80px 0;
        }
        .form-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 15px 35px rgba(0, 0, 0, 0.15);
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
            height: 70px;
            transition: border-color 0.3s;
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
        .section-title {
            color: white;
            text-align: center;
            margin-bottom: 40px;
            font-size: 24px;
            font-weight: bold;
        }
        .form-card p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555;
        }
        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #555;
        }
    </style>

    <title>Donations, Sponsorship & Partnership</title>
</head>
<body>

    <section class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-card">
                        <h2 class="text-center">Donations, Sponsorship & Partnership</h2>
                        <p class="text-center">Fill out the form below to collaborate with us.</p>
                        <form action="process_donation.php" method="POST">
                            <div class="form-group">
                                <label for="org_name">Name of Organisation/Individual</label>
                                <input type="text" id="org_name" name="org_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contacts</label>
                                <input type="text" id="contact" name="contact" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="collaboration_type">Collaboration Type</label>
                                <select id="collaboration_type" name="collaboration_type" class="form-control" required>
                                    <option value="Donor">Donor</option>
                                    <option value="Partner">Partner</option>
                                    <option value="Sponsor">Sponsor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="collab_areas">Areas of Collaboration</label>
                                <textarea id="collab_areas" name="collab_areas" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-custom btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
