<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_post';
                            echo '<h2>Add User</h2>';
                            break;
                        case 'edit_user';
                            echo '<h2>Edit User</h2>';
                            break;
                        default:
                            echo '<h2>Users</h2>';
                            break;
                    }

                    ?>
                </div>
                <div class="card-body">
                    <?php
                    switch ($source) {
                        case 'add_user';
                            include 'includes/add_user.php';
                            break;
                        case 'edit_user';
                            include 'includes/edit_user.php';
                            break;
                        default:
                            echo ' <div class="table-responsive">';
                            include 'includes/view_all_users.php';
                            echo '</div>';
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</div>



<?php
update_category();
?>
<?php include 'includes/footer.php'; ?>