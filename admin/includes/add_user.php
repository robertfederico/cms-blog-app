<?php
if (isset($_POST['create_user'])) {

    $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
    $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
    $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_pword = mysqli_real_escape_string($conn, $_POST['user_pword']);
    // $post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];

    // $post_date = date('Y-m-d');
    //move_uploaded_file($post_image_temp, "../images/$post_image");

    $insert_user = "INSERT INTO users (username, user_password, user_firstname, user_lastname, 
    user_email, user_role)
    VALUES('{$username}','{$user_pword}','{$user_fname}','{$user_lname}',
    '{$user_email}','{$user_role}')";
    confirm_query($insert_user);
}

?>
<div class="row">
    <div class="col-md-9 col-xs 12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_fname">First Name</label>
                <input name="user_fname" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="user_lname">Last Name</label>
                <input name="user_lname" type="text" class="form-control" required>
            </div>

            <!-- <div class="form-group">
                <label for="cat_title">User Image</label>
                <input name="post_image" type="file" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="user_role">Role</label>
                <select name="user_role" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Admin">Admin</option>
                    <option value="Subscriber">Subscriber</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="user_email">Email</label>
                <input name="user_email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cat_title">Password</label>
                <input name="user_pword" type="password" class="form-control" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" name="create_user" type="submit">Add User</button>
            </div>
        </form>
    </div>
</div>