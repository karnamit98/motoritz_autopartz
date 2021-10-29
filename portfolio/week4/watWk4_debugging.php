<!DOCTYPE html>
<html lang="en">    
    <head>       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Debugging Wk4</title>       
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
    echo '<hr />';
    //DEBUGGING total error counts = 8
    //declare some variables     
    $day='Saturday';   //missing ' after saturday(1) 
    $count=300;      
    //Output to screen     
    echo 'I just wanted to say that\'s fine';   //escape sequence before '(1)  
    echo '<br />';     
    echo 'The day is '.$day;     //'.before $day and not after(2)
    echo '<br />';     
    print 'The count is '.$count;   //. before $count and not - (1)  
    echo '<br />'; 
    //test some conditions     
    if ($count == 300){        //== in condition and not just = (1) 
        echo 'correct';     
        }
    else{         
        echo 'incorrect';     
        }     
    echo '<br />';     
    $time =14;     
    if($time < 12 ){         
        echo 'Good morning';     
        }
    else if($time >= 12  && $time<=18)  //space between else and if(1)
        {         
            echo 'Good afternoon';  //missing semicolon after 'good afternoon'(1)
        }  
    else{         
            echo 'Good Evening';                 
        } 
    echo '<br /><br />'
?> 