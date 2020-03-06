<!-- Fix this tomorrow -->

<table id="post_table" class="table table-hover text-nowrap">
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
            <th></th>
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
                    <td>{$post_title}</td>
                    <td>{$comment_date}</td>
                    <td>
                        <a href='view-posts.php?delete={$comment_id}' class='btn btn-primary btn-sm rounded-circle'>
                            <i class='fas fa-thumbs-up'></i>
                        </a>
                        <a href='view-posts.php?delete={$comment_id}' class='btn btn-info btn-sm rounded-circle'>
                            <i class='fas fa-thumbs-down'></i>
                        </a>
                        <a href='view-posts.php?delete={$comment_id}' class='btn btn-danger btn-sm rounded-circle'>
                            <i class='fas fa-trash'></i>
                        </a>
                    </td>
                </tr>";
            $posts_comment_id++;
        }
        ?>
    </tbody>
</table>

<?php
// if (isset($_GET['delete'])) {
//     $posts_id = $_GET['delete'];

//     $delete_query = "DELETE FROM posts WHERE posts_id ={$posts_id}";

//     confirm_query($delete_query);
//     header("Location: view-posts.php");
// }
?>