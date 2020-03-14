<?php
if (isset($_POST['update_post'])) {

    $posts_id = $_GET['p_id'];
    $update_post_title =  $_POST['update_post_title'];

    $update_post_category_id = $_POST['update_post_category_id'];
    $update_post_status = $_POST['update_post_status'];

    $post_image = $_FILES['update_post_image']['name'];
    $post_image_temp = $_FILES['update_post_image']['tmp_name'];

    $update_post_tags = $_POST['update_post_tags'];
    $update_post_author = $_POST['update_post_author'];
    $update_post_content = mysqli_real_escape_string($conn, $_POST['update_post_content']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $select_old_image = "SELECT * FROM posts WHERE posts_id ={$posts_id}";
        $result = mysqli_query($conn, $select_old_image);
        while ($row = mysqli_fetch_assoc($result)) {
            $post_image = $row['post_image'];
        }
    }

    // echo $posts_id;

    $update_post_title = mysqli_real_escape_string($conn, $update_post_title);

    $query = "UPDATE posts SET 
    post_cat_id  = $update_post_category_id, 
    post_title = '{$update_post_title}', 
    post_author  = '{$update_post_author}', 
    post_image = '{$post_image}',
    post_content   = '{$update_post_content}', 
    post_tag = '{$update_post_tags}', 
    post_status  = '{$update_post_status}' 
    WHERE posts_id = $posts_id";

    $update_posts = mysqli_query($conn, $query);

    confirm_query($query);
    //header("Location: view-posts.php");
}

?>
<div class="title-container">
    <h5>Update post here</h5>
</div>
<div class="row">
    <div class="col-md-12 col-xs 12">
        <div class="filter-container">
            <form action="" method="POST" enctype="multipart/form-data">

                <?php
                if (isset($_GET['p_id'])) {

                    $post_id = $_GET['p_id'];
                    $display_post = "SELECT * FROM posts WHERE posts_id ={$post_id}";
                    $query_result = mysqli_query($conn, $display_post);

                    while ($row = mysqli_fetch_assoc($query_result)) {

                        $post_cat_id = $row['post_cat_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tag'];
                        $post_content = $row['post_content'];

                ?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="view-posts.php" class="btn btn-primary custom-btn-primary float-right mb-3">Back to
                            Posts</a>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="cat_title">Post Title</label>
                            <input name="update_post_title" id="update_post_title" type="text" class="form-control"
                                value="<?php echo  $post_title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cat_title">Post Category</label>
                            <select name="update_post_category_id" id="update_post_category_id" class="form-control">
                                <?php
                                        $query = "SELECT * FROM categories";
                                        $category_query = mysqli_query($conn, $query);
                                        echo "<option value=''>Select</option>";
                                        while ($row = mysqli_fetch_assoc($category_query)) {
                                            $category_id = $row['category_id'];
                                            $category_title = $row['category_title'];
                                            echo "<option value='{$category_id}'>{$category_title}</option>";
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cat_title">Post Author</label>
                            <input name="update_post_author" id="update_post_author" type="text" class="form-control"
                                value="<?php echo $post_author; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cat_title">Post Status</label>
                            <select name="update_post_status" id="update_post_status" class="form-control">
                                <?php
                                        if ($post_status == 'Published') {
                                            echo "<option value='{$post_status}'>{$post_status}</option>";
                                            echo "<option value='Draft'>Draft</option>";
                                        } else {
                                            echo "<option value='{$post_status}'>{$post_status}</option>";
                                            echo "<option value='Published'>Published</option>";
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cat_title">Post Image</label>
                            <div class="card border-dark p-1 mb-2">
                                <img id="img" src="../images/<?php echo $post_image; ?>" class="img-fluid" alt="image">
                            </div>
                            <input name="update_post_image" id="update_post_image" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_title">Post Tags</label>
                            <input name="update_post_tags" id="update_post_tags" type="text" class="form-control"
                                value="<?php echo $post_tags; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class=" form-group">
                            <label for="">Post Content</label>
                            <textarea name="update_post_content" id="update_post_content" class="form-control">
                             <?php echo  $post_content; ?>
                        </textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <button class="btn btn-primary custom-btn-primary w-25 text-uppercase" name="update_post"
                                id="update_post" type="submit">Update
                                Post</button>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>