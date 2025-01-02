<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php';
include 'auth.php';

$a = 6;

if (isset($_GET['delete_id'])) {
    $del = intval($_GET['delete_id']);
    $selectdelete = mysqli_prepare($con, "SELECT img FROM testimonials WHERE id = ?");
    mysqli_stmt_bind_param($selectdelete, "i", $del);
    mysqli_stmt_execute($selectdelete);
    mysqli_stmt_bind_result($selectdelete, $img);
    mysqli_stmt_fetch($selectdelete);
    mysqli_stmt_close($selectdelete);
    
    $path = 'images/testimonial/';
    $file_path = $path . $img;
    
    if (file_exists($file_path) && unlink($file_path)) {
        $delete_query = "DELETE FROM testimonials WHERE id = ?";
        $delete_stmt = mysqli_prepare($con, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "i", $del);
        mysqli_stmt_execute($delete_stmt);
        mysqli_stmt_close($delete_stmt);
        
        echo "<script>alert('Deleted Successfully');</script>
              <script>window.location.href = 'view-testimonials.php'</script>";
    } else {
        echo "<script>alert('Error deleting file');</script>
              <script>window.location.href = 'view-testimonials.php'</script>";
    }
}

$limit = 10;
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$serial = ($page - 1) * $limit;

$resultt = mysqli_query($con, "SELECT * FROM testimonials ORDER BY id DESC LIMIT $serial, $limit");
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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include "topbar.php"; ?>
        <?php include "sidebar.php"; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>All Testimonials</h1>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <a class="btn btn-primary" href="add-testimonials.php"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">View</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Img</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($roww = mysqli_fetch_array($resultt, MYSQLI_ASSOC)) { ?>
                                            <tr>
                                                <td><img style="width:80px;" src="images/testimonial/<?php echo htmlspecialchars($roww["img"]); ?>"></td>
                                                <td><?php echo htmlspecialchars($roww["title"]); ?></td>
                                                <td><?php echo htmlspecialchars($roww["designation"]); ?></td>
                                                <td><?php echo htmlspecialchars(substr(strip_tags($roww['descrip']), 0, 600)); ?>..</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="add-testimonials.php?edit=<?php echo $roww["id"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="view-testimonials.php?delete_id=<?php echo $roww["id"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            $result_db = mysqli_query($con, "SELECT COUNT(id) FROM testimonials");
                            $row_db = mysqli_fetch_row($result_db);
                            $total_records = $row_db[0];
                            $total_pages = ceil($total_records / $limit);

                            echo '<ul class="pagination">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item'><a class='page-link' href='view-testimonials.php?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            echo '</ul>';
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include "footer.php"; ?>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
