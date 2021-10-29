<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Php Queries</title> 
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
        <small style="float:right;margin-right:25px"> <a href="../../watIndex.php">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
                <b>Name:</b> Amit Kumar Karn
        <hr />

        <form method="POST" action="insertRecord.php" enctype="multipart/form-data">
            <fieldset style="background-color:#eafbea;">
                <legend style="font-weight:bold;color:#272343;font-size:20;">Enter Customer Details</legend>
                <label for="fname">First Name: </label>
                <input type="text" name="fname" value="<?php if(isset($_POST['fname']))
                                                                {echo $_POST['fname'];} ?>" />
                <br /><br />                                           
                <label for="sname">Surname: </label>
                <input type="text" name="sname" value="<?php if(isset($_POST['sname']))
                                                                {echo $_POST['sname'];} ?>" />
                <br /><br />                                           
                <label for="email">Email: </label>
                <input type="text" name="email" value="<?php if(isset($_POST['email']))
                                                                {echo $_POST['email'];} ?>" />
                <br /><br />                                           
                <label for="password">Password: </label>
                <input type="text" name="password" value="<?php if(isset($_POST['password']))
                                                                {echo $_POST['password'];} ?>" />
                <br /><br />     
                <?php

                 if(isset($_POST['gender']))
                 {
                     $to=$_POST['gender'];
                     if($to=="Male")
                     {
                         $selected="Male";
                         
                     }
                     else if($to=="Female")
                     {
                        $selected="Female";
                     }

                     else if($to=="Other")
                     {
                        $selected="Other";
                     }
                     else
                     {
                         $selected="Select Gender";
                     }
                 }
                 else
                     {
                         $selected="Select Gender";
                     }
                     ?>                                      
                <label for="gender">Gender: </label>
                <select name="gender" size="1">
                    <option value=""><?php echo @$selected;?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <br /><br />                                           
                <label for="age">Age: </label>
                <input type="text" name="age" value="<?php if(isset($_POST['age']))
                                                                {echo $_POST['age'];} ?>" />
                <br/><br />
                <input type="submit" name="submitbtn" value="Submit" />
                <input type="reset" name="resetbtn" value="Reset" />
            </fieldset>
        </form>
        <br /><hr />
        <?php
            include 'selectRecord.php'
        ?>
        <br />
    </body>
</html>