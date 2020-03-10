<?php
require '../../includes/db_conn.php';

function viewPosts()
{
    global $conn;

    $col = array(
        0   =>  'posts_id',
        1   =>  'post_cat_id',
        2   =>  'post_title',
        3   =>  'post_author',
        4   =>  'post_date',
        5   =>  'post_image',
        6   =>  'post_content',
        7   =>  'post_tag',
        8   =>  'post_comment_count',
        9   =>  'post_status'
    );  //create column like table in database

    $request = $_REQUEST;
    $sql = "SELECT * FROM posts";

    $query = mysqli_query($conn, $sql);

    $totalData = mysqli_num_rows($query);

    $totalFilter = $totalData;

    //Search
    $sql = "SELECT * FROM posts";
    if (!empty($request['search']['value'])) {
        $sql .= " AND (posts_id Like '" . $request['search']['value'] . "%' ";
        $sql .= " OR post_cat_id Like '" . $request['search']['value'] . "%' ";
        $sql .= " OR post_author Like '" . $request['search']['value'] . "%' ";
        $sql .= " OR post_tag Like '" . $request['search']['value'] . "%' )";
    }
    $query = mysqli_query($conn, $sql);
    $totalData = mysqli_num_rows($query);

    //Order
    $sql .= " ORDER BY " . $col[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " .
        $request['start'] . "  ," . $request['length'] . "  ";

    $query = mysqli_query($conn, $sql);

    $data = array();
    $posts_row_id = 1;
    while ($row = mysqli_fetch_array($query)) {
        $subdata = array();
        $subdata[] = "<label class='custom-control material-checkbox'>
                        <input type='checkbox' class='material-control-input'name='checkboxArray[]' value='{$row[0]}'>
                        <span class='material-control-indicator'></span>
                    </label>";
        $subdata[] = $posts_row_id;
        $subdata[] = $row[3];
        $subdata[] = $row[2];

        //category
        $query_category = "SELECT * FROM categories WHERE category_id ={$row[1]}";
        $fetch_result  = mysqli_query($conn, $query_category);

        while ($cat_row = mysqli_fetch_assoc($fetch_result)) {
            $category_title = $cat_row['category_title'];
        }

        $subdata[] = $category_title;
        $subdata[] = $row[9];
        $subdata[] = "<img class='img-fluid' src='../images/{$row[5]}'>";
        $subdata[] = $row[7];
        $subdata[] = $row[8];
        $subdata[] = $row[4];
        $subdata[] = " <a href='view-posts.php?delete={$row[0]}' class='btn btn-danger btn-sm rounded-circle'>
                            <i class='fas fa-trash'></i>
                        </a>
                        <a href='view-posts.php?source=edit_post&p_id={$row[0]}' class='btn btn-success btn-sm edit_posts rounded-circle'>
                            <i class='fas fa-edit'></i>
                        </a>";
        $data[] = $subdata;
        $posts_row_id++;
    }

    $json_data = array(
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFilter),
        "data" => $data
    );

    echo json_encode($json_data);
}

if (isset($_POST['post_status'])) {
    $col = array(
        0   =>  'posts_id',
        1   =>  'post_cat_id',
        2   =>  'post_title',
        3   =>  'post_author',
        4   =>  'post_date',
        5   =>  'post_image',
        6   =>  'post_content',
        7   =>  'post_tag',
        8   =>  'post_comment_count',
        9   =>  'post_status'
    );  //create column like table in database

    $post_status = $_POST['post_status'];

    if ($post_status == 'view') {
        viewPosts();
    } else {

        $request = $_REQUEST;


        $sql = "SELECT * FROM posts WHERE post_status = '$post_status'";

        $query = mysqli_query($conn, $sql);

        $totalData = mysqli_num_rows($query);

        $totalFilter = $totalData;

        //Search
        $sql = "SELECT * FROM posts WHERE post_status = '$post_status'";
        if (!empty($request['search']['value'])) {
            $sql .= " AND (posts_id Like '" . $request['search']['value'] . "%' ";
            $sql .= " OR post_cat_id Like '" . $request['search']['value'] . "%' ";
            $sql .= " OR post_author Like '" . $request['search']['value'] . "%' ";
            $sql .= " OR post_tag Like '" . $request['search']['value'] . "%' )";
        }
        $query = mysqli_query($conn, $sql);
        $totalData = mysqli_num_rows($query);

        //Order
        $sql .= " ORDER BY " . $col[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " .
            $request['start'] . "  ," . $request['length'] . "  ";

        $query = mysqli_query($conn, $sql);

        $data = array();
        $posts_row_id = 1;
        while ($row = mysqli_fetch_array($query)) {
            $subdata = array();
            $subdata[] = "<label class='custom-control material-checkbox'>
                            <input type='checkbox' class='material-control-input' name='checkboxArray[]' value='{$row[0]}'>
                            <span class='material-control-indicator'></span>
                        </label>";
            $subdata[] = $posts_row_id;
            $subdata[] = $row[3];
            $subdata[] = $row[2];

            //category
            $query_category = "SELECT * FROM categories WHERE category_id ={$row[1]}";
            $fetch_result  = mysqli_query($conn, $query_category);

            while ($cat_row = mysqli_fetch_assoc($fetch_result)) {
                $category_title = $cat_row['category_title'];
            }

            $subdata[] = $category_title;
            $subdata[] = $row[9];
            $subdata[] = "<img class='img-fluid' src='../images/{$row[5]}'>";
            $subdata[] = $row[7];
            $subdata[] = $row[8];
            $subdata[] = $row[4];
            $subdata[] = " <a href='view-posts.php?delete={$row[0]}' class='btn btn-danger btn-sm rounded-circle'>
                                <i class='fas fa-trash'></i>
                            </a>
                            <a href='view-posts.php?source=edit_post&p_id={$row[0]}' class='btn btn-success btn-sm edit_posts rounded-circle'>
                                <i class='fas fa-edit'></i>
                            </a>";
            $data[] = $subdata;
            $posts_row_id++;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFilter),
            "data" => $data
        );

        echo json_encode($json_data);
    }
} else {

    viewPosts();
}