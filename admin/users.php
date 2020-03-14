<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <?php
            if (isset($_GET['source'])) {
                $source = $_GET['source'];
            } else {
                $source = '';
            }
            switch ($source) {
                case 'add_post';
                    echo '<h5 class="title-header">Add User</h5>';
                    break;
                case 'edit_user';
                    echo '<h5 class="title-header">Edit User</h5>';
                    break;
                default:
                    echo '<h5 class="title-header">Users</h5>';
                    break;
            }

            ?>
            <div class="card shadow">
                <?php
                switch ($source) {
                    case 'add_user';
                        include 'includes/add_user.php';
                        break;
                    case 'edit_user';
                        include 'includes/edit_user.php';
                        break;
                    default:
                        include 'includes/view_all_users.php';
                        break;
                }
                ?>
            </div>
        </div>
    </main>
</div>



<?php
update_category();
?>
<?php include 'includes/footer.php'; ?>