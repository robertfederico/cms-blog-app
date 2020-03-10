<header class="main-nav shadow sticky-top">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <nav class="navbar navbar-expand-lg p-0 m-0" role="navigation">
                    <div class="container">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Blog</a>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <form action="search.php" method="POST">
                                <div class="sidebar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-menu" name="search" id="search"
                                            placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit" name="submit">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <?php
                            session_start();
                            if ($_SESSION['username']) {
                                echo
                                    "  <ul class='navbar-nav ml-auto'>
                                        <li class='nav-item'>
                                        <a class='nav-link' href='admin'><span class='fas fa-tachometer'>
                                        </span> {$_SESSION['f_name']} {$_SESSION['l_name']}
                                        </a>
                                        </li>
                                    </ul>";
                            } else {
                                echo '
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link " href="#">Register</a></li>
                                    <li class="nav-item"><a class="btn btn-success btn-sm text-white" href="#"
                                            data-toggle="modal" data-target="#loginModal"><i class="fas fa-lock"></i>
                                            Login</a> </li> 
                                </ul>';
                            }

                            ?>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg  p-0 m-0" role="navigation">
                    <div class="container">
                        <div class="collapse navbar-collapse" id=" bs-example-navbar-collapse-1">
                            <ul class="navbar-nav ml-auto mr-auto">
                                <?php
                                $query = "SELECT * FROM categories";
                                $select_categories = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $category_id = $row['category_id'];
                                    $cat_title = $row['category_title'];
                                ?>
                                <li class="nav-item"><a class="nav-link"
                                        href="categories.php?category=<?php echo $category_id; ?>"><?php echo $cat_title; ?></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username or Email</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="login" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>