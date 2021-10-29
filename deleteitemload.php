<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="10;url=manageitem.php">
   <!-- Bootstrap Core JavaScript -->
   <script src="bootstrap/js/bootstrap.js"></script>
    <!--Bootstrap Core CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" / >
    <script src="bootstrap/js/jquery-3.4.1.js"></script>
    <title>Motoritz Autopartz</title>
    <style>
        body{
            background-color:#1089ff;
            justify-content:center;
            padding:25vw;
            padding-top:10vh;
        }
        h1{
            color:#35495e;
        }
    </style>
    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveseconds = 10,
                display = document.querySelector('#time');
            startTimer(fiveseconds, display);
        };
    </script>
</head>
<body>
    
</body>
</html>
<?php 
    //Make connection to database 
    include 'maconnection.php';
    //Gather data sent from Manageitem.php page 
    
        $id = $_GET['id'];
        
        //Query for dropping column from item table
        $del_query1 = "DELETE FROM item WHERE item_id = $id";

        //Query for dropping column from item_category table
        $del_query2 = "DELETE FROM item_category WHERE item_id = $id";
    
        //running queries
        $itemdeleteresult = mysqli_query($connection, $del_query1);
        $catdeleteresult = mysqli_query($connection, $del_query2);
        
        //displaying message
        if($itemdeleteresult && $catdeleteresult)   
            echo '<h1 class="text-success">ITEM DELETED SUCCESSFULLY!!</h1>';
        else  
            echo '<h3 class="text-danger">ITEM DELETION FAILED!!</h3>';
    

    echo '<h3 class="text-light">Redirecting to manageitem.php in 
            <span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
?>