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
    <div class="container">
        <h1>Counter Edit</h1>
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
    </div>
    
</body>
</html>