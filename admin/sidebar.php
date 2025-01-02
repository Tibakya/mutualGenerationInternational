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
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="superadmin_dashboard.php" class="nav-link <?php echo ($a == 1) ? 'active' : ''; ?>">
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

                <!-- MGI Centers Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            MGI Centers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-services.php" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Center</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-services.php" class="nav-link <?php echo ($a == 3) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Centers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Blog Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-category.php" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Blog Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-blog.php" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add New Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-blog.php" class="nav-link <?php echo ($a == 4) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Latest News & Posters Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 5) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            Latest News & Posters
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-poster.php" class="nav-link <?php echo ($a == 5) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add New Poster</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-poster.php" class="nav-link <?php echo ($a == 5) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Poster</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Partners Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 6) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-handshake"></i>
                        <p>
                            Partners
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-partner.php" class="nav-link <?php echo ($a == 6) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add New Partner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-partner.php" class="nav-link <?php echo ($a == 6) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Partners</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Team Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 7) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Team
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-team.php" class="nav-link <?php echo ($a == 7) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Team Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-team.php" class="nav-link <?php echo ($a == 7) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Team</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Other Options Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($a == 8) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-user-friends"></i>
                        <p>
                            Other Options
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-testimonials.php" class="nav-link <?php echo ($a == 8) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Testimonials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-testimonials.php" class="nav-link <?php echo ($a == 8) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Testimonials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-gallery.php" class="nav-link <?php echo ($a == 8) ? 'active' : ''; ?>">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add Gallery Item</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-gallery.php" class="nav-link <?php echo ($a == 8) ? 'active' : ''; ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Gallery Items</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings Section -->
                <li class="nav-item">
                    <a href="panga.php" class="nav-link <?php echo ($a == 9) ? 'active' : ''; ?>">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

