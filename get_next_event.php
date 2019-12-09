<?php
session_start();
header('Content-Type: application/json;charset=utf-8');

include('pdo_connect.php');

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
    $require_login_option = ' >= 0 ';
} else {
    $require_login_option = ' = 0 ';
}

$stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image, require_login FROM counters 
        WHERE count_to > now() AND require_login $require_login_option 
        ORDER BY count_to;");
$stmt->execute();

 
$data = json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);

// file_put_contents('myjson.json',$data);

echo $data;

