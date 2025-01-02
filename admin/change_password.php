<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php'; // Include your database connection
session_start();

// Initialize variables
$error_message = "";
$success_message = "";

if (!isset($_SESSION['ad_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password inputs
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif ($new_password !== $confirm_password) {
        $error_message = "New password and confirm password do not match.";
    } elseif (strlen($new_password) < 6) { // Minimum length check
        $error_message = "New password must be at least 6 characters.";
    } else {
        // Fetch current user's password
        $ad_id = $_SESSION['ad_id'];
        $stmt = $con->prepare("SELECT ad_password FROM admin WHERE ad_id = ?");
        $stmt->bind_param("i", $ad_id); // "i" indicates an integer parameter
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($current_password, $user['ad_password'])) {
            // If current password is correct, hash the new password and update in database
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $con->prepare("UPDATE admin SET ad_password = ? WHERE ad_id = ?");
            $update_stmt->bind_param("si", $hashed_new_password, $ad_id);
            $update_stmt->execute();

            if ($update_stmt->affected_rows > 0) {
                $success_message = "Password changed successfully.";
            } else {
                $error_message = "Password change failed. Please try again.";
            }
            $update_stmt->close();
        } else {
            $error_message = "Current password is incorrect.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Change</b> Password</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Change your password</p>

      <!-- Display error message -->
      <?php if ($error_message): ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error_message; ?>
          </div>
      <?php endif; ?>

      <!-- Display success message -->
      <?php if ($success_message): ?>
          <div class="alert alert-success" role="alert">
              <?php echo $success_message; ?>
          </div>
      <?php endif; ?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="password" name="current_password" class="form-control" placeholder="Current Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Change Password</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
