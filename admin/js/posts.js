
$(document).ready(function () {
    $('#comments_table').dataTable();
    $('#categories').dataTable();
    $("#post_table").dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'fetch-data/fetch-posts.php',
            type: 'GET'
        },
        'columnDefs': [{
            'orderable': false,
            'targets': 0
        }],
        'aaSorting': [
            [2, 'asc']
        ]
    });

    $("#selectAll").click(function () {
        if (this.checked) {
            $('.checkbox').each(function () {
                this.checked = true;
            })
        } else {
            $('.checkbox').each(function () {
                this.checked = false;
            })
        }
    });

    // script for update post image
    $('#update_post_image').change(function () {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext ==
            "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#img').attr('src', '../images/');
        }
    });

    // open edit modal for EDIT POSTS
    $('.edit_posts').on('click', function () {

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

    // Delete
    $('#post_table').on('click', '.delete', function () {
        var post_id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'Confirm Deletion',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            allowOutsideClick: false
        })
            .then(willDelete => {
                if (willDelete.value) {
                    $.ajax({
                        url: 'posts_function/delete-post.php',
                        type: 'GET',
                        data: {
                            post_id: post_id
                        },
                        success: function (msg) {
                            console.log(msg);
                            if (msg == 'delete') {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Post deleted successfully',
                                    type: 'success'
                                });
                                setTimeout('location.reload(true);', 1000);
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: msg,
                                    type: 'error'
                                });
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong', 'error');
                        }
                    });
                } else if (willDelete.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', '', 'error');
                }
            })
            .catch(err => {
                if (err) {
                    Swal.fire('Oh noes!', 'The AJAX request failed!', 'error');
                } else {
                    swal.stopLoading();
                    swal.close();
                }
            });
    });

    // fetch posts based on selectd dropdown value 
    $(document).on('change', '#post_status', function () {


        var post_status = $("#post_status").val();

        if (post_status != "") {
            $("#post_table").dataTable().fnDestroy();
            $('#post_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'fetch-data/fetch-posts.php',
                    type: 'POST',
                    data: {
                        post_status: post_status
                    }
                },
                'columnDefs': [{
                    'orderable': false,
                    'targets': 0
                }],
                'aaSorting': [
                    [1, 'asc']
                ]
            });
        } else if (post_status == 'view') {
            $("#post_table").dataTable().fnDestroy();
            $("#post_table").dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'fetch-data/fetch-posts.php',
                    type: 'GET'
                },
                'columnDefs': [{
                    'orderable': false,
                    'targets': 0
                }],
                'aaSorting': [
                    [1, 'asc']
                ]
            });
        }
    });

})

// Delete
// $('#publish').on('click', function () {
//     var post_id = $(this).data('id');
//     Swal.fire({
//         title: 'Are you sure?',
//         text: 'Confirm Deletion',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!',
//         allowOutsideClick: false
//     })
//         .then(willDelete => {
//             if (willDelete.value) {
//                 $.ajax({
//                     url: 'posts_function/delete-post.php',
//                     type: 'GET',
//                     data: {
//                         post_id: post_id
//                     },
//                     success: function (msg) {
//                         console.log(msg);
//                         if (msg == 'delete') {
//                             Swal.fire({
//                                 title: 'Success',
//                                 text: 'Post deleted successfully',
//                                 type: 'success'
//                             });
//                             setTimeout('location.reload(true);', 1000);
//                         } else {
//                             Swal.fire({
//                                 title: 'Error',
//                                 text: msg,
//                                 type: 'error'
//                             });
//                         }
//                     },
//                     error: function () {
//                         Swal.fire('Error', 'Something went wrong', 'error');
//                     }
//                 });
//             } else if (willDelete.dismiss === Swal.DismissReason.cancel) {
//                 Swal.fire('Cancelled', '', 'error');
//             }
//         })
//         .catch(err => {
//             if (err) {
//                 Swal.fire('Oh noes!', 'The AJAX request failed!', 'error');
//             } else {
//                 swal.stopLoading();
//                 swal.close();
//             }
//         });
// });