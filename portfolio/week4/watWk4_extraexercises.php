<!DOCTYPE html>
<html lang="en">    
    <head>   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">    
        <title>Extra Exercises</title>       
        <link type="text/css" rel="stylesheet" href="main.css" />    
        <style>
            a:link, a:visited {
                background-color: #f44336;
                background-color: green;
                color: white;
                padding: 14px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-weight:bolder;
                font-size:11pt;
            }

            a:hover, a:active {
                background-color: red;
                font-weight:border;
                font-size:11pt;
            }
            body{
                margin-left:15%;
                margin-right:15%;
                border-left:2px solid grey;
                border-right:2px solid grey;
                padding-left:20px;
                margin-top:2%;
                border-bottom:2px solid grey;
                background-color:#fcf5b0;
        }
        hr{margin-left:0px;width:97%;}
    </style>
    </head>    
    <body>      
        <small style="float:right;margin-right:25px"> <a href="../../watIndex.php">Back to Home</a></small> 
    </body> 
</html> 
<?php 
    
    echo "<br /><b>Student ID:</b> c7202634 <br /> 
            <b>Name:</b> Amit Kumar Karn";
    echo "<hr />";
    echo "<br /> <br /><h2>Some Useful Functions</h2>";
    $password = 'pass';     //declaring and initializinpassword variable 
    //$password = null;           //setting password value to null
    //$password = '';
    //$password = ' ';
    $password = 'password';
    //$password = '123456';
    $password = 'pass   ';
    $p = 'pass   ';
    $password = trim($password);
    $password = htmlentities('<script>alert(\"You have been hacked\")<script>');
    $password = 'password';
    echo "Password is: $password <br />";  //displaying password
    
    //checking if password is initialized
    if(isset($password) && !empty($password))
        //echo "Password OK<br />";
        if(strlen($password) >= 6 && strlen($password) <= 8)    //checking to see if the password is between or equal to 6 to 8
          {  //echo "Password OK<br />";
            if(is_numeric($password))       //checking to see if password is all numeric
                echo "Password cannot be a number.";
            else    
            {
                echo "Password OK";
            }
        }    
        else
            echo "Your password must be between 6 and 8 characters in length.";
    else
        echo "Please enter a password <br />";

    //printing encrypted password
    echo '<br />Encrypted Password: ' .md5($password). '<br /><br />';    //sha1 could also be used 
    //echo "<hr />";



?>