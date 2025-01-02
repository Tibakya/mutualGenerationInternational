<?php 
// Include the database connection
include "conn.php"; // Ensure this file contains the connection code

// Fetch settings from the database
$query = "SELECT * FROM settings WHERE id = 1";
$result = mysqli_query($con, $query);

if ($result) {
    $settings = mysqli_fetch_assoc($result);
    
    // Check if settings were found
    if ($settings) {
        // Assign variables from the settings array with null coalescing
        $headerLogo = $settings['header_logo'] ?? '';
        $email = $settings['email'] ?? '';
        $phone = $settings['phone'] ?? '';
        $phone2 = $settings['phone2'] ?? '';
        $footerLogo = $settings['footer_logo'] ?? '';
        $facebook = $settings['facebook'] ?? '';
        $twitter = $settings['twitter'] ?? '';
        $linkedin = $settings['linkedin'] ?? '';
        $instagram = $settings['instagram'] ?? '';
        $youtube = $settings['youtube'] ?? '';
        $address = $settings['address'] ?? '';
        $map = $settings['map'] ?? '';
        $siteName = $settings['site_name'] ?? '';
    } else {
        // Default values if no settings found
        $headerLogo = $email = $phone = $phone2 = $footerLogo = $facebook = $twitter = $linkedin = $instagram = $youtube = $address = $map = $siteName = '';
    }
} else {
    die("Error fetching settings: " . mysqli_error($con));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $headerLogo = $_POST['header_logo'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $phone2 = $_POST['phone2'] ?? '';
    $footerLogo = $_POST['footer_logo'] ?? '';
    $facebook = $_POST['facebook'] ?? '';
    $twitter = $_POST['twitter'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';
    $instagram = $_POST['instagram'] ?? '';
    $youtube = $_POST['youtube'] ?? '';
    $address = $_POST['address'] ?? '';
    $map = $_POST['map'] ?? '';
    $siteName = $_POST['site_name'] ?? '';

    // Validate required fields (you can add more validation as needed)
    $errors = [];
    if (empty($siteName)) {
        $errors[] = "Site Name is required.";
    }

    // If no errors, proceed to update the database
    if (empty($errors)) {
        $stmt = $con->prepare("UPDATE settings SET header_logo=?, email=?, phone=?, phone2=?, footer_logo=?, facebook=?, twitter=?, linkedin=?, instagram=?, youtube=?, address=?, map=?, site_name=? WHERE id=1");
        $stmt->bind_param("sssssssssssss", $headerLogo, $email, $phone, $phone2, $footerLogo, $facebook, $twitter, $linkedin, $instagram, $youtube, $address, $map, $siteName);

        if ($stmt->execute()) {
            $successMessage = "Settings updated successfully!";
        } else {
            $errorMessage = "Error updating settings: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Website Settings</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f4f6f9;
        }
        .form-container {
            padding: 40px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-left: 30px;
        }
        .user-info-container {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .form-actions {
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
        }
        .success-message {
            color: green;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include "topbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <div class="container-fluid" style="padding-left: 15px; padding-right: 15px;">
        <div class="row">
            <div class="col-md-8 col-lg-6 form-container">
                <h1>Settings</h1>
                
                <?php if (!empty($successMessage)) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($successMessage); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif (!empty($errorMessage)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($errorMessage); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="error-message">
                        <?php foreach ($errors as $error) {
                            echo htmlspecialchars($error) . "<br>";
                        } ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="form-group">
                        <label for="header_logo">Header Logo</label>
                        <input type="text" class="form-control" name="header_logo" value="<?php echo htmlspecialchars($headerLogo); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone2">Phone 2</label>
                        <input type="text" class="form-control" name="phone2" value="<?php echo htmlspecialchars($phone2); ?>">
                    </div>
                    <div class="form-group">
                        <label for="footer_logo">Footer Logo</label>
                        <input type="text" class="form-control" name="footer_logo" value="<?php echo htmlspecialchars($footerLogo); ?>">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="<?php echo htmlspecialchars($facebook); ?>">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="<?php echo htmlspecialchars($twitter); ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" class="form-control" name="linkedin" value="<?php echo htmlspecialchars($linkedin); ?>">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="<?php echo htmlspecialchars($instagram); ?>">
                    </div>
                    <div class="form-group">
                        <label for="youtube">YouTube</label>
                        <input type="text" class="form-control" name="youtube" value="<?php echo htmlspecialchars($youtube); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>">
                    </div>
                    <div class="form-group">
                        <label for="map">Map URL</label>
                        <input type="text" class="form-control" name="map" value="<?php echo htmlspecialchars($map); ?>">
                    </div>
                    <div class="form-group">
                        <label for="site_name">Site Name</label>
                        <input type="text" class="form-control" name="site_name" value="<?php echo htmlspecialchars($siteName); ?>">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn">Update Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Links -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
