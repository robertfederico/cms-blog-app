<?php
include 'includes/header.php';
?>

<?php
if (isset($_POST['update_profile'])) {

    $user_id = $_SESSION['user_id'];

    $update_user_fname = mysqli_real_escape_string($conn, $_POST['f_name']);
    $update_user_lname = mysqli_real_escape_string($conn, $_POST['l_name']);
    $update_username = mysqli_real_escape_string($conn, $_POST['username']);
    $update_user_email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE users SET 
    username  = '{$update_username}', 
    user_firstname = '{$update_user_fname}', 
    user_lastname  = '{$update_user_lname}', 
    user_email = '{$update_user_email}'
    WHERE `user_id` = $user_id";

    confirm_query($query);
}
?>

<div class="page-wrapper chiller-theme toggled">
    <?php include 'includes/sidenav.php'; ?>

    <main class="page-content">
        <div class="container-fluid" id="profile">
            <h5 class="title-header">Profile</h5>
            <?php
            if (isset($_SESSION['username'])) {

                $user_id = $_SESSION['user_id'];

                $display_profile = "SELECT * FROM users WHERE `user_id` = $user_id";
                $result = mysqli_query($conn, $display_profile);

                while ($row = mysqli_fetch_assoc($result)) {
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];

            ?>
            <div class="card">
                <div class="title-container">
                    <h5>Edit Profile</h5>
                </div>
                <div class="filter-container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="col-form-label" for="">First Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="f_name" class="form-control"
                                                value="<?php echo $user_firstname ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="col-form-label" for="">Last Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="l_name" class="form-control"
                                                value="<?php echo $user_lastname ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="col-form-label" for="">Username</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="username" class="form-control"
                                                value="<?php echo $username ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="col-form-label" for="">Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="email" class="form-control"
                                                value="<?php echo $user_email ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary custom-btn-primary w-25"
                                        name="update_profile">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 ml-auto mr-auto">
                            <div class="card p-3 text-center">
                                <img src="../images/heart.jpg" class="img-fluid shadow">
                                <a href="#">change</a>
                                <div class="mt-2">
                                    <h5 class="m-0"> <?php echo $user_firstname . ' ' . $user_lastname ?></h5>
                                    <h6 class="m-0"><?php echo $user_role ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }

            ?>
        </div>
    </main>
</div>




<?php include 'includes/footer.php'; ?>