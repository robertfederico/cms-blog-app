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
<div class="title-container">
    <h5>Add User</h5>
</div>
<div class="filter-container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <a href="users.php" class="btn btn-primary custom-btn-primary float-right mb-3">Back to
                    List</a>
            </div>
            <div class="col-md-8 col-xs 12 ml-auto mr-auto">
                <div class="form-row mb-2">
                    <label for="user_fname" class="col-form-label col-md-2">First Name</label>
                    <div class="col-md-8">
                        <input name="user_fname" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <label for="user_lname" class="col-form-label col-md-2">Last Name</label>
                    <div class="col-md-8">
                        <input name="user_lname" type="text" class="form-control" required>
                    </div>
                </div>
                <!-- <div class="form-group">
                <label for="cat_title">User Image</label>
                <input name="post_image" type="file" class="form-control">
            </div> -->
                <div class="form-row mb-2">
                    <label for="user_role" class="col-form-label col-md-2">Role</label>
                    <div class="col-md-8">
                        <select name="user_role" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Admin">Admin</option>
                            <option value="Subscriber">Subscriber</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <label for="username" class="col-form-label col-md-2">Username</label>
                    <div class="col-md-8">
                        <input name="username" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <label for="user_email" class="col-form-label col-md-2">Email</label>
                    <div class="col-md-8">
                        <input name="user_email" type="email" class="form-control" required>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <label for="cat_title" class="col-form-label col-md-2">Password</label>
                    <div class="col-md-8">
                        <input name="user_pword" type="password" class="form-control" required>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary custom-btn-primary w-25" name="create_user" type="submit">Add
                        User</button>
                </div>
            </div>
        </div>
    </form>
</div>