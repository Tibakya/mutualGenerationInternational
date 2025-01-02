<?php
include 'conn.php'; // Include your database connection
session_start();

// Initialize variables
$error_message = "";
$success_message = "";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    if (isset($_POST['submit'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate password inputs
        if (empty($new_password) || empty($confirm_password)) {
            $error_message = "All fields are required.";
        } elseif ($new_password !== $confirm_password) {
            $error_message = "New password and confirm password do not match.";
        } elseif (strlen($new_password) < 6) {
            $error_message = "New password must be at least 6 characters.";
        } else {
            // Update the password in the database
            $stmt = $con->prepare("SELECT email FROM password_resets WHERE token = ?");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $email = $user['email'];

                // Hash new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $con->prepare("UPDATE admin SET ad_password = ? WHERE ad_email = ?");
                $stmt->bind_param("ss", $hashed_new_password, $email);
                $stmt->execute();

                // Delete token
                $stmt = $con->prepare("DELETE FROM password_resets WHERE token = ?");
                $stmt->bind_param("s", $token);
                $stmt->execute();

                $success_message = "Password changed successfully. You can now log in.";
            } else {
                $error_message = "Invalid token.";
            }
            $stmt->close();
        }
    }
} else {
    $error_message = "Token not provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Reset</b> Password</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your new password</p>

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
            <button type="submit" name="submit" class="btn btn-primary btn-block">Reset Password</button>
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
