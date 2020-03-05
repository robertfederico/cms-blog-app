<header class="main-nav shadow-sm">
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
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="admin">Admin</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
                                <li class="nav-item"><a class="nav-link login-btn" href="#">Login</a></li>
                            </ul>
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