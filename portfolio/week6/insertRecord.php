<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>week 6 Progress Check</title> 
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
                padding-right:15px;
                margin-top:2%;
                border-bottom:2px solid grey;
                background-color:#fcf5b0;
            }
            hr{margin-left:0px;width:97%;}
        </style>
    </head> 
    <body>  
        <small style="float:right;margin-right:25px"> <a href="../../watIndex.html">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
                <b>Name:</b> Amit Kumar Karn
        <hr />

        <br /><br />
    </body>
</html>

<?php 
    //Make connection to database 
    include 'connection.php'; 
    //(a)Gather from $_POST[]all the data submitted and store in variables 
    
    $fname = $_POST['fname'];
    $lname = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    //(b)Construct INSERT query using variables holding data gathered 
     $query = "INSERT INTO customer VALUES (NULL, '$fname', '$lname', '$email', '$password', '$gender', $age)";
    //Temporarily echo $query for debugging purposes  
    echo '<b>Query: </b>' .$query .'<br />';
    //exit();
    echo "<br />";
    //run $query
    //mysqli_query($connection, $query); 
    $runquery = mysqli_query($connection, $query);
    if($runquery)
        echo 'Query Inserted!<br />';
    else
        echo '<b style="color:red">Query Insertion Failed!</b><br />';
   
    echo "<br /><br />";
    
?> 
 