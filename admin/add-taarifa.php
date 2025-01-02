<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php';
include 'auth.php';

// Initialize variables
$title = '';
$title_details = '';
$date = '';
$time = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // Fetch the record from the database
    $result = mysqli_query($con, "SELECT * FROM taarifa WHERE id='$id'");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        // Ensure keys exist or set to default values
        $title = $row['title'] ?? '';
        $title_details = $row['title_details'] ?? '';
        $date = $row['date'] ?? '';
        $time = $row['time'] ?? '';
    } else {
        die("Error fetching record: " . mysqli_error($con));
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $title_details = $_POST['title_details'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';

    if (isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $query = "UPDATE taarifa SET title='$title', title_details='$title_details', date='$date', time='$time' WHERE id='$edit_id'";
    } else {
        $query = "INSERT INTO taarifa (title, title_details, date, time) VALUES ('$title', '$title_details', '$date', '$time')";
    }

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Saved Successfully');</script>";
        echo "<script>window.location.href = 'view-taarifa.php'</script>";
    } else {
        die("Error saving record: " . mysqli_error($con));
    }
}
$a = 2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <title>Add/Edit Taarifa</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "topbar.php"; ?>

        <!-- Main Sidebar Container -->
        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?php echo isset($_GET['edit']) ? 'Edit Taarifa' : 'Add Taarifa'; ?></h1>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <a class="btn btn-primary" href="view-taarifa.php">
                                <i class="fa fa-plus" aria-hidden="true"></i> View Taarifa
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">

                                <div class="card-header">

                                    <h3 class="card-title">Taarifa Form</h3>


                                </div>


                                <form method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="title_details">Title Details</label>
                                            <textarea name="title_details" class="form-control"
                                                required><?php echo htmlspecialchars($title_details, ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control"
                                                value="<?php echo htmlspecialchars($date, ENT_QUOTES, 'UTF-8'); ?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <input type="time" name="time" class="form-control"
                                                value="<?php echo htmlspecialchars($time, ENT_QUOTES, 'UTF-8'); ?>"
                                                required>
                                        </div>
                                        <?php if (isset($_GET['edit'])): ?>
                                        <input type="hidden" name="edit_id"
                                            value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <?php include "footer.php"; ?>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <!-- ./wrapper -->

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>