<?php
session_start();
if (!isset($_SESSION['ad_id'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include 'conn.php';

// Check if the current user is a super admin
$is_super_admin = isset($_SESSION['role']) && $_SESSION['role'] == 'super_admin';

// Fetch data for members, collaborations, and users
$members_sql = "SELECT * FROM members ORDER BY submission_date DESC LIMIT 10";
$members_result = $con->query($members_sql);

$collab_sql = "SELECT * FROM collaborations ORDER BY submitted_at DESC LIMIT 10";
$collab_result = $con->query($collab_sql);

$users_sql = "SELECT ad_id, ad_name, ad_email, role, status FROM admin";
$users_result = $con->query($users_sql);

// Count users, members, and collaborations
$total_users_sql = "SELECT COUNT(*) as total FROM admin";
$total_users_result = $con->query($total_users_sql);
$total_users_count = $total_users_result->fetch_assoc()['total'];

$total_members_sql = "SELECT COUNT(*) as total FROM members";
$total_members_result = $con->query($total_members_sql);
$total_members_count = $total_members_result->fetch_assoc()['total'];

$total_collaborations_sql = "SELECT COUNT(*) as total FROM collaborations";
$total_collaborations_result = $con->query($total_collaborations_sql);
$total_collaborations_count = $total_collaborations_result->fetch_assoc()['total'];

// Toggle status
if (isset($_GET['toggle_status'])) {
    $id = $_GET['toggle_status'];
    $status_query = "SELECT status FROM admin WHERE ad_id = ?";
    $stmt = $con->prepare($status_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $status_result = $stmt->get_result()->fetch_assoc();

    $new_status = ($status_result['status'] === 'active') ? 'inactive' : 'active';
    $update_status_query = "UPDATE admin SET status = ? WHERE ad_id = ?";
    $stmt = $con->prepare($update_status_query);
    $stmt->bind_param("si", $new_status, $id);
    $stmt->execute();
    header("Location: superadmin_dashboard.php");
    exit();
}

// Delete admin user
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM admin WHERE ad_id = ?";
    $stmt = $con->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: superadmin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Super Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <style>
        /* General table styling */
        .table thead th,
        .table tbody td {
            font-size: 1rem;
            padding: 0.4rem;
        }

        /* Make buttons smaller */
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }

        /* Smaller font sizes and spacing for mobile view */
        @media (max-width: 576px) {
            .card-title {
                font-size: 1rem;
            }

            .table-responsive {
                font-size: 0.5rem;
            }

            .table thead th,
            .table tbody td {
                font-size: 0.6rem;
            }
        }

        /* Custom styling for the tabbed interface */
        .nav-tabs {
            border-bottom: 2px solid #ddd;
        }

        .nav-tabs .nav-item {
            margin-bottom: -1px;
        }

        .nav-tabs .nav-link {
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 5px 5px 0 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff #007bff #f8f9fa;
        }

        .nav-tabs .nav-link:hover {
            background-color: #e9ecef;
            color: #007bff;
        }

        /* Make tab buttons visually separated */
        .nav-tabs .nav-item:not(:last-child) .nav-link {
            margin-right: 4px;
        }

        /* Dashboard Styling */
        .dashboard-container h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }

        /* Analytics Cards */
        .card {
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        /*.card:hover {*/
        /*    transform: translateY(-5px);*/
        /*    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);*/
        /*}*/

        .card .card-header {
            font-size: 1.1rem;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.1);
            border-bottom: none;
        }

        .card .card-body h3 {
            font-size: 2rem;
        }

        /* Tabs Styling */
        .nav-tabs .nav-item .nav-link {
            font-weight: bold;
            color: #007bff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .nav-tabs .nav-item .nav-link:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .nav-tabs .nav-item .nav-link.active {
            color: #fff;
            background-color: #007bff;
            font-weight: bold;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container h1 {
                font-size: 1.8rem;
            }

            .card .card-body h3 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include "topbar.php"; ?>
        <?php include "sidebar.php"; ?>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="mt-4">Dashboard</h1>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-info text-white">
                                        <div class="card-header">Total Admins</div>
                                        <div class="card-body">
                                            <h3 class="card-title"><?php echo $total_users_count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-success text-white">
                                        <div class="card-header">Total Members</div>
                                        <div class="card-body">
                                            <h3 class="card-title"><?php echo $total_members_count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-warning text-white">
                                        <div class="card-header">Total Collaborations</div>
                                        <div class="card-body">
                                            <h3 class="card-title"><?php echo $total_collaborations_count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tabbed Interface -->
                            <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active" id="user-management-tab" data-toggle="tab"
                                        href="#user-management" role="tab" aria-controls="user-management"
                                        aria-selected="true">Admins</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="member-submissions-tab" data-toggle="tab"
                                        href="#member-submissions" role="tab" aria-controls="member-submissions"
                                        aria-selected="false">Members</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="collaborations-tab" data-toggle="tab" href="#collaborations"
                                        role="tab" aria-controls="collaborations" aria-selected="false">Donors</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="dashboardTabsContent">
                                <!-- User Management Tab -->
                                <div class="tab-pane fade show active" id="user-management" role="tabpanel"
                                    aria-labelledby="user-management-tab">
                                    <?php if ($is_super_admin) { ?>
                                    <div class="card mt-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title mb-0">Manage Users</h3>
                                            <a href="add-user.php" class="btn btn-primary btn-sm ml-auto">Add User</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
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
                                                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                                                            <td>
                                                                <!-- Dropdown button -->
                                                                <div class="dropdown">
                                                                    <button
                                                                        class="btn btn-secondary btn-sm dropdown-toggle"
                                                                        type="button"
                                                                        id="dropdownMenuButton<?php echo $row['ad_id']; ?>"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        <!-- Font Awesome icon for the three-dot menu -->
                                                                    </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton<?php echo $row['ad_id']; ?>">
                                                                        <a class="dropdown-item"
                                                                            href="edit-user.php?id=<?php echo $row['ad_id']; ?>">Edit</a>
                                                                        <a class="dropdown-item text-danger"
                                                                            href="superadmin_dashboard.php?delete_id=<?php echo $row['ad_id']; ?>"
                                                                            onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                                                        <a class="dropdown-item"
                                                                            href="superadmin_dashboard.php?toggle_status=<?php echo $row['ad_id']; ?>">
                                                                            <?= ($row['status'] === 'active') ? 'Deactivate' : 'Activate' ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php $counter++;
                            }
                        } else { ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center text-danger">No users
                                                                found.</td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>


                                <!-- Member Submissions Tab -->
                                <div class="tab-pane fade" id="member-submissions" role="tabpanel"
                                    aria-labelledby="member-submissions-tab">
                                    <div class="card mt-4">

                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title mb-0">Members Submissions</h3>
                                            <a href="#" class="btn btn-primary btn-sm ml-auto" data-toggle="modal"
                                                data-target="#downloadMembersModal">Export</a>
                                        </div>

                                        <div class="card-body">
                                            <!-- Members Download Modal -->
                                            <div class="modal fade" id="downloadMembersModal" tabindex="-1"
                                                role="dialog" aria-labelledby="downloadMembersModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="downloadMembersModalLabel">
                                                                Download Members</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="export_members.php" method="POST">
                                                            <div class="modal-body">
                                                                <label for="membersFormat">Select Format:</label>
                                                                <select name="format" id="membersFormat"
                                                                    class="form-control">
                                                                    <option value="excel">Excel</option>
                                                                    <option value="pdf">PDF</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Download</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="members-table" class="table table-striped table-responsive-sm">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Status</th>
                                                        <th>Phone</th>
                                                        <th>Country</th>
                                                        <th>Region</th>
                                                        <th>City</th>
                                                        <th>Reason</th>
                                                        <th>Submitted At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($members_result->num_rows > 0) {
                                                        $counter = 1;
                                                        while ($row = $members_result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['country']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['region']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['city']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['reason']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['submission_date']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php $counter++;
                                                        }
                                                    } else { ?>
                                                    <tr>
                                                        <td colspan="10" class="text-center text-danger">No members
                                                            submissions found.</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Collaborations Tab -->
                                <div class="tab-pane fade" id="collaborations" role="tabpanel"
                                    aria-labelledby="collaborations-tab">
                                    <div class="card mt-4">



                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title mb-0">Collaborations Submissions</h3>
                                            <a href="#" class="btn btn-primary btn-sm ml-auto " data-toggle="modal"
                                                data-target="#downloadCollabModal">Export</a>

                                        </div>
                                        <div class="card-body">
                                            <!-- Collaborations Download Modal -->
                                            <div class="modal fade" id="downloadCollabModal" tabindex="-1" role="dialog"
                                                aria-labelledby="downloadCollabModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="downloadCollabModalLabel">
                                                                Download Collaborations</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="export_collaborations.php" method="POST">
                                                            <div class="modal-body">
                                                                <label for="collabFormat">Select Format:</label>
                                                                <select name="format" id="collabFormat"
                                                                    class="form-control">
                                                                    <option value="excel">Excel</option>
                                                                    <option value="pdf">PDF</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Download</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                             <table id="donors-table" class="table table-striped table-responsive-sm">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Organization Name</th>
                                                        <th>Contact Person</th>
                                                        <th>Collaboration</th>
                                                        <th>Area</th>
                                                        <th>Submission Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($collab_result->num_rows > 0) {
                                                        $counter = 1;
                                                        while ($row = $collab_result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo htmlspecialchars($row['org_name']); ?>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($row['contact']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['collaboration_type']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['collab_areas']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
                                                    </tr>
                                                    <?php $counter++;
                                                        }
                                                    } else { ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center text-danger">No
                                                            collaborations submissions found.</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                                    <?php if ($collab_result->num_rows > 0) {
                                                        $counter = 1;
                                                        while ($row = $collab_result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo htmlspecialchars($row['organization_name']); ?>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($row['contact_person']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
                                                    </tr>
                                                    <?php $counter++;
                                                        }
                                                    } else { ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center text-danger">No
                                                            collaborations submissions found.</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <script>
    // Function to hide columns dynamically
    function hideColumns(tableId, columnIndexes) {
        columnIndexes.forEach(index => {
            // Hide header cells
            document.querySelectorAll(`#${tableId} th:nth-child(${index})`).forEach(cell => {
                cell.style.display = 'none';
            });
            // Hide body cells
            document.querySelectorAll(`#${tableId} td:nth-child(${index})`).forEach(cell => {
                cell.style.display = 'none';
            });
        });
    }

    // Hide the 4th (Phone) and 9th (Reason) columns in the members table
    hideColumns('members-table', [9, 10]);
    // Hide the 3rd (Email) and 4th (Phone) columns in the donors table
    hideColumns('donors-table', []);
    </script>

</body>

</html>