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
            <div class="card shadow-sm comment-section border-0 mb-5">
                <?php
                    if (isset($_POST['submit_comment'])) {

                        $post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
                        $post_date = date('Y-m-d');

                        $insert_query = "INSERT INTO comments(comment_post_id,comment_author,
                        comment_email,comment_content,comment_status,comment_date)
                        VALUES($post_id,'{$comment_author}', '{$comment_email}', 
                        '{$comment}','approved','{$post_date}')";

                        $insert_query_comments = mysqli_query($conn, $insert_query);

                        if (!$insert_query_comments) {
                            die('Failed' . mysqli_error($conn));
                        } else {
                            $query_update_post = "UPDATE posts 
                            SET post_comment_count = post_comment_count + 1 WHERE posts_id = $post_id";
                            $update_post = mysqli_query($conn, $query_update_post);
                            echo "<script>alert('Success');</script>";
                        }
                    }

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


            <?php
                $post_id = $_GET['p_id'];
                $query_comment = "SELECT * FROM comments WHERE comment_post_id = $post_id 
                    AND comment_status='approved' ORDER BY comment_id DESC";

                $result = mysqli_query($conn, $query_comment);

                if (!$result) {
                    die('Failed' . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_array($result)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = $row['comment_content'];
                    $comment_status = $row['comment_status'];
                    $comment_date  = $row['comment_date'];
                ?>

            <div class="media mb-3">
                <a class="mr-3" href="#">
                    <i class="fas fa-user fa-3x"></i>
                </a>
                <div class="media-body">
                    <h5 class="media-heading"><?php echo  $comment_author; ?>
                        <small><?php echo  $comment_date; ?></small>
                    </h5>
                    <?php echo  $comment_content; ?>
                </div>
            </div>
            <?php
                }
                ?>
        </div>

        <?php
    }

        ?>
        <div class="mt-5">
            <?php include 'includes/footer.php'; ?>
        </div>

    </div>
    <!-- /.row -->