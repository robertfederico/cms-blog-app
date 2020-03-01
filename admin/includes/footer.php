 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

 <script>
$('#categories').dataTable();
$('#post_table').dataTable();
 </script>

 <!-- Menu Toggle Script -->
 <script>
$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
        .parent()
        .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .parent()
            .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
        $(this)
            .parent()
            .addClass("active");
    }
});

$("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
});

// open modal for EDIT CATEGORY
$('.edit_category').on('click', function() {
    var cat_id = $(this).data('id');
    var title = $(this).data('title');

    $('#update_category').val(title);
    $('#update_category_id').val(cat_id);

    $('#edit_modal').modal('show');
});

let editor;

ClassicEditor
    .create(document.querySelector('#update_post_content'))
    .then(newEditor => {
        editor = newEditor;
    })
// open edit modal for EDIT POSTS
$('.edit_posts').on('click', function() {

    const editorData = editor.getData();

    var posts_id = $(this).data('id');
    var post_author = $(this).data('post_author');
    var post_title = $(this).data('post_title');
    var post_cat_id = $(this).data('post_cat_id');
    var post_status = $(this).data('post_status');
    var post_tag = $(this).data('post_tag');
    var post_content = $(this).data('post_content');
    var post_image = $(this).data('post_image');

    $('#post_id').val(posts_id);
    $('#update_post_title').val(post_title);
    $('#update_post_category_id').val(post_cat_id);
    $('#update_post_author').val(post_author);
    $('#update_post_status').val(post_status);
    //  $('#update_post_image').attr("file", post_image);
    $('#update_post_tags').val(post_tag);
    editor.data.set(post_content);

    $('#edit_posts').modal('show');
});
 </script>

 <script>
ClassicEditor
    .create(document.querySelector('#post_content'))
    .then(editor => {
        console.log(editor);
    })
 </script>

 </body>

 </html>