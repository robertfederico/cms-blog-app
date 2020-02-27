    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top mb-3" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggler" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Blog App</a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav mr-auto ml-auto">
                    <?php

                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_title = $row['category_title'];
                        echo "<li class='nav-item'><a class='nav-link' href='#'>{$cat_title}</a></li>";
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="admin">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>