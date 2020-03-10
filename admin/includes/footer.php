 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

 <script>
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
        [1, 'asc']
    ]
});
$("#selectAll").click(function() {
    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
 </script>

 <!-- script for update post image -->
 <script>
$(function() {
    $('#update_post_image').change(function() {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext ==
                "jpg")) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#img').attr('src', '../images/');
        }
    });

});
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

 <!-- add posts -->
 <script>
ClassicEditor
    .create(document.querySelector('#post_content'))
    .then(editor => {
        console.log(editor);
    })
 </script>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
 <script type="text/javascript">
google.charts.load('current', {
    packages: ['corechart', 'bar']
});
google.charts.setOnLoadCallback(load_monthwise_data);

function load_monthwise_data() {
    $.ajax({
        url: "getData.php",
        dataType: "JSON",
        async: false,
        success: function(data) {
            drawMonthwiseChart(data);
        }
    });
}

function drawMonthwiseChart(chart_data) {
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', '');
    data.addColumn('number', 'Count');
    $.each(jsonData, function(i, jsonData) {
        var month = jsonData.text;
        var profit = parseFloat($.trim(jsonData.count));
        data.addRows([
            [month, profit]
        ]);
    });
    var options = {
        chart: {
            title: 'Statistics',
            subtitle: 'Current count',
        },
        colors: ['#1b9e77'],
        animation: {
            duration: 5000,
            easing: 'out',
        }

    };

    //var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
}
 </script>


 <script>
$(document).ready(function() {
    $('ul li a').click(function() {
        $('li a').removeClass("active");
        $(this).addClass("active");
        localStorage.setItem('active', $(this).parent().index());
    });

    var ele = localStorage.getItem('active');
    $(' ul li:eq(' + ele + ')').find('a').addClass('active');
});
 </script>

 <!-- change datatable value -->
 <script>
$(document).on('change', '#post_status', function() {
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
 </script>
 </body>

 </html>