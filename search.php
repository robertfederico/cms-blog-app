<?php include "includes/db_conn.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>

<!-- Page Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <?php

            if (isset($_POST['submit'])) {

                $search = $_POST['search'];

                $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%' ";
                $search_query = mysqli_query($conn, $query);

                if (!$search_query) {

                    die("QUERY FAILED" . mysqli_error($conn));
                }

                $count = mysqli_num_rows($search_query);

                if ($count == 0) {

                    echo "<h1> NO RESULT</h1>";
                } else {

                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $post_id = $row['posts_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
            ?>
            <div class="card mb-5 open-post">
                <div class="img-container">
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class="img-card" src="images/<?php echo $post_image;  ?>" />
                        <div class="desc-box">
                            <h3>
                                <?php echo $post_title; ?>
                            </h3>
                            <p class="author"><?php echo $post_author; ?></p>
                        </div>
                    </a>
                </div>
            </div>

            <?php }
                }
            }

            ?>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>