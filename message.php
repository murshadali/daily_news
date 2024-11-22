<?php
include 'config.php';
$query = "SELECT * FROM reader_messages ORDER BY send_time DESC LIMIT 4";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($mysqli));
}
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
$input = json_decode(file_get_contents('php://input'),true);
if($input){
    $countId = $input['countId'];
}
$data = $articles[$countId];
header("Content-Type: application/json");
echo json_encode($data);
// print_r($data);
?>
