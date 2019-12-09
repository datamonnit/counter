<?php
session_start();
if (isset($_SESSION['REFERER'])) {
    $location = $_SESSION['REFERER'];
} else {
    $location = 'admin/';
}

if (!isset($_POST['code']) || !isset($_POST['user'])) {
    header('Location: login.php?error=use_login_form');
    exit();
}

if (empty($_POST['code']) || empty($_POST['user'])) {
    header('Location: login.php?error=no_empty_fields');
    exit();
}

include 'pdo_connect.php';
$user = $_POST['user'];
$pwd = $_POST['code'];


$stmt = $conn->prepare(
    "SELECT id, username, passcode FROM users 
     WHERE username = ?;");
$stmt->execute([$user]);
$data = $stmt->fetch();

var_dump($data);

$login_pass = password_verify($pwd, $data['passcode']);

if ($login_pass){
    $_SESSION['user'] = $data['username'];
    $_SESSION['logged_in'] = TRUE;
    
    header('Location: ' . $location);
    exit();
} else {
    echo "Login failed";
}
