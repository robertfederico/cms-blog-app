<?php
require "../includes/db_conn.php";

$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
$total_post_count = mysqli_num_rows($result);

$query1 = "SELECT * FROM posts WHERE post_status = 'Published'";
$result1 = mysqli_query($conn, $query1);
$post_count = mysqli_num_rows($result1);

$query2 = "SELECT * FROM comments";
$result2 = mysqli_query($conn, $query2);
$comment_count = mysqli_num_rows($result2);

$query3 = "SELECT * FROM users WHERE user_role ='Subscriber'";
$result3 = mysqli_query($conn, $query3);
$users_count = mysqli_num_rows($result3);

$query4 = "SELECT * FROM categories";
$result4 = mysqli_query($conn, $query4);
$categories_count = mysqli_num_rows($result4);

$query5 = "SELECT * FROM posts WHERE post_status = 'Draft'";
$result5 = mysqli_query($conn, $query5);
$post_count_draft = mysqli_num_rows($result5);

$element_text = ['Total Posts', 'Published Posts', 'Draft Posts', 'Comments', 'Subscribers    ', 'Categories'];
$element_value = [$total_post_count, $post_count, $post_count_draft, $comment_count, $users_count, $categories_count];

foreach (array_combine($element_text, $element_value) as $text => $value) {
    $output[] = array(
        'text'   => $text,
        'count'  => $value,
    );
}

echo json_encode($output);




// Instead you can query your database and parse into JSON etc etc