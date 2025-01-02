<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'auth.php';

$a = 4;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include "title.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include "topbar.php"; ?>
  <?php include "sidebar.php"; ?>

  <?php
  // Handle delete request
  if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $query_delete = "DELETE FROM category WHERE id='$delete_id'";
    if (mysqli_query($con, $query_delete)) {
        echo "<script>alert('Deleted Successfully');</script>";
        echo "<script>window.location.href = 'add-category.php'</script>";
    } else {
        echo "<script>alert('Deletion Failed: " . mysqli_error($con) . "');</script>";
    }
  }

  // Handle edit request
  $edit = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
  if ($edit) {
    $resultt = mysqli_query($con, "SELECT * FROM category WHERE id=$edit");
    if (!$resultt) {
        die("Query Failed: " . mysqli_error($con));
    }
    $roww = mysqli_fetch_array($resultt);
    if (!$roww) {
        echo "<script>alert('No record found with ID $edit');</script>";
    }
  } else {
    $roww = ['cat_name' => ''];
  }

  // Handle form submission
  if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['cat_name']);

    if ($edit == 0) {
        $insertdata = mysqli_query($con, "INSERT INTO category(cat_name) VALUES('$name')");
        if (!$insertdata) {
            die("Insert Failed: " . mysqli_error($con));
        }
        echo "<script>alert('Added Successfully');</script>";
        echo "<script>window.location.href = 'add-category.php'</script>";
    } else {
        $updatedata = mysqli_query($con, "UPDATE category SET cat_name='$name' WHERE id=$edit");
        if (!$updatedata) {
            die("Update Failed: " . mysqli_error($con));
        }
        echo "<script>alert('Updated Successfully');</script>";
        echo "<script>window.location.href = 'add-category.php'</script>";
    }
  }

  // Fetch all categories
  $location = mysqli_query($con, "SELECT * FROM category");
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Add Blog Category</h1>
          </div>
          <div class="col-sm-3" style="text-align:right;">
            <a class=" btn btn-sm btn-outline-success " href="add-blog.php">
              <i class="fa fa-plus" aria-hidden="true"></i> Add Blogs
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-5">
          <form action="add-category.php<?php echo $edit ? '?edit=' . $edit : ''; ?>" method="post" enctype="multipart/form-data">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="form-group">
                  <label>Enter Category Name</label>
                  <input type="text" name="cat_name" value="<?php echo htmlspecialchars($roww['cat_name']); ?>" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <button type="submit" name="add" class="btn btn-block btn-primary btn-lg">Add</button>
            </div>
          </form>
        </div>
        <div class="col-md-7">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="form-group">
                  <label>All Categories</label>
                </div>
              </div>
              <div class="card-header">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($location_ft = mysqli_fetch_array($location)) { ?>
                      <tr>
                        <td><?php echo htmlspecialchars($location_ft['cat_name']); ?></td>
                        <td class="text-right py-0 align-middle">
                          <div class="btn-group btn-group-sm">
                            <a href="add-category.php?edit=<?php echo $location_ft['id']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="add-category.php?delete_id=<?php echo $location_ft['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
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
<script src="dist/js/demo.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote();
  })
</script>
</body>
</html>
