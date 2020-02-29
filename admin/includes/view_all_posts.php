<table id="post_table" class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($conn, $query);
        $posts_row_id = 1;
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $posts_id = $row['posts_id'];
            $post_cat_id = $row['post_cat_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tag = $row['post_tag'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            echo "
                <tr>
                    <td>{$posts_row_id}</td>
                    <td>{$post_author}</td>
                    <td>{$post_title}</td>
                    <td>{$post_cat_id}</td>
                    <td>{$post_status}</td>
                    <td><img class='img-fluid' src='../images/$post_image'></td>
                    <td>{$post_tag}</td>
                    <td>{$post_comment_count}</td>
                    <td>{$post_date}</td>
                    <td>
                        <a href='view-posts.php?delete={$posts_id}' class='btn btn-danger btn-sm rounded-circle'>
                            <i class='fas fa-trash'></i>
                        </a>
                        <a href='#' data-id='{$posts_id}' 
                        data-post_author='{$post_author}' 
                        data-post_title='{$post_title}' 
                        data-post_cat_id='{$post_cat_id}' 
                        data-post_status='{$post_status}' 
                        data-post_tag='{$post_tag}' 
                        data-post_content='{$post_content}' 
                        class='btn btn-success btn-sm edit_posts rounded-circle'>
                            <i class='fas fa-edit'></i>
                        </a>
                    </td>
                </tr>";
            $posts_row_id++;
        }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="edit_posts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Posts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_title">Post Title</label>
                                <input name="update_post_title" id="update_post_title" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_title">Post Category Id</label>
                                <input name="update_post_category_id" id="update_post_category_id" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_title">Post Author</label>
                                <input name="update_post_author" id="update_post_author" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_title">Post Status</label>
                                <input name="update_post_status" id="update_post_status" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_title">Post Image</label>
                                <input name="update_post_image" id="update_post_image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat_title">Post Tags</label>
                                <input name="update_post_tags" id="update_post_tags" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Post Content</label>
                                <textarea name="update_post_content" id="update_post_content"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="update_post" id="update_post" type="submit">Add
                            Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
if (isset($_GET['delete'])) {
    $posts_id = $_GET['delete'];

    $delete_query = "DELETE FROM posts WHERE posts_id ={$posts_id}";

    confirm_query($delete_query);
    header("Location: view-posts.php");
}
?>