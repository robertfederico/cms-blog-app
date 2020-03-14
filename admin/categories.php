<?php
include 'includes/header.php';
?>

<div class="page-wrapper chiller-theme toggled">

    <?php include 'includes/sidenav.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <h5 class="title-header">Categories</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white">
                    <div class="title-container">
                        <h5>Categories</h5>
                        <p>Here you can manage categories</p>
                    </div>
                    <div class="filter-container">
                        <button href='#' class='btn btn-success custom-btn-primary mb-3' data-toggle="modal"
                            data-target="#add_modal">
                            Add Category
                        </button>
                        <div class="table-responsive">
                            <table id="categories" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Image</th>
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
        </div>
    </main>
</div>
<!-- Add  Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- save vategories -->
                <?php
                insert_categories();
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat_title">Category Title</label>
                        <input name="cat_title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cat_image">Category Image</label>
                        <div class="card border-dark p-1 mb-2">
                            <img id="img" src="../images/upload.png" class="img-fluid" alt="image">
                        </div>
                        <input name="cat_image" id="update_post_image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary custom-btn-primary" name="submit" type="submit">Add
                            Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat_title">Category Title</label>
                        <input name="update_category" id="update_category" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="vat_image">Category Image</label>
                        <div class="card border-dark p-1 mb-2">
                            <img id="image" src="" id="image" class="img-fluid" alt="image">
                        </div>
                        <input type="file" id="cat_file" class="form-control" name="update_cat_image">
                    </div>
                    <div class="form-group">
                        <input name="update_category_id" id="update_category_id" type="hidden">
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