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
    //confirm_query($update_posts);
    header("Location: view-posts.php");
}

?>

<div class="row">
    <div class="col-md-9 col-xs 12">
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

                    $post_tags = $row['post_tag'];
                    $post_content = $row['post_content'];

            ?>
            <div class="form-group">
                <label for="cat_title">Post Title</label>
                <input name="update_post_title" id="update_post_title" type="text" class="form-control"
                    value="<?php echo  $post_title; ?>">
            </div>
            <div class="form-group">
                <label for="cat_title">Post Category Id</label>
                <select name="update_post_category_id" id="update_post_category_id" class="form-control">
                    <?php
                            $query = "SELECT * FROM categories WHERE category_id !={$post_cat_id}";
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
                <input name="update_post_status" id="update_post_status" type="text" class="form-control"
                    value="<?php echo $post_status; ?>">
            </div>
            <div class="form-group">
                <label for="cat_title">Post Image</label>
                <input name="update_post_image" id="update_post_image" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="cat_title">Post Tags</label>
                <input name="update_post_tags" id="update_post_tags" type="text" class="form-control"
                    value="<?php echo $post_tags; ?>">
            </div>
            <div class=" form-group">
                <label for="">Post Content</label>
                <textarea name="update_post_content" id="update_post_content" class="form-control">
                <?php echo  $post_content; ?>
                </textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="post_id" id="post_id">
                <button class="btn btn-primary" name="update_post" id="update_post" type="submit">Update
                    Post</button>
            </div>
            <?php
                }
            }
            ?>
        </form>
    </div>
</div>