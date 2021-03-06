<?php

//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Peli-ilta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body onload="getEvents()">
    
    <div id="bg" class="bg center">
        <div class="header">
            <h1 id="topic"></h1>
        </div>
        
        <p id="demo"></p>
        <a href="./admin" onclick="vuf()">
            <img src="img/koira.gif" alt="Koira" class="sticky">
        </a>
        
    </div>
    <div class="footer">
        <div style="text-align: left;">
            <i class="left" onclick="changeEvent(-1)"></i>
        </div>
        <div>
            <p id="change"></p>
        </div>
        <div style="text-align: right;">
            <i class="right" onclick="changeEvent(1)"></i>
        </div>
      
    </div>

    
<script>

let events, eventIndex = 0, x;


function zeroPad(num, places) {
  return String(num).padStart(places, '0')
}


function getEvents(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            events = JSON.parse(this.responseText);
            if (events.length > 0) {
                console.log(events);
                showEvent();
            } else {
                noEvents();
            }
            // document.getElementById("demo").innerHTML = myObj.name;
        }
    };
    xmlhttp.open("GET", "get_next_event.php?q="+Date.now(), true);
    xmlhttp.send();
}

function noEvents(){
    document.getElementById("topic").innerHTML = "No events to show";
    document.getElementById("bg").style.backgroundImage = `url('img/default-event.jpg')`
    document.title = "Event counter";
    document.getElementById("demo").innerHTML = "Login to create new event";
}

function showEvent(){
    
    // if (events[eventIndex].require_login != 0){
    //     changeEvent(1);
    //     return;
    // }

    document.getElementById("topic").innerHTML = events[eventIndex].topic;
    document.getElementById("bg").style.backgroundImage = `url('upload/${events[eventIndex].bg_image}')`
    document.title = events[eventIndex].topic;

    // Set the date we're counting down to
    // var countDownDate = new Date("Nov 23, 2019 15:00:00").getTime();
    var t = events[eventIndex].count_to.split(/[- :]/);
    console.log(t);
    var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
    console.log(d);
    var countDownDate = new Date(d).getTime();
    console.log(countDownDate);
    // Update the count down every 1 second
    x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
        
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    seconds = zeroPad(seconds,2);
    minutes = zeroPad(minutes,2);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = "";

    if (days > 0) {
        document.getElementById("demo").innerHTML += `<span style="display: block;">${days}<br>päivää<br>jäljellä</span>`
    } else {

        if (hours > 0 || (hours == 0 && days > 0)){
            document.getElementById("demo").innerHTML += `<span>${hours}:</span>`
        }
        if (minutes > 0 || (minutes == 0 && (hours > 0 || days > 0))){
            document.getElementById("demo").innerHTML += `<span>${minutes}:</span>`
        }
        document.getElementById("demo").innerHTML += `<span>${seconds}</span>`;
    }
    
    
    // if (days == 0 && hours > 0) {
    //     document.getElementById("demo").innerHTML = `
    //         <span>${hours}<span class="unit">h</span></span>
    //         <span>${minutes}<span class="unit">m</span> ${seconds}<span class="unit">s</span></span>`;        
    // }

    // else if (days > 0 || hours > 0) {
    //     document.getElementById("demo").innerHTML = `
    //         <span>${days}<span class="unit">pv</span> ${hours}<span class="unit">h</span></span>
    //         <span>${minutes}<span class="unit">m</span> ${seconds}<span class="unit">s</span></span>`;
    // } else if (minutes > 0) {
    //     document.getElementById("demo").innerHTML = `
    //         <span>${minutes}<span clss="unit">m</span> ${seconds}<span class="unit">s</span></span>`;
    // } else {
    //     document.getElementById("demo").innerHTML = `
    //         <span>${seconds}<span class="unit">s</span></span>`;
    // }
    
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = events[eventIndex].msg;
    }
    }, 1000);
}

function changeEvent(n){
    
    clearInterval(x);
    
    eventIndex = eventIndex + n;
    if (eventIndex >= events.length) {
        eventIndex = 0;
    } else if (eventIndex < 0){
        eventIndex = events.length -1;
    }
    showEvent();
}

function vuf(){
    
}

</script>

</body>
</html>
