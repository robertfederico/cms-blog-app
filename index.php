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

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">by <a href="index.php"><?php echo $post_author; ?></a></p>
            <p>
                <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?>
            </p>
            <hr />
            <img class="img-responsive" src="images/<?php echo $post_image;  ?>" />
            <hr />
            <p>
                <?php echo $post_content; ?>
            </p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <?php } ?>
            <hr />

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <!-- /.row -->
    <hr />
    <?php include 'includes/footer.php'; ?>