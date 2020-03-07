<?php
require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    $sql = "SELECT * FROM users WHERE username ='{$username}'";
    $select_posts = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $user_password = $row['user_password'];
        $user_name = $row['username'];

        if ($username !== $user_name && $password !== $user_password) {
            header("Location: ../index.php");
        } else if ($username == $user_name && $password == $user_password) {
            header("Location: ../admin/index.php");
        }
    }
}