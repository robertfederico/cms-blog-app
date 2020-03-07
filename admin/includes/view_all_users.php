<!-- Fix this tomorrow -->

<table id="post_table" class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $row_id = 1;

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

            echo "
                <tr>
                    <td>{$row_id}</td>
                    <td>{$username}</td>
                    <td>{$user_firstname}</td>
                    <td>{$user_lastname}</td>
                    <td>{$user_email}</td>
                    <td>{$user_role}</td>
                    <td></td>
                    <td>
                        <a href='users.php?source=edit_user&u_id={$user_id}' class='btn btn-primary btn-sm rounded-circle'>
                            <i class='fas fa-edit'></i>
                        </a>
                        <a href='users.php?delete={$user_id}' class='btn btn-danger btn-sm rounded-circle'>
                            <i class='fas fa-trash'></i>
                        </a>
                    </td>
                </tr>";
            $row_id++;
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];

    $delete_query = "DELETE FROM users WHERE `user_id` ={$user_id}";
    $delete_res = mysqli_query($conn, $delete_query);

    if (!$delete_res) {
        die('Failed' . mysqli_error($conn));
    } else {
        header("Location: users.php");
    }
}

?>