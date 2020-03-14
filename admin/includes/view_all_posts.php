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
    <div class="title-container">
        <h5>Posts</h5>
        <p> Here you can manage posts</p>
    </div>
    <div class="filter-container">
        <div class="form-row">
            <div class="col-md-6 row">
                <label class="col-form-label col-md-3" for="">View by Status</label>
                <div class="col-md-8">
                    <select name="post_status" id="post_status" class="form-control">
                        <option value="view">View All</option>
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-danger custom-btn-danger" type="submit" id="" name="delete"><i
                        class="fas fa-trash"></i>
                    Delete</button>
                <button class="btn btn-success custom-btn-success" type="submit" id="publish" name="publish"><i
                        class="fas fa-paste"></i>
                    Publish</button>
                <button class="btn btn-primary custom-btn-info" type="submit" name="draft"><i class="fas fa-list"></i>
                    Draft</button>
            </div>
            <div class="col-md-2">
                <a href="view-posts.php?source=add_post" class="btn btn-info custom-btn-primary float-right"
                    type="submit"><i class="fas fa-plus-circle"></i> Add Post</a>
            </div>
        </div>
    </div>
    <div class="table-container">
        <div class="table-responsive">
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
        </div>
    </div>

</form>