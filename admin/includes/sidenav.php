<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>

<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="index.php">CMS Admin</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded"
                    src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                    alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php

                        $user_id = $_SESSION['user_id'];
                        $display_profile = "SELECT * FROM users WHERE `user_id` = $user_id";
                        $result = mysqli_query($conn, $display_profile);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_role = $row['user_role'];

                            echo $user_firstname;
                            echo '<strong>';
                            echo ' ';
                            echo $user_lastname;
                            echo '</strong>';
                        ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout.php">Logout</a>
                    </div>
                </span>
                <span class="user-role">
                    <?php
                            echo $user_role;
                        }
                ?>
                </span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>

            </div>
        </div>
        <!-- sidebar-header  -->
        <!-- <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li>
                    <a class="sidebar-btn" href="index.php">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-btn" href="categories.php">
                        <i class="fas fa-list"></i>
                        <span>categories</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a class="sidebar-btn" href="#">
                        <i class="far fa-gem"></i>
                        <span>Posts</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="view-posts.php?source=add_post">Add Posts</a>
                            </li>
                            <li>
                                <a href="view-posts.php">View Posts</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a class="sidebar-btn" href="#">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="users.php">View Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a class="sidebar-btn" href="#">
                        <i class="fa fa-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Pie chart</a>
                            </li>
                            <li>
                                <a href="#">Line chart</a>
                            </li>
                            <li>
                                <a href="#">Bar chart</a>
                            </li>
                            <li>
                                <a href="#">Histogram</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="sidebar-btn" href="comments.php">
                        <i class="fa fa-calendar"></i>
                        <span>Comments</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>