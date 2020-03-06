<?php include 'includes/db_conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php' ?>

<!-- Page Content -->

<div class="container-fluid m-0 p-0 d-posts">
    <?php
    if (isset($_GET['p_id']))
        $post_id = $_GET['p_id'];

    $query_post = "SELECT * FROM posts WHERE posts_id = $post_id";
    $query_result = mysqli_query($conn, $query_post);

    while ($row = mysqli_fetch_assoc($query_result)) {
        $post_cat_id = $row['post_cat_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tag = $row['post_tag'];
        $post_comment = $row['post_comment_count'];
        $post_status = $row['post_status'];

        $query_category = "SELECT * FROM categories WHERE category_id ={$post_cat_id}";
        $fetch_result  = mysqli_query($conn, $query_category);

        while ($row = mysqli_fetch_assoc($fetch_result)) {
            $category_title = $row['category_title'];
        }
    ?>

    <div class="image-container mb-5"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(images/<?php echo $post_image; ?>)">
        <p class="post-tag"><?php echo $category_title; ?></p>
        <div class="text-container">
            <h1><?php echo $post_title; ?></h1>
            <h6><?php echo $post_date; ?></h6>
            <h6>Written by by <span><?php echo $post_author; ?></span></h6>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-10">
            <div class="text-justify mb-5"><?php echo $post_content; ?>

            </div>
            <div class="card shadow-sm comment-section border-0">
                <?php
                    if (isset($_POST['submit_comment']))

                        echo  $_POST['comment_author'];

                    ?>
                <div class="card-header bg-transparent border-0 pt-5">
                    <h5 class="text-center text-uppercase">Leave a Comment:</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input name="comment_author" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="comment_email" type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="comment" class="form-control" required></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Submit
                            Comment</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
    }
        ?>
        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- /.row -->