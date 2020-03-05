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

                    if ($source == 'add_post') {

                        echo '<h2>Add Post</h2>';
                    } else if ($source == 'edit_post') {

                        echo '<h2>Edit Post</h2>';
                    } else {

                        echo '<h2>Post</h2>';
                    }
                    ?>
                </div>
                <div class="card-body">
                    <?php
                    switch ($source) {
                        case 'add_post';
                            include 'includes/add_posts.php';
                            break;
                        case 'edit_post';
                            include 'includes/edit_post.php';
                            break;
                        default:
                            echo ' <div class="table-responsive">';
                            include 'includes/view_all_posts.php';
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