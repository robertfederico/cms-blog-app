<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <h2>Posts</h2>
            <hr>
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }
                        switch ($source) {
                            case 'add_post';
                                include 'includes/add_posts.php';
                                break;
                            default:
                                include 'includes/view_all_posts.php';
                                break;
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>



<?php
update_category();
?>
<?php include 'includes/footer.php'; ?>