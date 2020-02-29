<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('Y-m-d');
    $post_comment_count = 1;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $insert_post = "INSERT INTO posts (post_cat_id, post_title, post_author, post_date, 
    post_image, post_content, post_tag, post_comment_count, post_status)
    VALUES('{$post_category_id}','{$post_title}','{$post_author}','{$post_date}',
    '{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";

    confirm_query($insert_post);
}

?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat_title">Post Title</label>
        <input name="post_title" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Category Id</label>
        <input name="post_category_id" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Author</label>
        <input name="post_author" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Status</label>
        <input name="post_status" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Image</label>
        <input name="post_image" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label for="cat_title">Post Tags</label>
        <input name="post_tags" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Post Content</label>
        <textarea name="post_content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="create_post" type="submit">Add Post</button>
    </div>
</form>