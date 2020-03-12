<?php
require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username ='{$username}'";
    $select_posts = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($select_posts);
    $user_password = $row['user_password'];
    $user_name = $row['username'];

    if (password_verify($password, $user_password)) {
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['f_name'] = $row['user_firstname'];
        $_SESSION['l_name'] = $row['user_lastname'];
        $_SESSION['user_role'] = $row['user_role'];
        $_SESSION['user_email'] = $row['user_email'];

        echo 'success';
    } else {
        echo 'Invalid password.';
    }

    // if ($username === $user_name && $password === $user_password) {
    //     session_start();
    //     $_SESSION['user_id'] = $row['user_id'];
    //     $_SESSION['username'] = $row['username'];
    //     $_SESSION['f_name'] = $row['user_firstname'];
    //     $_SESSION['l_name'] = $row['user_lastname'];
    //     $_SESSION['user_role'] = $row['user_role'];
    //     $_SESSION['user_email'] = $row['user_email'];

    //     echo 'success';
    // } else {
    // }
}