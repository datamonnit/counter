<?php
session_start();
if (!isset($_POST['save_counter'])) {
    $msg = urlencode('Did not fill the form yet!');
    header('Location: add_counter.php?');
}

include('../pdo_connect.php');

if ($_FILES['bg_image']['error'] == 0) {
    include 'upload_file.php';

    $bg_image = upload_files($_FILES, '../upload/');

    if (!$bg_image){
        $bg_image = 'kuva.jpg';
    }
} else {
    $bg_image = 'kuva.jpg';
}


$stmt = $conn->prepare("INSERT INTO counters (count_to, topic, msg, bg_image)
    VALUES (CONCAT(:count_day, ' ', :count_time ), :topic, :msg, :bg_image)");
$stmt->bindParam(':count_day', $day);
$stmt->bindParam(':count_time', $time);
$stmt->bindParam(':topic', $topic);
$stmt->bindParam(':msg', $msg);
$stmt->bindParam(':bg_image', $bg_image);

$day = $_POST['day'];
$time = $_POST['time'];
$topic = $_POST['topic'];
$msg = $_POST['msg'];
// $bg_image = $_FILES['bg_image']['name'];

if ($stmt->execute()){
    echo "<script>";
    echo "Success";
    echo $_POST['day'] . "<br>";
    echo $_POST['time'] . "<br>";
    echo "</script>";
} else {
    echo "<script>";
    echo "Error";
    echo "</script>";
}
header('Location: ../');