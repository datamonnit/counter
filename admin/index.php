<?php
session_start();
if (!isset($_SESSION['logged_in'])){
    header('Location: ../login.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counter Edit</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                    <a class="nav-link" href="../">Counter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="jumbotron">
        <h1>Add a new timer event</h1>
        <p>Follow all your important dates...</p>
    </div>

    <div class="container">
        <h1>New counter</h1>
        <form action="save_counter.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="topic">Topic:</label>
                <input class="form-control" type="text" name="topic">
            </div>
            <div class="form-group">
                <label for="day">Day:</label>
                <input class="form-control" type="date" name="day">
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input class="form-control" type="time" name="time">
            </div>
            <div class="form-group">
                <label for="msg">Message after finnished:</label>
                <input class="form-control" type="text" name="msg">
            </div>
            <div class="form-group">
                <label for="message">Background image:</label>
                <input class="form-control" type="file" name="bg_image">
            </div>

            <input name="save_counter" type="submit" class="btn btn-primary" value="Save counter">

        </form>

        <a href="logout.php" class="btn btn-warnign">Logout</a>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/boostrap.min.js"></script>
</body>
</html>