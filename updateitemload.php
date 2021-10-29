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
    //Gather data sent from manageitem.php page 
    if(isset($_POST['updatesubmit']))
    {
        $id = $_POST['itemid'];
        $itemname = $_POST['itemname'];
        $price = $_POST['price'];
        $description = $_POST['itemdescription'];
        $itemtype = $_POST['itemtype'];
        $ratingstars = $_POST['ratingstars'];
        $stock = $_POST['stock'];
        $brand = $_POST['brand'];
        $cat = $_POST['cat'];

        $name = $_FILES["itemimage"]["name"];
        if(isset($name) && $name != "itemimage" && !empty($name))
        {
            //Image Upload to folder
            
            $size = $_FILES["itemimage"]["size"];
            $type = $_FILES["itemimage"]["type"];
            $tmpname = $_FILES["itemimage"]["tmp_name"];

            $image_upload_status = 0;
            if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif"
                && $size <= (1*1024*1024))
            {
                if(file_exists("uploads/item/".$name))
                {
                    echo '<h2 class="text-danger"> IMAGE UPLOAD FAILED!! <br /> '.$name.' already exists!!</h2>';
                    echo '<h3 class="text-light">Redirecting to manageitem.php in 
                    <span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
                }
                else
                {
                    if(move_uploaded_file($tmpname, "uploads/item/".$name))
                    {
                        echo $name.'<h5 class="text-light">Image Uploaded Successfully!</h5>';
                        //echo "<br/>$type<br/>$size";
                        $image_upload_status = 1;
                    }
                    else{
                        echo '<h2 class="text-danger">IMAGE UPLOAD FAILED!!<br /> Error, Not Uploaded!!</h2>';
                        echo '<h3 class="text-light">Redirecting to manageitem.php in 
                        <span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
                    }
                }
            }
            else{
                echo '<h2 class="text-danger">IMAGE UPLOAD FAILED!!<br /> Only accept images under 1 MB</h2>'.$name;
                echo '<h3 class="text-light">Redirecting to manageitem.php in 
                <span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
            }
        
        }   
    
    $today = date("Y-m-d");

    //Produce an update query to update product record for the id provided 
    $itemupdatequery = "UPDATE item SET item_name = '$itemname', 
        price = '$price', 
        item_image = '$name',
        item_type = '$itemtype',
        item_description = '$description',
        rating_stars = $ratingstars,
        stock = $stock,
        brand_id = $brand,
        date_modified = '$today'
        where item_id = $id";
    $catupdatequery = "UPDATE item_category SET cat_id = $cat
                        WHERE item_id = $id";
    
    if(isset($name) && $name != "itemimage" &&  !empty($name))
    {
        if($image_upload_status == 1)
        {
            //run query  
            $itemupdateresult = mysqli_query($connection, $itemupdatequery);
            $catupdateresult = mysqli_query($connection, $catupdatequery);
            //Redirect to watWk8.php page 
            //header( 'Location: manageitem.php' ) ;   
            if($itemupdateresult)   echo '<h1 class="text-light">ITEM UPDATED SUCCESSFULLY!!</h1>';
        }
       // else{
            //echo '<h3 class="text-light">Redirecting to manageitem.php in 
            //<span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
         //   exit();
       // }
    }
    else
    {
        //run query  
        $itemupdateresult = mysqli_query($connection, $itemupdatequery);
        $catupdateresult = mysqli_query($connection, $catupdatequery);
        //Redirect to watWk8.php page 
        //header( 'Location: manageitem.php' ) ;   
        if($itemupdateresult)   echo '<h1 class="text-light">ITEM UPDATED SUCCESSFULLY!!</h1>';
    }


    echo '<h3 class="text-light">Redirecting to manageitem.php in 
            <span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
}
?>