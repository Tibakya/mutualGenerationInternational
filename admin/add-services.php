<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'auth.php';

$a = 3;
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
  date_default_timezone_set('Asia/Kolkata');
  $today = date("D d M Y");
  $edit = isset($_GET['edit']) ? intval($_GET['edit']) : 0;

  if ($edit) {
      $resultt = mysqli_query($con, "SELECT * FROM services WHERE id=$edit");
      if (!$resultt) {
          die("Query Failed: " . mysqli_error($con));
      }
      $roww = mysqli_fetch_array($resultt);

      if (!$roww) {
          echo "<script>alert('No record found with ID $edit');</script>";
      }
  } else {
      $roww = ['title' => '', 'short' => '', 'descrip' => '', 'img' => ''];
  }

  if (isset($_POST['publise'])) {
      $title1 = $_POST['title'];
      $title2 = str_replace("'", "\'", $title1);
      $title = str_replace("&", "\and", $title2);
      $short1 = $_POST['short'];
      $short = str_replace("'", "\'", $short1);
      $descrip1 = $_POST['descrip'];
      $descrip = str_replace("'", "\'", $descrip1);
      $url = $_POST['url'];

      if ($_FILES['lis_img']['name'] != '') {
          $lis_img = rand() . $_FILES['lis_img']['name'];
          $tempname = $_FILES['lis_img']['tmp_name'];
          $folder = "images/services/" . $lis_img;
          move_uploaded_file($tempname, $folder);
      } else {
          $lis_img = $roww["img"];
      }

      if ($edit == 0) {
          $insertdata = mysqli_query($con, "INSERT INTO services (title, short, descrip, img, date, status) VALUES ('$title', '$short', '$descrip', '$lis_img', '$today', '0')");
          if (!$insertdata) {
              die("Insert Failed: " . mysqli_error($con));
          }
          echo "<script>alert('Posted Successfully');</script>";
          echo "<script>window.location.href = 'add-services.php'</script>";
      } else {
          $insertdata = mysqli_query($con, "UPDATE services SET title='$title', short='$short', descrip='$descrip', img='$lis_img', date='$today' WHERE id=$edit");
          if (!$insertdata) {
              die("Update Failed: " . mysqli_error($con));
          }
          echo "<script>alert('Updated Successfully');</script>";
          echo "<script>window.location.href = 'add-services.php'</script>";
      }
  }
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-6">
            <h1>Add Center</h1>
          </div>
          <div class="col-lg-6">
            <a href="view-services.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View Centers</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-10">
          <form action="add-services.php?edit=<?php echo $edit; ?>" method="post" enctype="multipart/form-data">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="form-group">
                  <label>Enter Center Name</label>
                  <input name="title" value="<?php echo htmlspecialchars($roww["title"]); ?>" type="text" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <div class="card-body pad">
                <label>What is The About (Short Description)</label>
                <div class="mb-3">
                  <textarea name="short" placeholder="Short Description" style="width: 100%;" rows="5" cols="23"><?php echo htmlspecialchars($roww["short"]); ?></textarea>
                </div>
              </div>
              <div class="card-body pad">
                <label>Full Center Description</label>
                <div class="mb-3">
                  <textarea name="descrip" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo htmlspecialchars($roww["descrip"]); ?></textarea>
                </div>
              </div>
              <div class="card-header">
                <div class="form-group">
                  <label for="exampleInputFile">Select Img<span style="color:red;">(only compressed)</span></label>
                  <p style="color:red;">img size 800px x 500px</p>
                  <input name="lis_img" type="file">
                  <?php echo htmlspecialchars($roww["img"]); ?>
                </div>
              </div>
              <div class="card-header">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <button type="submit" name="publise" class="btn btn-block btn-warning btn-lg">Post</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include "footer.php"; ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
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
