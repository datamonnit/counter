<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    header('Location: admin/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

    <div class="jumbotron">
    <h1>Login to counterApp</h1>
    <p>Follow all your important dates...</p>
    </div>

    <div class="container">

        <form action="check_login.php" method="post">
            <div class="form-group">
                <label for="code">Code</label>
                <input class="form-control" type="text" name="code">
            </div>
            <input class="btn btn-primary" type="button" value="Login">
        </form>
    </div>   
</body>
</html>