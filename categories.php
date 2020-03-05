<?php include 'includes/db_conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php' ?>

<div class="container mt-5">
    <h3> <?php
            if (isset($_GET['category'])) {

                $post_category_id = $_GET['category'];

                $query_cat_title = "SELECT * FROM categories WHERE category_id = $post_category_id";
                $result = mysqli_query($conn, $query_cat_title);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $category_title = $row['category_title'];
                    echo  $category_title;
                } else {
                    echo 'no results';
                }
            }
            ?>
    </h3>
    <div class="row">
        <div class="col-md-8">
            <?php
            $query = "SELECT * FROM posts WHERE post_cat_id=$post_category_id";
            $posts = mysqli_query($conn, $query);
            if (mysqli_num_rows($posts) > 0) {
                while ($row = mysqli_fetch_assoc($posts)) {
                    $post_id = $row['posts_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_image = $row['post_image'];
                    $post_tag = $row['post_tag'];
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
            } else {
                echo '<h4 class="text-center mt-5 mb-5">No Posts Yet.</h4>';
            }
            ?>

        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>