<?php error_reporting(E_ALL);?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Week5ExtenExercises</title>
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

        <h1>Order Form</h1>
        <strong>Please fill out this form to place your order.</strong>
        <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Enter your login details</legend>
                <label for="username">User Name: </label>
                <input type="text" name="username" value="<?php if(isset($_POST['username'])){
                                                                    echo $_POST['username'];
                                                                    } ?>" />
                &nbsp;
                <label for="email">Email: </label>
                <input type="text" name="email" value="<?php if(isset($_POST['email'])){
                                                                    echo $_POST['email'];
                                                                    } ?>" />
            </fieldset>
            <fieldset>
                <legend>Pizza Selection</legend>
                <label for="size">Size: </label>
                <input type="radio" name="size" <?php if (isset($_POST['size']) && $_POST['size']=="small") echo "checked";?> value="small" />small
                &nbsp;
                <input type="radio" name="size" <?php if (isset($_POST['size']) && $_POST['size']=="medium") echo "checked";?> value="medium" />medium
                &nbsp;
                <input type="radio" name="size" <?php if (isset($_POST['size']) && $_POST['size']=="large") echo "checked";?> value="large" />large
                <br /><br />
                <label for="topping" >Topping: </label>
                <select name="topping" size="1">
                <?php

                 if(isset($_POST['topping']))
                 {
                     $to=$_POST['topping'];
                     if($to=="Mushroom")
                     {
                         $selected="Mushroom";
                         
                     }
                     else if($to=="Paneer")
                     {
                        $selected="Paneer";
                     }

                     else if($to=="Extra Cheese")
                     {
                        $selected="Extra Cheese";
                     }
                     else
                     {
                         $selected="Please Select";
                     }
                 }
                 else
                     {
                         $selected="Please Select";
                     }
                     ?>                        
                    <option value=""><?php echo @$selected;?></option>
                    
                    <option value="Mushroom">Mushroom</option>
                    <option value="Paneer" >Paneer</option>
                    <option value="Extra Cheese" >Extra Cheese</option>
                </select>
                <br /><br />
                <label for="extras">Extras: </label>
                <input type="checkbox" name="extras[]" <?php if(isset($_POST['submitbtn'])){if(isset($_POST['extras']))
                                                                        {foreach($_POST['extras'] as $value)
                                                                        { if($value == "Parmesan")
                                                                            {echo "checked";}}}}
                                                                            ?>  value="Parmesan"  />Parmesan
                &nbsp;
                <input type="checkbox" name="extras[]" <?php if(isset($_POST['submitbtn'])){if(isset($_POST['extras']))
                                                                        {foreach($_POST['extras'] as $value)
                                                                        { if($value == "Olives")
                                                                            {echo "checked";}}}}
                                                                            ?> value="Olives"  />Olives
                &nbsp;
                <input type="checkbox" name="extras[]" <?php if(isset($_POST['submitbtn'])){if(isset($_POST['extras']))
                                                                        {foreach($_POST['extras'] as $value)
                                                                        { if($value == "Capers")
                                                                            {echo "checked";}}}}
                                                                            ?> value="Capers"  />Capers
                
            </fieldset>
            <input type="submit" name="submitbtn" />&nbsp;
            <input type="reset" name="clearbtn" />
        </form>
        <br ><br />
    </body>
</html>

<?php

    if(isset($_POST['submitbtn']))     //if submit is clicked
    {
        $username = $_POST['username'];
        if(empty($username))                                                //if username is empty
            echo '<b style="color:red">Username not entered!</b><br />';    
        $email = $_POST['email'];
        if(empty($email))                                                   //if email is empty
           {
                echo '<b style="color:red">Email not entered!</b><br />';
           }
           //preg_match for email validation
        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)) 
        {
            $email = $_POST['email'];   
            echo '<b style="color:red">Invalid Email Format!<br />Only letters and white space allowed!</b><br />';
        }
        else{ $email = $_POST['email']; }
        if(isset($_POST['size']))                                           //if pize size is not set
            $size = $_POST['size'];
        else
            echo '<b style="color:red">Pizza size not specified!</b><br />';
        if(isset($_POST['extras']))                                          //if extra topping not set or selected
            $extras = $_POST['extras'];
        else
            echo '<b style="color:red">Extra Toppings not selected!</b><br />';
        
        if(!empty($_POST['topping']))
        {
            $topping = $_POST['topping'];
        }
        else{
            echo '<b style="color:red">Toppings not selected!</b><br />';
        }

        echo '<hr />';
        //if all values are initialized and topping not equals none
        if(!empty($username) && !empty($email) && isset($size) && !empty($topping) && isset($extras) && ($topping!="none"))
        {
            echo '<h3>Thank you for you order: </h3>';
            echo 'Customer ID: <b>' .$username. '</b><br />';
            echo 'Email: <b>' .$email. '</b><br />';
            echo 'Your Order: <b>' .$size.' '.$topping. '</b><br />';
            echo 'Extra Toppings: <b>';
            $numItems = count($_POST['extras']);
            $index = 0;
            foreach($_POST['extras'] as $value)
            {   
                $index++;
                if($index < $numItems)
                    echo "$value". ", ";
                else
                    echo $value = rtrim($value, ',');       //it will remove a char if the last char is a coma
            }
            echo '</b> <br />';
        }
        else
        {
            
        }
        echo '<br /><br />';
    }                                                              

?>