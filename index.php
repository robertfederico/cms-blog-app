<?php include 'includes/db_conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php' ?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            $query = "SELECT * FROM posts";
            $posts = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($posts)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_tag = $row['post_tag'];
            ?>

            <div class="card shadow-lg mb-5">
                <div class="img-container">
                    <img class="img-card" src="images/<?php echo $post_image;  ?>" />
                    <div class="desc-box">
                        <a class="blog-link" href="#"><?php echo $post_title; ?></a>
                        <p class="author"><?php echo $post_content; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Pager -->
            <!-- <div class="d-flex justify-content-between">
                <a class="btn btn-primary" href="#">&larr; Older</a>
                <a class="btn btn-primary" href="#">Newer &rarr;</a>
            </div> -->
        </div>
        <?php include 'includes/sidebar.php'; ?>
    </div>
</div>
<!-- /.row -->
<?php include 'includes/footer.php'; ?>