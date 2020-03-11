<?php

if (isset($_POST['publish'])) {
    $checkboxArray = $_POST['checkboxArray'];
    foreach ($checkboxArray as $post_value_id) {

        $post_status = 'Published';

        $query = "UPDATE posts SET post_status = '{$post_status}' WHERE posts_id = {$post_value_id}";
        confirm_query($query);
    }
}
if (isset($_POST['draft'])) {
    $checkboxArray = $_POST['checkboxArray'];

    foreach ($checkboxArray as $post_value_id) {

        $post_status = 'Draft';

        $query = "UPDATE posts SET post_status = '{$post_status}' WHERE posts_id = {$post_value_id}";
        confirm_query($query);
    }
}

if (isset($_POST['delete'])) {
    $checkboxArray = $_POST['checkboxArray'];

    foreach ($checkboxArray as $post_value_id) {

        $query = "DELETE FROM posts WHERE posts_id = {$post_value_id}";
        confirm_query($query);
    }
}

?>

<form action="" method="POST">
    <div class="container">
        <div class="p-3 mb-1">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label" for="">View by Status</label>
                            <select name="post_status" id="post_status" class="form-control">
                                <option value="view">View All</option>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="">View by Category</label>
                            <select name="post_status1" id="post_status" class="form-control">
                                <option value="view">View All</option>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="">View by Author</label>
                            <select name="post_status2" id="post_status" class="form-control">
                                <option value="view">View All</option>
                                <option value="Published">Published</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-danger" type="submit" name="delete"><i class="fas fa-trash"></i>
                        Delete</button>
                    <button class="btn btn-success" type="submit" name="publish"><i class="fas fa-paste"></i>
                        Publish</button>
                    <button class="btn btn-primary" type="submit" name="draft"><i class="fas fa-list"></i>
                        Draft</button>
                    <a href="view-posts.php?source=add_post" class="btn btn-info float-right" type="submit"><i
                            class="fas fa-plus-circle"></i> Add new</a>
                </div>
            </div>
        </div>
    </div>
    <hr class="divider">
    <table id="post_table" class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>
                    <label class="custom-control material-checkbox">
                        <input type="checkbox" class="material-control-input" id="selectAll">
                        <span class="material-control-indicator"></span>
                    </label>
                </th>
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
        </tbody>
    </table>
</form>

<?php
if (isset($_GET['delete'])) {
    $posts_id = $_GET['delete'];

    $delete_query = "DELETE FROM posts WHERE posts_id ={$posts_id}";

    confirm_query($delete_query);
    header("Location: view-posts.php");
}
?>