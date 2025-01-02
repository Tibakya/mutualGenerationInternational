<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/logowhite.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="editor_dashboard.php" class="nav-link <?php echo ($a == 'editor_dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Taarifa Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 2) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            Taarifa
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-taarifa.php" class="nav-link <?php echo ($a == 2) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Taarifa Mpya</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-taarifa.php" class="nav-link <?php echo ($a == 2) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Taarifa</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Blog Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-category.php" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Blog Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-blog.php" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add New Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-blog.php" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Latest News & Posters Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            Latest News & Posters
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-poster.php" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add New Poster</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-poster.php" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Poster</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout Section -->
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
