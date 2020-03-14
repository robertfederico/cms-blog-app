<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <h5 class="title-header">Comments</h5>
            <div class="card shadow">
                <?php
                include 'includes/view_all_comments.php';
                ?>
            </div>
        </div>
    </main>
</div>



<?php
update_category();
?>
<?php include 'includes/footer.php'; ?>