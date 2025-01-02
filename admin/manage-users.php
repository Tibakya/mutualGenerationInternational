<?php
session_start();
if (!isset($_SESSION['ad_id'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include 'conn.php';

// Check if the current user is a super admin
$is_super_admin = $_SESSION['role'] == 'super_admin';

// Fetch users data (for super admin view)
$users_sql = "SELECT ad_id, ad_name, ad_email, role, status FROM admin";
$users_result = $con->query($users_sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "title.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "topbar.php"; ?>
        <?php include "sidebar.php"; ?>

        <div class="content-wrapper">
            <!-- Super Admin User Management Section -->
            <?php if ($is_super_admin) { ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Manage Users</h3>
                            <a href="add-user.php" class="btn btn-primary float-right">Add User</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($users_result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $users_result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo htmlspecialchars($row['ad_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['ad_email']); ?></td>
                                                <td><?php echo htmlspecialchars($row['role']); ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 1) { ?>
                                                        <a href="toggle-status.php?id=<?php echo $row['ad_id']; ?>&status=0" class="btn btn-success btn-sm">Active</a>
                                                    <?php } else { ?>
                                                        <a href="toggle-status.php?id=<?php echo $row['ad_id']; ?>&status=1" class="btn btn-secondary btn-sm">Inactive</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="edit-user.php?id=<?php echo $row['ad_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="delete-user.php?id=<?php echo $row['ad_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                                </td>
                                            </tr>
                                        <?php $counter++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">No users found.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
        </div>

        <?php include "footer.php"; ?>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
