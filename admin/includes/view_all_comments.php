<div class="title-container">
    <h5>Comments</h5>
    <p> Here you can manage comments</p>
</div>
<div class="table-container">
    <div class="table-responsive">
        <table id="comments_table" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>in Response to</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $posts_comment_id = 1;

                $query = "SELECT * FROM comments";
                $select_posts = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = $row['comment_content'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];

                    $query_posts = "SELECT * FROM posts WHERE posts_id ={$comment_post_id}";
                    $fetch_result  = mysqli_query($conn, $query_posts);

                    while ($row = mysqli_fetch_assoc($fetch_result)) {
                        $post_title = $row['post_title'];
                    }

                    echo "
                <tr>
                    <td>{$posts_comment_id}</td>
                    <td>{$comment_author}</td>
                    <td>{$comment_content}</td>
                    <td>{$comment_email}</td>
                    <td>{$comment_status}</td>
                    <td>
                        <a href='../post.php?p_id=$comment_post_id'>{$post_title}</a>
                    </td>
                    <td>{$comment_date}</td>
                    <td>
                        <a href='comments.php?approved={$comment_id}' class='btn btn-primary btn-sm rounded-circle'>
                            <i class='fas fa-thumbs-up'></i>
                        </a>
                        <a href='comments.php?unapproved={$comment_id}' class='btn btn-info btn-sm rounded-circle'>
                            <i class='fas fa-thumbs-down'></i>
                        </a>
                        <a href='comments.php?delete={$comment_id}' class='btn btn-danger btn-sm rounded-circle'>
                            <i class='fas fa-trash'></i>
                        </a>
                    </td>
                </tr>";
                    $posts_comment_id++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php
if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];

    $delete_query = "DELETE FROM comments WHERE comment_id ={$comment_id}";
    $delete_res = mysqli_query($conn, $delete_query);
    if (!$delete_res) {
        die('Failed' . mysqli_error($conn));
    } else {
        $query_update_post = "UPDATE posts 
        SET post_comment_count = post_comment_count - 1 WHERE posts_id = $comment_id";
        $update_post = mysqli_query($conn, $query_update_post);
        header("Location: comments.php");
    }
}

if (isset($_GET['unapproved'])) {

    $comment_id = $_GET['unapproved'];

    $delete_query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id ={$comment_id}";
    $delete_res = mysqli_query($conn, $delete_query);
    if (!$delete_res) {
        die('Failed' . mysqli_error($conn));
    } else {
        header("Location: comments.php");
    }
}

if (isset($_GET['approved'])) {

    $comment_id = $_GET['approved'];

    $delete_query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id ={$comment_id}";
    $delete_res = mysqli_query($conn, $delete_query);
    if (!$delete_res) {
        die('Failed' . mysqli_error($conn));
    } else {
        header("Location: comments.php");
    }
}
?>