<?php
include '../connection.php';
$user = $_POST['username'];
$pass = $_POST['password'];

// 
$sql = "SELECT *FROM user WhERE username = '$user' AND password = '$pass'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($get_row = $result->fetch_assoc()) {
        $data[] = $get_row;
    }

    echo json_encode(array(
        "success" => true,
        "data" => $data[0],
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "data" => [],
    ));
}
