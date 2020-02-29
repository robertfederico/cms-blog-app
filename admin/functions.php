<?php
include_once '../includes/db_conn.php';

function confirm_query($result)
{
    global $conn;
    if ($conn->query($result) === TRUE) {
        echo "<script>alert('Success');</script>";
    } else {
        echo "Error: " . $result . "<br>" . $conn->error;
    }
}

function insert_categories()
{
    global $conn;

    if (isset($_POST['submit'])) {
        $category = $_POST['cat_title'];

        if (empty($category)) {
            echo '<p class="text-danger m-0 font-italic">add a category</p>';
        } else {

            $query = "INSERT INTO categories(category_title)";
            $query .= "VALUE('{$category}')";

            $insert = mysqli_query($conn, $query);

            if (!$insert) {
                die('Failed' . mysqli_error($conn));
            }
        }
    }
}

function display_categories()
{
    global $conn;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($conn, $query);

    $cat_row_id = 1;
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_title = $row['category_title'];
        $cat_id = $row['category_id'];
        echo "
        <tr>
            <td>{$cat_row_id}</td>
            <td>{$cat_title}</td>
            <td>
                <a href='categories.php?delete={$cat_id}' class='btn btn-danger btn-sm rounded-circle'>
                    <i class='fas fa-trash'></i>
                </a>
                <a href='#' data-id='{$cat_id}' data-title='{$cat_title}' class='btn btn-success btn-sm edit_category rounded-circle'>
                     <i class='fas fa-edit'></i>
                </a>
            </td>
        </tr>";
        $cat_row_id++;
    }
}

function delete_category()
{
    global $conn;

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query_delete = "DELETE FROM categories WHERE category_id= {$delete_id}";
        $delete = mysqli_query($conn, $query_delete);
        if ($delete) {
            header("Location: categories.php");
        }
    }
}

function update_category()
{
    global $conn;
    if (isset($_POST['update'])) {
        $update_category_id = $_POST['update_category_id'];
        $update_category = $_POST['update_category'];

        $query_update = "UPDATE categories  SET category_title ='{$update_category}'  WHERE category_id= {$update_category_id}";
        $update = mysqli_query($conn, $query_update);
        if ($update) {
            header("Location: categories.php");
        } else {
            die('Failed' . mysqli_error($conn));
        }
    }
}