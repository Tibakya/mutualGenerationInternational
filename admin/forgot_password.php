<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php'; // Include your database connection
session_start();

// Initialize variables
$error_message = "";
$success_message = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Validate email
    if (empty($email)) {
        $error_message = "Email is required.";
    } else {
        // Check if the email exists in the database
        $stmt = $con->prepare("SELECT ad_id FROM admin WHERE ad_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Email exists, generate a unique token
            $token = bin2hex(random_bytes(50));
            $stmt = $con->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $token);
            $stmt->execute();

            // Send reset email
            $reset_link = "http://yourdomain.com/reset_password.php?token=" . $token; // Change to your domain
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $reset_link";
            mail($email, $subject, $message); // Simple mail function, consider using PHPMailer for production

            $success_message = "Password reset link has been sent to your email.";
        } else {
            $error_message = "Email not found.";
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
  <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Forgot</b> Password</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your email to reset your password</p>

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
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Send Reset Link</button>
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
