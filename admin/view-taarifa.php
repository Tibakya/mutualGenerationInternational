<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conn.php';
include 'auth.php';

// Handle deletion of taarifa
if (isset($_GET['delete_id'])) {
    $del = $_GET['delete_id'];
    $query_delete = "DELETE FROM taarifa WHERE id='$del'";
    if (mysqli_query($con, $query_delete)) {
        echo "<script>alert('Deleted Successfully');</script>";
        echo "<script>window.location.href = 'view-taarifa.php'</script>";
    } else {
        die("Delete Failed: " . mysqli_error($con));
    }
}

// Pagination setup
$limit = 10;  
$page = isset($_GET["page"]) ? $_GET["page"] : 1;  
$serial = ($page - 1) * $limit; 

// Fetch taarifa data with pagination
$resultt = mysqli_query($con, "SELECT * FROM taarifa ORDER BY id DESC LIMIT $serial, $limit");

// Check if there is any data in the result
$num_rows = mysqli_num_rows($resultt);

$a = 2;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include "title.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Custom CSS for Switch -->
  <style>
  .switch {
    position: relative;
    display: inline-block;
    width: 40px;  /* Decreased width */
    height: 20px; /* Decreased height */
}

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 16px; /* Decreased height */
    width: 16px;  /* Decreased width */
    left: 2px;    /* Adjusted for centering */
    bottom: 2px;  /* Adjusted for centering */
    background-color: white;
    transition: .4s;
  }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(20px);
    }

    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    /* Decrease the font size for the table */
    table {
        font-size: 12px; /* Adjust as needed */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include "topbar.php"; ?>
  <!-- Main Sidebar Container -->
  <?php include "sidebar.php"; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Taarifa</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a class="btn btn-primary" href="add-taarifa.php">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
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
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-responsive-sm ">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Display</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php  
                if ($num_rows > 0) {
                    $serial_number = $serial + 1; // Start serial number from 1
                    while ($roww = mysqli_fetch_array($resultt)) {  
                        // Limit the title and details to 5 words
                        $title = implode(' ', array_slice(explode(' ', $roww["title"]), 0, 5)); 
                        $details = implode(' ', array_slice(explode(' ', $roww["title_details"]), 0, 5)); 
                        ?> 
                        <tr>
                            <td><?php echo $serial_number++; ?></td>
                            <td><?php echo $title . (strlen($roww["title"]) > 50 ? '...' : ''); ?></td> <!-- Limited title -->
                            <td><?php echo $details . (strlen($roww["title_details"]) > 50 ? '...' : ''); ?></td> <!-- Limited details -->
                            <td><?php echo $roww["date"]; ?></td>
                            <td><?php echo $roww["time"]; ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="moving-text-toggle" data-id="<?php echo $roww['id']; ?>" <?php echo $roww['moving_text_display'] ? 'checked' : ''; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                <a href="add-taarifa.php?edit=<?php echo $roww["id"]; ?>" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="view-taarifa.php?delete_id=<?php echo $roww["id"]; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                              </div>
                            </td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No information available</td>";
                }
                ?>
                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <?php  
            if ($num_rows > 0) {
                $result_db = mysqli_query($con, "SELECT COUNT(id) FROM taarifa");
                $row_db = mysqli_fetch_row($result_db);  
                $total_records = $row_db[0];  
                $total_pages = ceil($total_records / $limit); 

                $pagLink = "<ul class='pagination'>";  
                for ($i=1; $i<=$total_pages; $i++) {
                  $pagLink .= "<li class='page-item'><a class='page-link' href='view-taarifa.php?page=".$i."'>".$i."</a></li>";	
                }
                echo $pagLink . "</ul>";  
            }
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

<!-- AJAX for Updating Display Status -->
<script>
$(document).ready(function() {
    $('.moving-text-toggle').change(function() {
        var id = $(this).data('id');
        var status = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: 'update_moving_text_status.php', // create this file
            type: 'POST',
            data: { id: id, status: status },
            success: function(response) {
                alert('Status updated successfully!');
            },
            error: function() {
                alert('Error updating status!');
            }
        });
    });
});
</script>
</body>
</html>
