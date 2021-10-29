<?php
   // include 'check_session.php';
?>
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
    //Gather data sent from AmendProducts.php page 
    if(isset($_POST['addsubmit']))
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
        //$vendor = $_SESSION['session_user'];

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

    //Produce an update query to insert item record for the id provided 
    $vendor = $_GET['vendorid'];
    $itemaddquery = "INSERT INTO item (item_type, item_name, item_image, price, item_description, rating_stars, stock, 
                        date_modified, vendor_id, brand_id) 
     VALUES ('$itemtype', '$itemname', '$name', '$price', '$description', 
                        $ratingstars, $stock, '$today', $vendor ,$brand)";
    $cataddquery = "INSERT INTO item_category (cat_id) VALUES ( $cat)";
    
    if(isset($name) && $name != "itemimage" &&  !empty($name))
    { echo "0";
        if($image_upload_status == 1)
        { //echo "1";
            //run query  
            $itemaddresult = mysqli_query($connection, $itemaddquery);
            $cataddresult = mysqli_query($connection, $cataddquery);
            //Redirect to watWk8.php page 
            //header( 'Location: manageitem.php' ) ;   
            if($itemaddresult)   
                echo '<h1 class="text-light">ITEM INSERTED SUCCESSFULLY!!</h1>';
        }
       // else{
            //echo '<h3 class="text-light">Redirecting to manageitem.php in 
            //<span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
         //   exit();
       // }
    }
    else
    {
       // echo "2";
        //run query  
        $itemaddresult = mysqli_query($connection, $itemaddquery);
        $cataddresult = mysqli_query($connection, $cataddquery);
        //Redirect to watWk8.php page 
        //header( 'Location: manageitem.php' ) ;   
        if($itemaddresult)   echo '<h1 class="text-light">ITEM INSERTED SUCCESSFULLY!!</h1>';
    }


    echo '<h3 class="text-light">Redirecting to manageitem.php in 
            <span id="time" class="text-danger" style="font-size:8vw;">10</span> seconds</h3>';
    }
?>