<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php';
session_start();

$error_message = ""; // Variable to hold error message

if (isset($_POST['submit'])) {
    $ad_email = $_POST['ad_email'];
    $ad_pass = $_POST['ad_pass'];

    // Validate email format
    if (!filter_var($ad_email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
    } else {
        // Prepare SQL statement
        $stmt = $con->prepare("SELECT * FROM admin WHERE ad_email = ?");
        $stmt->bind_param("s", $ad_email);
        
        $stmt->execute();
        $result = $stmt->get_result();
        $check_fetch = $result->fetch_assoc();

        if ($check_fetch && isset($check_fetch['ad_id']) && $check_fetch['ad_id'] != '') {
            // Verify the password
            if (password_verify($ad_pass, $check_fetch['ad_password'])) {
                // Set session variables
                $_SESSION['ad_id'] = $check_fetch['ad_id'];
                $_SESSION['role'] = $check_fetch['role']; 
                $_SESSION['ad_name'] = $check_fetch['ad_name']; 
                
                // Redirect based on user role
                if (isset($_SESSION['role'])) { 
                    switch ($_SESSION['role']) {
                        case 'super_admin':
                            header('Location: superadmin_dashboard.php');
                            break;
                        case 'editor':
                            header('Location: editor_dashboard.php');
                            break;
                        default:
                            header('Location: index.php');
                            break;
                    }
                    exit();
                }
            } else {
                $error_message = "Incorrect email or password";
            }
        } else {
            $error_message = "Incorrect email or password";
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
  <meta name="robots" content="noindex" />
  <title>Admin LogIn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>Login</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- Display error message styled within the login box -->
      <?php if ($error_message): ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error_message; ?>
          </div>
      <?php endif; ?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="ad_email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="ad_pass" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
        <div class="row pt-1">
          <div class="col-12 text-center">
            <div class="icheck-primary">
              <!-- <a href="forgot-password.php">Forgot Password</a> -->
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div>
  <div style="height:60px;  width:100%; margin-bottom: 0; padding-bottom:0; text-align: center;  padding-top: 20px;">
    Copyright &copy; <?php echo date("Y") ?> | Mutual Generation International | Designed by 
    <a target="blank" href="tel:+255 787 491 555">Native Technology <span class="pr-2">+255 787 491 555</span></a>. All rights
    reserved
  </div> 
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>