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

            if ($source == 'add_post') {
                echo '<h5 class="title-header">Add Post</h5>';
            } else if ($source == 'edit_post') {

                echo '<h5 class="title-header">Edit Post</h5>';
            } else {

                echo '<h5 class="title-header">Posts</h5>';
            }
            ?>
            <div class="card shadow">
                <?php
                switch ($source) {
                    case 'add_post';
                        include 'includes/add_posts.php';
                        break;
                    case 'edit_post';
                        include 'includes/edit_post.php';
                        break;
                    default:
                        include 'includes/view_all_posts.php';
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
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script>
let editor;

ClassicEditor
    .create(document.querySelector('#post_content'))
    .then(editor => {
        console.log(editor);
    })

ClassicEditor
    .create(document.querySelector('#update_post_content'))
    .then(newEditor => {
        editor = newEditor;
    })
</script>

<?php include 'includes/footer.php'; ?>