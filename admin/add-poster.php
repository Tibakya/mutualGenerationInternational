<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';
include 'auth.php';

$a = 5; // Set the active page for the poster section
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Poster</title>
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
  $today = date("Y-m-d");
  $edit = isset($_GET['edit']) ? intval($_GET['edit']) : 0;

  // Fetch existing data if editing
  if ($edit) {
      $resultt = mysqli_query($con, "SELECT * FROM posters WHERE id=$edit");
      if (!$resultt) {
          die("Query Failed: " . mysqli_error($con));
      }
      $roww = mysqli_fetch_array($resultt);

      if (!$roww) {
          echo "<script>alert('No record found with ID $edit');</script>";
      }
  } else {
      $roww = ['title' => '', 'location' => '', 'short' => '', 'img' => '', 'date' => $today];
  }

  if (isset($_POST['publise'])) {
      $title1 = $_POST['title'];
      $title2 = str_replace("'", "\'", $title1);
      $title = str_replace("&", "\and", $title2);
      $short1 = $_POST['short'];

      // Limit the 'short' text to 1500 characters
      $short = substr($short1, 0, 1500);

      $location1 = $_POST['location'];
      $location = str_replace("'", "\'", $location1);
      $date = $_POST['date'];

      // Handle image upload
      if ($_FILES['lis_img']['name'] != '') {
          $lis_img = rand() . $_FILES['lis_img']['name'];
          $tempname = $_FILES['lis_img']['tmp_name'];
          $folder = "images/posters/" . $lis_img;
          if (move_uploaded_file($tempname, $folder)) {
              echo '<div class="container custom-alert-box" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Image uploaded successfully
                      </div>
                  </div>';
          } else {
              echo '<div class="container custom-alert-box" style="position: fixed; top: 20px; left: 20px; z-index: 9999;">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Image upload failed
                      </div>
                  </div>';
          }
      } else {
          $lis_img = $roww["img"];
      }

      // Insert or update data in the posters table
      if ($edit == 0) {
          // Using prepared statement for insertion
          $stmt = $con->prepare("INSERT INTO posters (title, location, short, img, date, status) VALUES (?, ?, ?, ?, ?, ?)");
          $status = 0; // Default status

          // Bind parameters
          $stmt->bind_param("sssssi", $title, $location, $short, $lis_img, $date, $status);

          // Execute the statement
          if ($stmt->execute()) {
              echo "<script>alert('Poster added successfully');</script>";
              echo "<script>window.location.href = 'add-poster.php'</script>";
          } else {
              echo "Error: " . $stmt->error;
          }
          $stmt->close();
      } else {
          // Using prepared statement for updating
          $stmt = $con->prepare("UPDATE posters SET title=?, location=?, short=?, img=?, date=? WHERE id=?");
          
          // Bind parameters
          $stmt->bind_param("sssssi", $title, $location, $short, $lis_img, $date, $edit);

          // Execute the statement
          if ($stmt->execute()) {
              echo "<script>alert('Updated Successfully');</script>";
              echo "<script>window.location.href = 'view-poster.php'</script>";
          } else {
              echo "Error: " . $stmt->error;
          }
          $stmt->close();
      }
  }
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-6">
            <h1>Add Poster</h1>
          </div>
          <div class="col-lg-6">
            <a href="view-poster.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View Posters</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-10">
          <form action="add-poster.php?edit=<?php echo $edit; ?>" method="post" enctype="multipart/form-data">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="form-group">
                  <label>Title</label>
                  <input name="title" value="<?php echo htmlspecialchars($roww["title"]); ?>" type="text" class="form-control" placeholder="Enter Poster Title (Shortly)">
                </div>
                <div class="form-group">
                  <label>Event Location</label>
                  <input name="location" value="<?php echo htmlspecialchars($roww["location"]); ?>" type="text" class="form-control" placeholder="Enter Event e.g Dodoma HQ">
                </div>
              </div>
              <div class="card-body pad">
                <label>Short Description</label>
                <div class="mb-3">
                  <textarea name="short" placeholder="Short Description" style="width: 100%;" rows="5" cols="23"><?php echo htmlspecialchars($roww["short"]); ?></textarea>
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
                  <label>Event Date</label>
                  <input name="date" value="<?php echo htmlspecialchars($roww["date"]); ?>" type="date" class="form-control" placeholder="Enter Event Date ...">
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
