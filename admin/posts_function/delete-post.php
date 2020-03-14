<?php
include '../../includes/db_conn.php';
if (isset($_GET['post_id'])) {
    $posts_id = $_GET['post_id'];

    $delete_query = "DELETE FROM posts WHERE posts_id ={$posts_id}";
    if ($conn->query($delete_query) === TRUE) {
        echo "delete";
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}