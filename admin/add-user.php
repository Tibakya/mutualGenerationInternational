<?php
session_start();
if (!isset($_SESSION['ad_id'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include 'conn.php'; // Ensure this path is correct

// Check if the current user is a super admin
$is_super_admin = $_SESSION['role'] == 'super_admin';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';
    $status = $_POST['status'] ?? 'active'; // Default status is active

    // Simple validation
    if (empty($name) || empty($email) || empty($role) || empty($password)) {
        $error_message = "All fields are required.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $con->prepare('INSERT INTO admin (ad_name, ad_email, ad_password, role, status) VALUES (?, ?, ?, ?, ?)');
        // Check if the statement was prepared successfully
        if ($stmt === false) {
            $error_message = "Failed to prepare the SQL statement: " . $con->error;
        } else {
            // Bind the parameters
            $stmt->bind_param("sssss", $name, $email, $hashed_password, $role, $status);

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: superadmin_dashboard.php?user_added=success");
                exit();
            } else {
                $error_message = "Error adding user: " . $stmt->error;
            }
        }
        $stmt->close(); // Close the statement
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add User - Super Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include "topbar.php"; ?>
        <?php include "sidebar.php"; ?>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h3 class="card-title">Add New User</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($error_message)): ?>
                                    <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?>
                                    </div>
                                    <?php endif; ?>

                                    <form action="add-user.php" method="POST">
                                        <div class="form-group">
                                            <label for="name">Username:</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role:</label>
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="super_admin">Super Admin</option>
                                                <option value="admin">Admin</option>
                                                <option value="editor">Editor</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                        <a href="superadmin_dashboard.php" class="btn btn-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include "footer.php"; ?>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>