<?php include 'includes/db_conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php' ?>
<!-- Page Content -->
<?php
function make_query($conn)
{
    $query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY posts_id DESC LIMIT 3";
    $result = mysqli_query($conn, $query);
    return $result;
}

function make_slide_indicators($conn)
{
    $output = '';
    $count = 0;
    $result = make_query($conn);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '<li data-target="#carouselExampleControls" data-slide-to="' . $count . '" class="active"></li>';
        } else {
            $output .= '<li data-target="#carouselExampleControls" data-slide-to="' . $count . '"></li>';
        }
        $count = $count + 1;
    }
    return $output;
}

function make_slides($conn)
{
    $output = '';
    $count = 0;
    $result = make_query($conn);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '<div class="carousel-item active">';
        } else {
            $output .= '<div class="carousel-item">';
        }
        $output .= '
                <img src="images/' . $row["post_image"] . '" class="d-block w-100" />
                <div class="carousel-caption">
                      <h6>' . $row["post_tag"] . '</h6>
                    <h3>' . $row["post_title"] . '</h3>
                </div>
            </div>
                ';
        $count = $count + 1;
    }
    return $output;
}
?>

<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        echo make_slide_indicators($conn);
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        echo make_slides($conn);
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- featured blog -->
<div class="container mt-5">
    <h4>Featured Blog</h4>
    <div class="row">
        <?php
        $query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_comment_count > 2 LIMIT 1";
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
        </div>
        <?php } ?>

        <?php include 'includes/sidebar.php'; ?>
        <div class="col-md-8">
            <h4>Latest Blog</h4>
            <?php
            $allcount_query = "SELECT count(*) as allcount FROM posts";
            $allcount_result = mysqli_query($conn, $allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            $query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY posts_id ASC LIMIT 3";
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
            <div class="card mb-5 open-post post" id="post_<?php echo $post_id; ?>">
                <input type="hidden" id="all" value="<?php echo $allcount; ?>">
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
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">
            <!-- Pager -->
            <div class="d-flex justify-content-between mb-5">
                <a class="btn btn-primary" href="#">&larr; Older</a>
                <a class="btn btn-primary" href="#">Newer &rarr;</a>
            </div>

        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>