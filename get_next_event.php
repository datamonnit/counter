<?php
header('Content-Type: application/json;charset=utf-8');

include('pdo_connect.php');

$stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image FROM counters 
        WHERE count_to > now()
        ORDER BY count_to;");
$stmt->execute();

 
$data = json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);

// file_put_contents('myjson.json',$data);

echo $data;

