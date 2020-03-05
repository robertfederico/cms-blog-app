<!-- Fix this tomorrow -->

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
        $posts_row_id = 1;

        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $posts_id = $row['posts_id'];
            $post_cat_id = $row['post_cat_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $data = str_replace('&', '&amp;', $post_content);
            $post_tag = $row['post_tag'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];

            $query_category = "SELECT * FROM categories WHERE category_id ={$post_cat_id}";
            $fetch_result  = mysqli_query($conn, $query_category);

            while ($row = mysqli_fetch_assoc($fetch_result)) {
                $category_title = $row['category_title'];
            }

            echo "
                <tr>
                    <td>{$posts_row_id}</td>
                    <td>{$post_author}</td>
                    <td>{$post_title}</td>
                    <td>{$category_title}</td>
                    <td>{$post_status}</td>
                    <td><img class='img-fluid' src='../images/$post_image'></td>
                    <td>{$post_tag}</td>
                    <td>{$post_comment_count}</td>
                    <td>{$post_date}</td>
                    <td>
                        <a href='view-posts.php?delete={$posts_id}' class='btn btn-danger btn-sm rounded-circle'>
                            <i class='fas fa-trash'></i>
                        </a>
                        <a href='view-posts.php?source=edit_post&p_id={$posts_id}' class='btn btn-success btn-sm edit_posts rounded-circle'>
                            <i class='fas fa-edit'></i>
                        </a>
                    </td>
                </tr>";
            $posts_row_id++;
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $posts_id = $_GET['delete'];

    $delete_query = "DELETE FROM posts WHERE posts_id ={$posts_id}";

    confirm_query($delete_query);
    header("Location: view-posts.php");
}
?>