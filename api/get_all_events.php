<?php
session_start();
header('Content-Type: application/json;charset=utf-8');

include('../pdo_connect.php');

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
    $data = array(
        'status' => 'error',
        'message' => 'Un authorized access'
    );
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    
    //echo $data;

}

$stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image, require_login FROM counters ORDER BY count_to;");
$stmt->execute();
 
$data = json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);

echo $data;