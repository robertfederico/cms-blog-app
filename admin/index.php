<?php include 'includes/header.php'; ?>

<!-- Displat posts based on author or user -->

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <h5 class="title-header">dashboard</h5>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow p-0 m-0">
                        <div class="card-body bg-primary text-white">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fas fa-file fa-4x"></i>
                                </div>
                                <div class="col-md-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM posts";
                                    $result = mysqli_query($conn, $query);
                                    $post_count = mysqli_num_rows($result);

                                    echo "<h2 class='m-0'>";
                                    echo $post_count;
                                    echo "</h2>";
                                    ?>
                                    <h6 class="m-0">Posts</h6>
                                </div>
                            </div>
                        </div>
                        <a href="view-posts.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body bg-success text-white">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fas fa-comments fa-4x"></i>
                                </div>
                                <div class="col-md-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $result = mysqli_query($conn, $query);
                                    $comment_count = mysqli_num_rows($result);

                                    echo "<h2 class='m-0'>";
                                    echo $comment_count;
                                    echo "</h2>";
                                    ?>
                                    <h6 class="m-0">Comments</h6>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body bg-warning text-white">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fa fa-user fa-4x"></i>
                                </div>
                                <div class="col-md-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $result = mysqli_query($conn, $query);
                                    $users_count = mysqli_num_rows($result);

                                    echo "<h2 class='m-0'>";
                                    echo $users_count;
                                    echo "</h2>";
                                    ?>
                                    <h6 class="m-0"> Users</h6>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow">
                        <div class="card-body text-white bg-danger">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fa fa-list fa-4x"></i>
                                </div>
                                <div class="col-md-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $result = mysqli_query($conn, $query);
                                    $categories_count = mysqli_num_rows($result);

                                    echo "<h2 class='m-0'>";
                                    echo $categories_count;
                                    echo "</h2>";
                                    ?>
                                    <h6 class="m-0">Categories</h6>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- chart -->
            <div class="card mt-5 shadow">
                <div class="card-body">
                    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>

                </div>
            </div>
        </div>
    </main>
</div>

<?php include 'includes/footer.php'; ?>