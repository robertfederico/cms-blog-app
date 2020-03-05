<?php include 'includes/db_conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php' ?>
<!-- Page Content -->
<?php
$query = "SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1";
$posts = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($posts)) {
    $post_id = $row['posts_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_tag = $row['post_tag'];
    $post_content = substr($row['post_content'], 0, 100);

?>
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/<?php echo $post_image; ?>" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
                <h5> <?php echo $post_title; ?></h5>
                <p> <?php echo $post_author; ?> | <span><?php echo $post_date; ?> </span></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/random" class=" d-block w-100">
            <div class="carousel-caption d-none d-md-block">
                <h5> <?php echo $post_title; ?></h5>
                <p> <?php echo $post_author; ?> | <span><?php echo $post_date; ?> </span></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/daily" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
                <h5> <?php echo $post_title; ?></h5>
                <p> <?php echo $post_author; ?> | <span><?php echo $post_date; ?> </span></p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container mt-5">
    <h4>Featured Blog</h4>
    <div class="row">
        <div class="col-md-8">

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
            <?php } ?>

        </div>
        <?php include 'includes/sidebar.php'; ?>
        <div class="col-md-8">
            <h4>Latest Blog</h4>
            <?php
                $query = "SELECT * FROM posts ORDER BY posts_id ASC LIMIT 3";
                $posts = mysqli_query($conn, $query);

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
            <?php } ?>
            <!-- Pager -->
            <div class="d-flex justify-content-between mb-5">
                <a class="btn btn-primary" href="#">&larr; Older</a>
                <a class="btn btn-primary" href="#">Newer &rarr;</a>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>