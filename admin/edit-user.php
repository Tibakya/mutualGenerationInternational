<?php
session_start();
if (!isset($_SESSION['ad_id'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include 'conn.php';

// Get the user ID from the query string
$user_id = $_GET['id'] ?? 0;

// Fetch the user details from the database
$stmt = $con->prepare('SELECT * FROM admin WHERE ad_id = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    $status = $_POST['status'] ?? 'active'; // Default status is active

    // Simple validation
    if (empty($name) || empty($email) || empty($role)) {
        $error_message = "All fields are required.";
    } else {
        // Prepare the update statement
        $stmt = $con->prepare('UPDATE admin SET ad_name = ?, ad_email = ?, role = ?, status = ? WHERE ad_id = ?');
        $stmt->bind_param("ssssi", $name, $email, $role, $status, $user_id);

        if ($stmt->execute()) {
            header("Location: superadmin_dashboard.php?user_updated=success");
            exit();
        } else {
            $error_message = "Error updating user: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit User - Super Admin Dashboard</title>
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
                                    <h3 class="card-title">Edit User</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($error_message)): ?>
                                    <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
                                    <?php endif; ?>

                                    <form action="edit-user.php?id=<?php echo htmlspecialchars($user_id); ?>" method="POST">
                                        <div class="form-group">
                                            <label for="name">Username:</label>
                                            <input type="text" name="name" id="name" class="form-control" 
                                                   value="<?php echo htmlspecialchars($user['ad_name']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" 
                                                   value="<?php echo htmlspecialchars($user['ad_email']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role:</label>
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="super_admin" <?php echo ($user['role'] == 'super_admin') ? 'selected' : ''; ?>>Super Admin</option>
                                                <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                <option value="editor" <?php echo ($user['role'] == 'editor') ? 'selected' : ''; ?>>Editor</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="active" <?php echo ($user['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                                <option value="inactive" <?php echo ($user['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update User</button>
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
