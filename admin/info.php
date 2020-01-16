<?php
header('Content-Type: application/json;charset=utf-8');

include('../pdo_connect.php');

if ($_GET['choice'] == 'all') {

    $stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image, require_login FROM counters ORDER BY count_to;");

} else if ($_GET['choice'] == 'require_login'){

    $stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image, require_login FROM counters WHERE require_login = 1 ORDER BY count_to;");

} else if ($_GET['choice'] == 'no_login'){
    
    $stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image, require_login FROM counters WHERE require_login = 0 ORDER BY count_to;");

}

$stmt->execute();
 
$data = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);

echo $data;
