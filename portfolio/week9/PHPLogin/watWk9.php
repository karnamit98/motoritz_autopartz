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
        <!--h3>Login</h3--> 
        <?php 
            //include init.php so session vars can be used 
            include 'init.php';
            
            //Use an if statement to determine whether the session var holding 
            //the user name ($_SESSION['user'] has been set.  If it has, echo out 
            //a welcome message for the user, followed by a links to a pages 
            //called protected.php and logout.php. 
            if(isset($_SESSION['user']))
            {
                echo "<h2 style='color:#1089ff;'>Welcome, ".strtoupper($_SESSION['user'])."!</h2>";
                echo "<a href='protected.php'>Protected </a>  ";
                echo "<a href='logout.php'>Logout</a><br />";
            }
            //add an else section that will include loginform.php and display any 
            //error message that is held in ($_SESSION['error']   
            else
            {
                if(isset($_SESSION['error']))
                    echo $_SESSION['error'];
                include 'loginform.php';
            }
            
            
 
        ?> 
        <br /><br />
    </body>
</html>