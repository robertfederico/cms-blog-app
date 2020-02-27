<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <h2>Categories</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow p-4">
                        <!-- save vategories -->
                        <?php
                        insert_categories();
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Category Title</label>
                                <input name="cat_title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="submit" type="submit">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card shadow p-4">
                        <table id="categories" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                display_categories();
                                ?>
                            </tbody>

                            <!-- delete -->

                            <?php
                            delete_category();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($conn, $query);
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="cat_title">Category Title</label>
                        <input name="update_category" id="update_category" type="text" class="form-control">
                        <input name="update_category_id" id="update_category_id" type="hidden">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="update" type="submit">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
update_category();
?>
<?php include 'includes/footer.php'; ?>