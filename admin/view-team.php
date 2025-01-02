<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
$a = 6; // This variable is for setting active state in the sidebar
// Include necessary files
include 'conn.php';
include 'auth.php';

// Check if a delete request is made
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id']; // Cast to int for safety

    // Delete the team member from the database
    $deleteQuery = "DELETE FROM team WHERE id = $delete_id";
    if (mysqli_query($con, $deleteQuery)) {
        $message = "<div class='alert alert-success'>Team member deleted successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Failed to delete the team member.</div>";
    }
}

// Fetch all team members from the database
$query = "SELECT * FROM team ORDER BY title_level ASC";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Team Members</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <!-- Navbar -->
    <?php include 'topbar.php'; ?>
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>View Team Members</h1>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($message)) { echo $message; } ?> <!-- Display message -->
                    
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Team Members</h3>
                            <a href="add-team.php" class="btn btn-success float-end"><i class="fa fa-plus"></i> Add New Member</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title Level</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Facebook</th>
                                        <th>Twitter</th>
                                        <th>Instagram</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($result) > 0) { // Check if any records were fetched
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['title_level']); ?></td>
                                                <td>
                                                    <img src="images/team/<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['alt_text']); ?>" class="img-fluid" style="max-width: 100px;">
                                                </td>
                                                <td><?php echo htmlspecialchars($row['member_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['designation']); ?></td>
                                                <td>
                                                    <?php if ($row['facebook_link']) { ?>
                                                        <a href="<?php echo htmlspecialchars($row['facebook_link']); ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-facebook"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['twitter_link']) { ?>
                                                        <a href="<?php echo htmlspecialchars($row['twitter_link']); ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-twitter"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['instagram_link']) { ?>
                                                        <a href="<?php echo htmlspecialchars($row['instagram_link']); ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-instagram"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="edit-team.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="view-team.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?');"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php } 
                                    } else { // If no members are found
                                        echo "<tr><td colspan='8' class='text-center'>No team members found.</td></tr>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
