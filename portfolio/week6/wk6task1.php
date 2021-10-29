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
        <small style="float:right;margin-right:25px"> <a href="../../watIndex.php">Back to Home</a></small> 
        <br /><b>Student ID:</b> c7202634 <br /> 
                <b>Name:</b> Amit Kumar Karn
        <hr />

        <h1>Search Form</h1>  
        <form method="POST" action="wk6task1.php" enctype="multipart/form-data">   
            <p><label>Location: </label></p>   
            <input type="text" name="location" value="<?php if(isset($_POST['location'])) 
                                                                    {echo $_POST['location'];}
                                                                    ?>" />   
            <p><label>Category:</label></p>   

            <?php

                 if(isset($_POST['category']))
                 {
                     $to=$_POST['category'];
                     if($to=="Hotel")
                     {
                         $selected="Hotel";
                         
                     }
                     else if($to=="Guest House")
                     {
                        $selected="Guest House";
                     }

                     else if($to=="Rental")
                     {
                        $selected="Rental";
                     }
                     else
                     {
                         $selected="Category";
                     }
                 }
                 else
                     {
                         $selected="Category";
                     }
                     ?>

            <select name="category" size="1" >    
                <option value="" ><?php echo @$selected;?></option>    
                <option value="Hotel">Hotel</option>    
                <option value="Guest House">Guest House</option>    
                <option value="Rental">Rental</option>   
            </select>   
            <br /><br /><input type="submit" value="Submit" name="submitbtn"/>  
            <br /><br />
        </form>  
        <?php  
        //1. Check the form and complete as necessary  
        //2. Add code to collect data from the two form objects and echo back data collected  
        //3. Use isset() function to stop code being processed without form being submitted  
        //4. Add code to check data has been entered into text box when form submitted and         
        // feedback a message to user if box is empty  
        //5. Extend condition to check input to include a check to ensure a category has been         
        //  Selected before proceeding  
        //6. sanitize the string entered into the text box using the filter_var() function  
        //7. set value of the text box so the user entry persists when an error is found   
        if(isset($_POST['submitbtn']))
        {
            echo '<br /><hr />';
            $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
            if(empty($location))
            {
                echo '<b style="color:red"><br />Location must be entered!<br />';
            }
            $category = $_POST['category'];
            if(empty($category))
                echo '<b style="color:red">Category must be selected!</b><br />';

            if(!empty($location) && !empty($category))
            {
                echo 'Location: ' .$location;
                echo '<br />Category: ' .$category;
            }
            
            echo '<br /><br />';
        }   
        ?> 
    </body> 
</html> 