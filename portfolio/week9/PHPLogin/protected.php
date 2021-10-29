<?php 
    include 'init.php'; 
    if(!isset($_SESSION['user'])){ 
        header ('location:watWk9.php'); 
    } 
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' type='text/css' href="../style.css" />
        <title>Dashboard</title>
        <style>
            fieldset{
                border: 2px solid #4b8e8d;
                padding:0px 0px 20px 50px;
            }
        </style>
    </head>
    <body>
        <small style="float:right;margin-right:25px"> <a href="../../../watIndex.php">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
        <b>Name:</b> Amit Kumar Karn
        <hr />
        <?php
            echo "<h1 style='text-align:center;color:#3e64ff'>Welcome ".strtoupper($_SESSION['user'])."!</h1>";
            echo "<b style='color:#f45905'>You are now Logged in to the system!</b>";
            
        ?>
        <br />
        <a style="float:right" href="watWk9.php">Back</a>
        <br /><br /><br /><br />
    </body>
</html>