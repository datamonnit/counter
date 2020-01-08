<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All events</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin-styles.css">
</head>
<body onload="getData()">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CounterApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./">Counter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="jumbotron">
        <h1>CounterApp</h1>
        <p>Follow all your important dates...</p>
    </div>

    <div class="container">

        <h1>All events</h1>

        <div id="data-container"></div>

    </div>   

    <script src="../js/jquery.min.js"></script>
    <script src="../js/boostrap.min.js"></script>
    <script>






        function getData(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    events = JSON.parse(this.responseText);
                    if (events.length > 0) {
                        console.log(events);
                        listEvents(events);
                    } else {
                    
                        console.log(events)
                    }
                    
                }
            };
            xmlhttp.open("GET", "../api/get_all_events.php?q="+Date.now(), true);
            xmlhttp.send();
        }

        function listEvents(data){
            const dataContainer = document.getElementById("data-container");
            data.forEach(element => {
                
                // New event-div
                let eventDiv = document.createElement('div');
                let eventClass = document.createAttribute('class');
                eventClass.value = 'event';
                eventDiv.setAttributeNode(eventClass);

                // Event topic
                let eventNameSpan = document.createElement('span');
                let eventName = document.createTextNode(element.topic);
                eventNameSpan.appendChild(eventName)
                eventDiv.appendChild(eventNameSpan);
                
                let topicClass = document.createAttribute('class');
                topicClass.value = 'topic';
                eventNameSpan.setAttributeNode(topicClass);


                // Event Message
                let eventMsgSpan = document.createElement('span');
                let eventMsg = document.createTextNode(element.msg);
                eventMsgSpan.appendChild(eventMsg);
                eventDiv.appendChild(eventMsgSpan);

                let msgClass = document.createAttribute('class');
                msgClass.value = 'msg';
                eventMsgSpan.setAttributeNode(msgClass);
    
                // Count to
                var t = element.count_to.split(/[- :]/);

                // Apply each element to the Date function
                var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
                let eventDateSpan = document.createElement('span');
                let eventDate = document.createTextNode(d);
                eventDateSpan.appendChild(eventDate);
                eventDiv.appendChild(eventDateSpan);
 

                // Image
                let showImageBtn = document.createElement('button');
                let showImageBtnLabel = document.createTextNode('Show pic');
                showImageBtn.appendChild(showImageBtnLabel);

                let btnClass = document.createAttribute('class');
                btnClass.value = 'show-image';
                showImageBtn.setAttributeNode(btnClass);
                eventDiv.appendChild(showImageBtn);

                let eventImgDiv = document.createElement('div');
                let divStyle = document.createAttribute('style');
                divStyle.value = 'display: none;';
                eventImgDiv.setAttributeNode(divStyle);

                let eventImg = document.createElement('img');
                let src = document.createAttribute('src');
                src.value = '../upload/'+element.bg_image;
                eventImg.setAttributeNode(src);
                let imgClass = document.createAttribute('class');
                imgClass.value = 'image';
                eventImg.setAttributeNode(imgClass);


                eventImgDiv.appendChild(eventImg);
                eventDiv.appendChild(eventImgDiv);

                dataContainer.appendChild(eventDiv);
            });

        }


        document.body.addEventListener("click", function (e) {
            console.log(e.target);
            if (e.target && e.target.classList.contains("image")) {
                console.clear();
                console.log("An element with class 'image' was clicked.")
                console.log(e.target.parentElement);
                e.target.parentElement.style.display = 'none';
            }
            
            if (e.target && e.target.classList.contains("show-image")) {
                // console.clear();
                console.log("An element with class 'show-image' was clicked.")
                e.target.style.fontWeight = e.target.style.fontWeight === "bold" ? "normal" : "bold";
                e.target.nextSibling.style.display = 'block'; 
            }
            

        });


    </script>
</body>
</html>