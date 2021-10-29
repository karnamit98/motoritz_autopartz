<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' type='text/css' href="../style.css" />
        <title>Login</title>
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
    </body>
</html>
<?php 
    //include init.php 
    include 'init.php';
    
    //Gather details submitted from the $_POST array and store in local vars 
    if(isset($_POST['subLogin']))
    {
        $user = $_POST['txtUser'];
        $pass = md5($_POST['txtPass']);
    }
    
    //build query to SELECT records from the users table WHERE 
    //the username AND password in the table are equal to those entered.  
    $query = "SELECT * FROM users WHERE username = '$user' and password = '$pass'"; 
    //run query and store result 
    $result = mysqli_query($connection, $query);
    
    //check result and generate message with code below 
    if ($row = mysqli_fetch_assoc($result)) 
    {  
        //echo '<b style="color:#007944">You are recognised!!</b>'; 
        $_SESSION['user'] = $user;      //storing username in session variable
        header ('location: watWk9.php');    //redirecting to watWk9.php
    } 
    else 
    { 
        //echo '<b style="color:#f0134d">Not recognised!!</b>';
        $_SESSION['error'] = "<b style='color:#f0134d;'>Login Failed! <br />User not Recognised!</b><hr />";    //creating session variable for error case
        header ('location: watWk9.php');                //redericting to watWk9.php
    } 
    echo "<br /><br />"; 
    
?>