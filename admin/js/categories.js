
$(document).ready(function () {
    // open modal for EDIT CATEGORY
    $('.edit_category').on('click', function () {
        var cat_id = $(this).data('id');
        var title = $(this).data('title');
        var image = $(this).data('image');

        $('#update_category').val(title);
        $('#update_category_id').val(cat_id);
        $("#image").attr("src", "../images/" + image);
        $('#edit_modal').modal('show');
    });
})