<?php
include 'includes/db_conn.php';

$row = $_POST['row'];
$rowperpage = 3;

// selecting posts
$query = 'SELECT * FROM posts limit ' . $row . ',' . $rowperpage;

$result = mysqli_query($conn, $query);

$html = '';

while ($row = mysqli_fetch_array($result)) {

    $post_id = $row['posts_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
    $post_tag = $row['post_tag'];

    // Creating HTML structure
    $html .= '<div id="post_' . $post_id . '" class="card mb-5 open-post post">';
    $html .= '<div class="img-container">';
    $html .= "<a href='post.php?p_id={$post_id}'>";
    $html .= "<img class='img-card' src='images/{$post_image}'/>";
    $html .= '<div class="desc-box">';
    $html .= "<h3>{$post_title}</h3>";
    $html .= "<p class='author'>{$post_author}</p>";
    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div>';
    $html .= '</div>';
}

echo $html;