<?php
require "../includes/db_conn.php";
// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

// $string = file_get_contents("sampleData.json");
// echo $string;


//echo "['{$element_text[0]}'" . "{$element_count[0]}]";

$query1 = "SELECT * FROM chart_data";
$result = mysqli_query($conn, $query1);
foreach ($result as $row) {
    $output[] = array(
        'text'   => $row["element_text"],
        'count'  => $row["element_value"],
    );
}
echo json_encode($output);




// Instead you can query your database and parse into JSON etc etc