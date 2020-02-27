<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <h2>Posts</h2>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
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
                                    <td>{$post_image}</td>
                                    <td>{$post_tag}</td>
                                    <td>{$post_comment_count}</td>
                                    <td>{$post_date}</td>
                                    <td>
                                        <a href='categories.php?delete={$posts_id}' class='btn btn-danger btn-sm rounded-circle'>
                                            <i class='fas fa-trash'></i>
                                        </a>
                                        <a href='#' data-id='{$posts_id}' data-title='{$post_author}' class='btn btn-success btn-sm edit_category rounded-circle'>
                                            <i class='fas fa-edit'></i>
                                        </a>
                                    </td>
                                </tr>";
                                    $posts_row_id++;
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($conn, $query);
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="cat_title">Category Title</label>
                        <input name="update_category" id="update_category" type="text" class="form-control">
                        <input name="update_category_id" id="update_category_id" type="hidden">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="update" type="submit">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
update_category();
?>
<?php include 'includes/footer.php'; ?>