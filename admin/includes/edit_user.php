<?php
if (isset($_POST['update_user'])) {

    $user_id = $_GET['u_id'];
    $update_user_fname = mysqli_real_escape_string($conn, $_POST['update_user_fname']);
    $update_user_lname = mysqli_real_escape_string($conn, $_POST['update_user_lname']);
    $update_user_role = mysqli_real_escape_string($conn, $_POST['update_user_role']);
    $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
    $update_user_email = mysqli_real_escape_string($conn, $_POST['update_user_email']);

    $query = "UPDATE users SET 
    username  = '{$update_username}', 
    user_firstname = '{$update_user_fname}', 
    user_lastname  = '{$update_user_lname}', 
    user_email = '{$update_user_email}',
    user_role   = '{$update_user_role}' 
    WHERE `user_id` = $user_id";

    //$update_user = mysqli_query($conn, $query);
    confirm_query($query);
    //header("Location: users.php");
}

?>

<div class="row">
    <div class="col-md-9 col-xs 12">
        <form action="" method="POST" enctype="multipart/form-data">

            <?php
            if (isset($_GET['u_id'])) {

                $user_id = $_GET['u_id'];
                $display_user = "SELECT * FROM users WHERE `user_id` ={$user_id}";
                $query_result = mysqli_query($conn, $display_user);

                while ($row = mysqli_fetch_assoc($query_result)) {

                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
            ?>
            <div class="form-group">
                <label for="update_user_fname">First Name</label>
                <input name="update_user_fname" id="update_post_title" type="text" class="form-control"
                    value="<?php echo  $user_firstname; ?>">
            </div>
            <div class="form-group">
                <label for="update_user_lname">Last Name</label>
                <input name="update_user_lname" id="update_post_author" type="text" class="form-control"
                    value="<?php echo $user_lastname; ?>">
            </div>
            <div class="form-group">
                <label for="cat_title">Role</label>

                <select name="update_user_role" id="" class="form-control">
                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                    <?php
                            if ($user_role == 'Admin') {
                                echo "<option value='Subscriber'>Subscriber</option>";
                            } else {
                                echo "<option value='Admin'>Admin</option>";
                            }

                            ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cat_title">Username</label>
                <input name="update_username" id="update_username" type="text" class="form-control"
                    value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="cat_title">Email</label>
                <input name="update_user_email" id="update_user_email" type="email" class="form-control"
                    value="<?php echo $user_email; ?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="post_id" id="post_id">
                <button class="btn btn-primary" name="update_user" id="update_user" type="submit">Update
                    User</button>
            </div>
            <?php
                }
            }
            ?>
        </form>
    </div>
</div>