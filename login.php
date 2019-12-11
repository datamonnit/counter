<?php
session_start();

$_SESSION['REFERER'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'admin/' ;
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CounterApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./">Counter</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="jumbotron">
    <h1>Login to counterApp</h1>
    <p>Follow all your important dates...</p>
    </div>

    <div class="container">

        <form action="check_login.php" method="post">
            <div class="form-group">
                <label for="code">User</label>
                <input class="form-control" type="text" name="user">
                
                <label for="code">Code</label>
                <input class="form-control" type="password" name="code">
            </div>
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>   

    <script src="./js/jquery.min.js"></script>
    <script src="./js/boostrap.min.js"></script>
</body>
</html>