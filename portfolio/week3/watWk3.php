<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Fundamentals</title>
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
    echo "<h1>My First PHP</h1>";

    echo "<b>Student ID:</b> c7202634 <br /> 
            <b>Name:</b> Amit Kumar Karn";
    echo "<hr />";

    //Escape Characters
    echo "<h2>Using Escape Characters</h2>";
    echo "\"most programmers say it's better to use 'echo' rather than 'print'\" says who? ";   //using \ escape character for double quotes
    echo "<hr />";

    //Variables
    echo "<h2>Variables</h2>";      
    $name = "Amit Karn";        //declaring variables  
    $age = "21";
    echo 'Hi my name is '.$name.' and I am '.$age.' years old! ';      //display using the variables, single quotes and concatenation
    echo "Mi nombre es $name y tengo $age anos de edad! ";          //display without using concatenation
    echo "<hr />";

    //Functions
    echo "<h2>Functions</h2>";
    //gettype()returns the name of the data type of the variable
    echo gettype($name); 
    echo '<br />'; 
    //strlen() returns the length of the string
    echo strlen($name); 
    echo '<br />'; 
    //strtoUpper()returns string with all characters converted to uppercase
    echo strtoUpper($name); 
    echo "<hr />";

    //Arithmetic
    echo "<h2>Arithmetic</h2>";
    //declaring numeric variables
    $num1 = 9;
    $num2 = 12;
    echo "num1 = $num1 <br />";
    echo "num2 = $num2 <br />";
    echo 'num1 x num2 = '.($num1*$num2).'<br />';
    $per = ($num1/$num2)*100;       //calculate percentage
    echo 'num1 as percentage of num2 = '.number_format($per, 0).'%<br />';
    echo 'num2 divided by num1 = '.number_format(($num2/$num1), 0).' remainder '.number_format(($num2%$num1), 0);
    

    /*
    OUTPUT
    num1 = 9  
    num2 = 12  
    num1 x num2 = 108  
    num1 as a percentage of num2 = 75%  
    num2 divided by num1 = 1 remainder 3 
    */

    //Calculating height
    echo "<br /><br /><h3>Displaying height in feet and inches</h3>";
    echo "Name = $name <br />";
    echo "Age = $age <br/>";
    $heightm = 1.70;            //height in meters
    $heighti = ($heightm *100)/2.54;    //height in inches
    $heightf = $heighti/12;             //height in feet
    echo "Height in meters = $heightm <br />";
    //height in feet and inches where floor() will convert to the next lowest integer by rounding
    echo 'Height in feet and inches and inches = '.floor($heightf).'ft  and '.floor($heighti).'ins';    
    echo "<hr />";


    //Selection
    echo "<h2>Selection</h2>";  
    $daytime = date('l, jS \of F, Y, h:i:s A');
    //$day = date('l');   //date function
    echo 'It\'s '.$daytime. '!';
    
    $day = date('l');           //week day
    if($day == 'Wednesday')
        echo "<br />It's midweek!";
    else
        echo "<br />It's not midweek!";

    $hour = date('G');      //hour in 24 hour format
    if($hour<12)
        echo "<br />Good Morning!";
    else if($hour>=12 && $hour<18)
        echo "<br />Good Afternoon!";
    else  
        echo "<br />Good Night!";

    //validating password
    echo "<br /><br /><b>Checking Password</b>";
    $pass = 'password';
    if(strlen($pass)>4 && strlen($pass)<10 )        //checking for password length
        {
            echo "<br />Password length is valid!";
            if($pass == 'password')                     //checking for password value
                echo "<br />Password is valid!";
            else
                echo "<br />Password is invalid!";
        }
    else   
        {
            echo "<br />Password length is invalid!";
            if($pass == 'password')                     //checking for password value
                echo "<br />Password is valid!";
            else
                echo "<br />Password is invalid!";
        }

    //Ticket Company 
    echo "<br /><br /><b>Ticket Company</b>";
    $age = 15;
    $ticket_price = 25;
    $membership = true;
    $final_ticket_price = 0;
    $discount = 0;
    //discount criteria
    if($age<12)
        $discount = 50;
    else if($age<18)
        $discount = 25;
    else if($age>65)
        $discount = 25;
    //else if($membership)
      //  $discount = 10;
    else
        $discount = 0;
    //calculating final ticket price
    if($membership)
    {
        $final_ticket_price = $ticket_price - (($discount/100)*$ticket_price);
        $final_ticket_price = $final_ticket_price - ((10/100)*$final_ticket_price);
    }
    else    
        $final_ticket_price = $ticket_price - (($discount/100)*$ticket_price);
    //displaying the data
    echo '<br />Initial Ticket Price = &pound;'.$ticket_price;
    echo "<br />Age = $age";
    if($membership)
        echo "<br />Member = Yes";
    else    
        echo "<br />Member = No";
    echo '<br />Final Ticket Price = &pound;'.number_format($final_ticket_price,2) .'<br /><br />';
    //echo "<hr />";
    
    
?>