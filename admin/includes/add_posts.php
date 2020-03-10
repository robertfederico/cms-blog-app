<?php
if (isset($_POST['create_post'])) {
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
    $post_date = date('Y-m-d');
    $post_comment_count = 0;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $insert_post = "INSERT INTO posts (post_cat_id, post_title, post_author, post_date, 
    post_image, post_content, post_tag, post_comment_count, post_status)
    VALUES('{$post_category_id}','{$post_title}','{$post_author}','{$post_date}',
    '{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
    confirm_query($insert_post);
}

?>
<div class="row">
    <div class="col-md-12 col-xs 12">
        <form action="" method="POST" class="pl-2" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="cat_title">Post Title</label>
                        <input name="post_title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cat_title">Post Category</label>
                        <select name="post_category_id" class="form-control">
                            <?php
                            $query = "SELECT * FROM categories";
                            $category_query = mysqli_query($conn, $query);
                            echo "<option value=''>Select Category</option>";
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
                        <input name="post_author" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cat_title">Post Status</label>
                        <select name="post_status" class="form-control">
                            <option value="">Select</option>
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cat_title">Post Image</label>
                        <div class="card border-dark p-1 mb-2">
                            <img id="img" src="../images/upload.png" class="img-fluid" alt="image">
                        </div>
                        <input name="post_image" id="update_post_image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cat_title">Post Tags</label>
                        <input name="post_tags" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Post Content</label>
                        <textarea name="post_content" id="post_content" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary" name="create_post" type="submit">Add Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>