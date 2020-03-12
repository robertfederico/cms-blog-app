<?php
require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $reg_username = mysqli_real_escape_string($conn, $_POST['reg_username']);
    $reg_email = mysqli_real_escape_string($conn, $_POST['reg_email']);
    $reg_password = mysqli_real_escape_string($conn, $_POST['reg_password']);

    if (!empty($reg_username) && !empty($reg_email) && !empty($reg_password)) {

        $username_query = "SELECT * FROM users WHERE username ='{$reg_username}'";
        $check_username = mysqli_query($conn, $username_query);

        $email_query = "SELECT * FROM users WHERE user_email ='{$reg_email}'";
        $check_email = mysqli_query($conn, $email_query);

        if (mysqli_num_rows($check_username) > 0) {
            echo 'username_exist';
        } else if (mysqli_num_rows($check_email) > 0) {
            echo 'email_exist';
        } else {
            $password_hash  = password_hash($reg_password, PASSWORD_ARGON2ID);

            $insert_query = "INSERT INTO users (username, user_password, user_email, user_role)
                            VALUES('{$reg_username}','{$password_hash}','{$reg_email}','Subscriber')";
            if ($conn->query($insert_query) === TRUE) {
                echo 'success';
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}