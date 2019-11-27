<?php
include('pdo_connect.php');

$stmt = $conn->prepare("SELECT id, topic, msg, count_to, bg_image FROM counters 
        WHERE count_to > now()
        ORDER BY count_to;");
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Peli-ilta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<style>

@import url('https://fonts.googleapis.com/css?family=Fjalla+One&display=swap');

body, html {
    font-family: 'Fjalla One', sans-serif;
    height: 100%;
    margin: 0px;
}

img.sticky {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 15%;
}

span {
    font-size: 5vw;
    display: block;
}

.bg {
  /* The image used */
  background-image: url("upload/<?php echo $row['bg_image']; ?>");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding-top: 30px;
}

p {
  text-align: center;
  font-size: 70px;
  margin-top: 0px;
  background-color: rgba(0,0,0,0.5);
  color: #fff;
  
}

.center p {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.header {
    text-align: center;
}

.header h1 {
    margin-top: 10px;
    padding: 0.1vh;
    display: inline;
    text-align: center;
    font-size: 8vw;
    background-color: rgba(255,255,255,0.5)
    
}

@media only screen and (max-width: 600px) {
 
    span {
        display: block;
        font-size: 60px;
    }

    .header h1 {
        font-size: 60px;
    }

    img.sticky {
        width: 50%;
    }

}

@media only screen 
    and (max-width: 820px) 
    and (orientation: landscape){
    

        span {
            font-size: 30px;
            display: inline;
        }

    .bg {
        width: 100%;
    }


    .header h1 {
        padding: 3px;
        margin: 10px 0;
        display: inline-block;
        text-align: center;
        font-size: 50px;
    }

    .center p {
        margin: 0;
        position: absolute;
        top: 60%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
}

}



</style>
</head>
<body>
    <div class="bg center">
        <div class="header">
            <h1><?php echo $row['topic']; ?></h1>
        </div>
        
        <p id="demo"></p>

        <img src="img/koira.gif" alt="Koira" class="sticky">
    </div>
    
<script>
// Set the date we're counting down to
// var countDownDate = new Date("Nov 23, 2019 15:00:00").getTime();
var countDownDate = new Date("<?php echo $row['count_to']; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  if (hours > 0) {
    document.getElementById("demo").innerHTML = `
        <span>${days}pv ${hours}h</span>
        <span>${minutes}m ${seconds}s</span>`;
  } else if (minutes > 0) {
    document.getElementById("demo").innerHTML = `
        <span>${minutes}m ${seconds}s</span>`;
  } else {
    document.getElementById("demo").innerHTML = `
        <span>${seconds}s</span>`;
  }
  
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "<?php echo $row['msg']; ?>";
  }
}, 1000);
</script>

</body>
</html>
